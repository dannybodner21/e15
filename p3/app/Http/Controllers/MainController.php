<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ab;
use App\Models\Cardio_Exercise;
use App\Models\Exercise;
use App\Models\Workout;
use App\Models\User;


class MainController extends Controller {
    public function index() {

        // check if user is logged in
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $currentUser = User::where('id', '=', $userId)->first();

            // get user's workouts
            $usersWorkouts = $currentUser->workouts->toArray();
            //dd($usersWorkouts[1]['id']);
        } else {
            $usersWorkouts = [];
        }

        
        return view('index', [
            'title' => 'P3',
            'name' => session('name', null),
            'bodyParts' => session('bodyParts', null),
            'chest' => session('chest', null),
            'back' => session('back', null),
            'shoulders' => session('shoulders', null),
            'legs' => session('chest', null),
            'biceps' => session('biceps', null),
            'triceps' => session('triceps', null),
            'abs' => session('abs', null),
            'cardio' => session('cardio', null),
            'finalExercises' => session('finalExercises', null),
            'randomAbExercises' => session('randomAbExercises', null),
            'randomCardioExercise' => session('randomCardioExercise', null),
            'generatingWorkout' => session('generatingWorkout', 'false'),
            'generatingRandomWorkout' => session('generatingRandomWorkout', 'false'),
            'bodyPartsArray' => session('bodyPartsArray',''),
            'cardioString' => session('cardioString',''),
            'mainExercisesArray' => session('mainExercisesArray',''),
            'absArray' => session('absArray',''),
            'usersWorkouts' => $usersWorkouts,
        ]);
    }

    // pick exercises to include in the workout -- NOT USING THIS AT THE MOMENT
    public function pickExercises($allExercises, $numberOfExercises) {
        // results array
        $finalExercises = [];

        // loop through body parts
        for ($i = 0; $i < count($allExercises); $i++) {

            // get random indexes from the array
            $randomIndexes = array_rand($allExercises[$i], $numberOfExercises);

            // loop through exercises to get the ones we will include based on indexes chosen
            $randomExercises = [];
            for ($j = 0; $j < count($randomIndexes); $j++) {
                $randomExercises[$j] = $allExercises[$i][$randomIndexes[$j]];
            }

            // add exercises to the results array
            array_push($finalExercises, $randomExercises);
        }

        // return results
        return $finalExercises;
    }

    public function dailyWorkout(Request $request) {

        // Form validation
        $request->validate([
            'name' => 'required',
            'chest' => 'required_without_all:back,shoulders,legs,biceps,triceps',
            'back' => 'required_without_all:chest,shoulders,legs,biceps,triceps',
            'shoulders' => 'required_without_all:chest,back,legs,biceps,triceps',
            'legs' => 'required_without_all:chest,back,shoulders,biceps,triceps',
            'biceps' => 'required_without_all:chest,back,shoulders,legs,triceps',
            'triceps' => 'required_without_all:chest,back,shoulders,legs,biceps',
        ]);
        // NEED TO MAKE SURE THAT ATLEAST ONE BODY PART IS SELECTED
    
        // Get form data
        $name = $request->input('name', '');

        //$bodyParts = $request->input('bodyParts', '');
        $chest = $request->input('chest', '');
        $back = $request->input('back', '');
        $shoulders = $request->input('shoulders', '');
        $legs = $request->input('legs', '');
        $biceps = $request->input('biceps', '');
        $triceps = $request->input('triceps', '');

        $abs = $request->input('abs', '');
        $cardio = $request->input('cardio', '');
    
        // Create arrays with data from database tables
        // ONLY CREATE THE ARRAY IF THE BODY PART WAS SELECTED************

        $chestRows = Exercise::where('body_part','=','Chest')->get()->toArray();
        $chestArray = [];
        for($i=0;$i<count($chestRows);$i++) {
            $chestArray[$i] = [$chestRows[$i]['name'],strval($chestRows[$i]['set_count']).' sets of '.strval($chestRows[$i]['rep_count']).' reps'];
        }

        $backRows = Exercise::where('body_part','=','Back')->get()->toArray();
        $backArray = [];
        for($i=0;$i<count($backRows);$i++) {
            $backArray[$i] = [$backRows[$i]['name'],strval($backRows[$i]['set_count']).' sets of '.strval($backRows[$i]['rep_count']).' reps'];
        }

        $shouldersRows = Exercise::where('body_part','=','Shoulders')->get()->toArray();
        $shouldersArray = [];
        for($i=0;$i<count($shouldersRows);$i++) {
            $shouldersArray[$i] = [$shouldersRows[$i]['name'],strval($shouldersRows[$i]['set_count']).' sets of '.strval($shouldersRows[$i]['rep_count']).' reps'];
        }

        $legsRows = Exercise::where('body_part','=','Legs')->get()->toArray();
        $legsArray = [];
        for($i=0;$i<count($legsRows);$i++) {
            $legsArray[$i] = [$legsRows[$i]['name'],strval($legsRows[$i]['set_count']).' sets of '.strval($legsRows[$i]['rep_count']).' reps'];
        }

        $bicepsRows = Exercise::where('body_part','=','Biceps')->get()->toArray();
        $bicepsArray = [];
        for($i=0;$i<count($bicepsRows);$i++) {
            $bicepsArray[$i] = [$bicepsRows[$i]['name'],strval($bicepsRows[$i]['set_count']).' sets of '.strval($bicepsRows[$i]['rep_count']).' reps'];
        }

        $tricepsRows = Exercise::where('body_part','=','Triceps')->get()->toArray();
        $tricepsArray = [];
        for($i=0;$i<count($tricepsRows);$i++) {
            $tricepsArray[$i] = [$tricepsRows[$i]['name'],strval($tricepsRows[$i]['set_count']).' sets of '.strval($tricepsRows[$i]['rep_count']).' reps'];
        }

        // initialize an array to hold each body part array
        $allExercises = [];

        $bodyParts = [];

        // STRUCTURE: workout:[ [bodypart1 [exercise1,sets/repts],[exercise2,sets/reps] ], [bp2 [e1],[e2] ]]

        // Grab exercises from whichever body parts were picked in the form
        if ($chest == 'true') {
            array_push($allExercises, $chestArray);
            array_push($bodyParts, 'Chest');
        }
        if ($back == 'true') {
            array_push($allExercises, $backArray);
            array_push($bodyParts, 'Back');
        }
        if ($legs == 'true') {
            array_push($allExercises, $legsArray);
            array_push($bodyParts, 'Legs');
        }
        if ($shoulders == 'true') {
            array_push($allExercises, $shouldersArray);
            array_push($bodyParts, 'Shoulders');
        }
        if ($biceps == 'true') {
            array_push($allExercises, $bicepsArray);
            array_push($bodyParts, 'Biceps');
        }
        if ($triceps == 'true') {
            array_push($allExercises, $tricepsArray);
            array_push($bodyParts, 'Triceps');
        }

        // this will be used in hidden form to hold all body parts including abs and cardio
        $bodyPartsArray = $bodyParts;
        
        // get 3 exercises for each body part
        // $totalExercises = 3 * count($allExercises);

        // need to loop through each body part that is in the all exercises array
        // get 3 random numbers in the body part exercises array for each body part
        // get the exercises associated with those indexes
        $finalExercises = [];
        for ($i = 0; $i < count($allExercises); $i++) {
            $randomIndexes = array_rand($allExercises[$i], 3);

            $randomExercises = [];
            for ($j = 0; $j < count($randomIndexes); $j++) {
                $randomExercises[$j] = $allExercises[$i][$randomIndexes[$j]];
            }
            array_push($finalExercises, $randomExercises);
        }

        // get array of exercise names(strings) to use for hidden form fields
        $mainExercisesArray = [];
        for ($i=0;$i<count($finalExercises[0]);$i++) {
            array_push($mainExercisesArray, $finalExercises[0][$i][0]);
        }

        // initialize array so there is no array if abs is not checked
        $randomAbExercises =  [];

        // check if abs was checked
        if ($abs == 'true') {

            array_push($bodyPartsArray, 'Abs');

            // get ab workout

            // grab ab exercises from database
            // select all from abs table
            $abRows = Ab::all()->toArray();
            $abExercises = [];
            for ($i=0;$i<count($abRows);$i++) {
                $abExercises[$i] = [$abRows[$i]['name'],strval($abRows[$i]['set_count']).' sets of '.strval($abRows[$i]['rep_count']).' reps'];
            }
            
            // create an ab workout
            // consisting of 3-6 ab exercises

            // get random number between 3 and 6 inclusive
            $numberOfExercises = rand(3, 6);

            // get random keys from ab exercise array
            $randomAbExercises = array_rand($abExercises, $numberOfExercises);
        
            // that will give keys, so now we have to get the values
            for ($i = 0; $i < count($randomAbExercises); $i++) {
                $randomAbExercises[$i] = $abExercises[$randomAbExercises[$i]];
            }
        }

        $absArray = [];
        for ($i=0;$i<count($randomAbExercises);$i++) {
            array_push($absArray, $randomAbExercises[$i][0]);
        }

        // initialize so there isn't an error if no cardio
        $randomCardioExercise = ''; // not sure if this needs to be array or just string

        // check for cardio
        if ($cardio != 'none') {

            // get cardio workout
            if ($cardio == 'run') {
                // get a run workout
                $randomCardioExercise = 'run workout 1';
                array_push($bodyPartsArray, 'Run');

            } else if ($cardio == 'swim') {
                // get swim workout
                $randomCardioExercise = 'swim workout 1';
                array_push($bodyPartsArray, 'Swim');

            } else if ($cardio == 'stairmaster') {
                // get stairmaster workout
                $randomCardioExercise = 'stairmaster workout 1';
                array_push($bodyPartsArray, 'Stairmaster');
                
            } else if ($cardio == 'bike') {
                // get bike workout
                $randomCardioExercise = 'bike workout 1';
                array_push($bodyPartsArray, 'Bike');
                
            } else if ($cardio == 'row') {
                // get row workout
                $randomCardioExercise = 'row workout 1';
                array_push($bodyPartsArray, 'Row');
                
            }
        }
        $cardioString = $randomCardioExercise;


        // get logged in user's workouts
        $usersWorkouts  = $request->user()->workouts->toArray();


        // Redirect with variables
        return redirect('/')->with([
            'name' => $name,
            'bodyParts' => implode(", ", $bodyParts),
            'chest' => $chest,
            'back' => $back,
            'shoulders' => $shoulders,
            'legs' => $legs,
            'biceps' => $biceps,
            'triceps' => $triceps,
            'abs' => $abs,
            'cardio' => $cardio,
            'finalExercises' => $finalExercises,
            'randomAbExercises' => $randomAbExercises,
            'randomCardioExercise' => $randomCardioExercise,
            'generatingWorkout' => 'true',
            'generatingRandomWorkout' => 'false',
            'bodyPartsArray' => implode(',', $bodyPartsArray),
            'cardioString' => $cardioString,
            'mainExercisesArray' => implode(',', $mainExercisesArray),
            'absArray' => implode(',', $absArray),
            'usersWorkouts' => $usersWorkouts,
        ])->withInput();
    }

    public function randomWorkout(Request $request) {

        // generate random work for name of workout
        $name = 'Random Workout';

        // get random number 1-3 of how many body parts to include
        $numberOfBodyParts = rand(1, 3);

        // choose the body parts
        $allBodyParts = ['chest','back','shoulders','legs','biceps','triceps'];

        // get random keys from ab exercise array
        $randomIndexes = array_rand($allBodyParts, $numberOfBodyParts);

        // *if array_rand only chooses one index, it returns an int not an array*
        // to ensure no error, i will cast the int to an array
        if (is_int($randomIndexes)) {
            $newArray = [];
            array_push($newArray, $randomIndexes);
            $randomIndexes = $newArray;
        }

        // that will give keys, so now we have to get the values
        $randomWorkoutBodyParts = [];
        for ($i = 0; $i < count($randomIndexes); $i++) {
            $randomWorkoutBodyParts[$i] = $allBodyParts[$randomIndexes[$i]];
        }

        $bodyPartsArray = $randomWorkoutBodyParts;

        // figure out if beginner, intermediate or advanced workout
        // this will say how many exercises to get per body part
        // FOR NOW JUST GOING TO CHOOSE BETWEEN 3 OR 4 EXERCISES PER BODY PART
        $numberOfExercises = rand(3, 4);
        
        // get data from database tables

        $chestRows = Exercise::where('body_part','=','Chest')->get()->toArray();
        $chestArray = [];
        for($i=0;$i<count($chestRows);$i++) {
            $chestArray[$i] = [$chestRows[$i]['name'],strval($chestRows[$i]['set_count']).' sets of '.strval($chestRows[$i]['rep_count']).' reps'];
        }

        $backRows = Exercise::where('body_part','=','Back')->get()->toArray();
        $backArray = [];
        for($i=0;$i<count($backRows);$i++) {
            $backArray[$i] = [$backRows[$i]['name'],strval($backRows[$i]['set_count']).' sets of '.strval($backRows[$i]['rep_count']).' reps'];
        }

        $shouldersRows = Exercise::where('body_part','=','Shoulders')->get()->toArray();
        $shouldersArray = [];
        for($i=0;$i<count($shouldersRows);$i++) {
            $shouldersArray[$i] = [$shouldersRows[$i]['name'],strval($shouldersRows[$i]['set_count']).' sets of '.strval($shouldersRows[$i]['rep_count']).' reps'];
        }

        $legsRows = Exercise::where('body_part','=','Legs')->get()->toArray();
        $legsArray = [];
        for($i=0;$i<count($legsRows);$i++) {
            $legsArray[$i] = [$legsRows[$i]['name'],strval($legsRows[$i]['set_count']).' sets of '.strval($legsRows[$i]['rep_count']).' reps'];
        }

        $bicepsRows = Exercise::where('body_part','=','Biceps')->get()->toArray();
        $bicepsArray = [];
        for($i=0;$i<count($bicepsRows);$i++) {
            $bicepsArray[$i] = [$bicepsRows[$i]['name'],strval($bicepsRows[$i]['set_count']).' sets of '.strval($bicepsRows[$i]['rep_count']).' reps'];
        }

        $tricepsRows = Exercise::where('body_part','=','Triceps')->get()->toArray();
        $tricepsArray = [];
        for($i=0;$i<count($tricepsRows);$i++) {
            $tricepsArray[$i] = [$tricepsRows[$i]['name'],strval($tricepsRows[$i]['set_count']).' sets of '.strval($tricepsRows[$i]['rep_count']).' reps'];
        }

        // get the exercises per body part
        // loop through chosen body parts
        $randomWorkoutExercises = [];
        for ($i = 0; $i < count($randomWorkoutBodyParts); $i++) {
            if ($randomWorkoutBodyParts[$i] == 'chest') {
                array_push($randomWorkoutExercises, $chestArray);
            } else if ($randomWorkoutBodyParts[$i] == 'back') {
                array_push($randomWorkoutExercises, $backArray);
            } else if ($randomWorkoutBodyParts[$i] == 'legs') {
                array_push($randomWorkoutExercises, $legsArray);
            } else if ($randomWorkoutBodyParts[$i] == 'shoulders') {
                array_push($randomWorkoutExercises, $shouldersArray);
            } else if ($randomWorkoutBodyParts[$i] == 'biceps') {
                array_push($randomWorkoutExercises, $bicepsArray);
            } else if ($randomWorkoutBodyParts[$i] == 'triceps') {
                array_push($randomWorkoutExercises, $tricepsArray);
            }
        }

        // pick the exercises - FUNCTION NOT WORKING FOR WHATEVER REASON
        //pickExercises($randomWorkoutExercises, $numberOfExercises);
        // results array
        $finalExercises = [];

        // loop through body parts
        for ($i = 0; $i < count($randomWorkoutExercises); $i++) {

            // get random indexes from the array
            $randomIndexes = array_rand($randomWorkoutExercises[$i], $numberOfExercises);

            // loop through exercises to get the ones we will include based on indexes chosen
            $randomExercises = [];
            for ($j = 0; $j < count($randomIndexes); $j++) {
                $randomExercises[$j] = $randomWorkoutExercises[$i][$randomIndexes[$j]];
            }

            // add exercises to the results array
            array_push($finalExercises, $randomExercises);
        }

        // get array of exercise names(strings) to use for hidden form fields
        $mainExercisesArray = [];
        for ($i=0;$i<count($finalExercises[0]);$i++) {
            array_push($mainExercisesArray, $finalExercises[0][$i][0]);
        }
        


        // choose if including abs or not
        $abs = rand(0, 1);

        // if including abs, get the workout
        $randomAbExercises = [];
        if ($abs == 1) {
            // include abs
            array_push($bodyPartsArray, 'abs');

            // ab exercises
            $abRows = Ab::all()->toArray();
            $abExercises = [];
            for ($i=0;$i<count($abRows);$i++) {
                $abExercises[$i] = [$abRows[$i]['name'],strval($abRows[$i]['set_count']).' sets of '.strval($abRows[$i]['rep_count']).' reps'];
            }
            
            // create an ab workout
            // consisting of 3-6 ab exercises

            // get random number between 3 and 6 inclusive
            $numberOfExercises = rand(3, 6);

            // get random keys from ab exercise array
            $randomAbExercises = array_rand($abExercises, $numberOfExercises);
        
            // that will give keys, so now we have to get the values
            for ($i = 0; $i < count($randomAbExercises); $i++) {
                $randomAbExercises[$i] = $abExercises[$randomAbExercises[$i]];
            }
        }

        $absArray = [];
        for ($i=0;$i<count($randomAbExercises);$i++) {
            array_push($absArray, $randomAbExercises[$i][0]);
        }

        // choose if including cardio or not
        $cardio = rand(0, 1);

        // if including cardio, get the workout
        $randomCardioExercise = '';
        if ($cardio == 1) {
            // include cardio
            $cardioOptions = ['run','swim','stairmaster','bike','row'];
            $randomIndex = array_rand($cardioOptions, 1);

            // get cardio workout
            if ($cardioOptions[$randomIndex] == 'run') {
                // get a run workout
                $randomCardioExercise = 'run workout 1';
                array_push($bodyPartsArray, 'run');
                $cardio = 'run';

            } else if ($cardioOptions[$randomIndex] == 'swim') {
                // get swim workout
                $randomCardioExercise = 'swim workout 1';
                array_push($bodyPartsArray, 'swim');
                $cardio = 'swim';

            } else if ($cardioOptions[$randomIndex] == 'stairmaster') {
                // get stairmaster workout
                $randomCardioExercise = 'stairmaster workout 1';
                array_push($bodyPartsArray, 'stairmaster');
                $cardio = 'stairmaster';
                
            } else if ($cardioOptions[$randomIndex] == 'bike') {
                // get bike workout
                $randomCardioExercise = 'bike workout 1';
                array_push($bodyPartsArray, 'bike');
                $cardio = 'bike';
                
            } else if ($cardioOptions[$randomIndex] == 'row') {
                // get row workout
                $randomCardioExercise = 'row workout 1';
                array_push($bodyPartsArray, 'row');
                $cardio = 'row';
                
            }
        } else {
            $cardio = 'none';
        }
        $cardioString = $randomCardioExercise;

        // get logged in user's workouts
        $usersWorkouts  = $request->user()->workouts->toArray();

        // Redirect with variables
        return redirect('/')->with([
            'name' => $name,
            'bodyParts' => implode(", ", $randomWorkoutBodyParts),
            'chest' => '',
            'back' => '',
            'shoulders' => '',
            'legs' => '',
            'biceps' => '',
            'triceps' => '',
            'abs' => $abs,
            'cardio' => $cardio,
            'finalExercises' => $finalExercises,
            'randomAbExercises' => $randomAbExercises,
            'randomCardioExercise' => $randomCardioExercise,
            'generatingWorkout' => 'true',
            'generatingRandomWorkout' => 'true',
            'bodyPartsArray' => implode(',', $bodyPartsArray),
            'cardioString' => $cardioString,
            'mainExercisesArray' => implode(',', $mainExercisesArray),
            'absArray' => implode(',', $absArray),
            'usersWorkouts' => $usersWorkouts,
        ]);
    }

    // CREATE A FUNCTION THAT TAKES ARRAY AND CHOOSES RANDOM INDEXES


    public function saveWorkout(Request $request) {
       
        // get data
        $randomName = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz-:,'),0,8);
        $randomName = 'Random Workout: '.$randomName;
        $name = $request->input('name');
        if ($name == null) {
            $name = $randomName;
        }
        $bodyPartDescription = $request->input('bodyPartsArray');
        $cardioString = $request->input('cardioString', '');
        $mainExercisesArray = explode(',', $request->input('mainExercisesArray'));
        $absArray = explode(',', $request->input('absArray'));


        // instantiate a new Workout Model object
        $workout = new Workout();

        // name
        $workout->name = $name;

        // body part description
        $workout->body_part_description = $bodyPartDescription;

        // workout to user, one to many
        $user = auth()->user();
        $workout->user()->associate($user);

        // workout to cardio_exercise, one to many, nullable
        if ($cardioString != '') {
            // get cardio exercise from database
            $cardio_exercise = Cardio_Exercise::where('exercise', '=', $cardioString)->first();
            $workout->cardio_exercise()->associate($cardio_exercise);
        }

        // save workout
        $workout->save();

        // add all the exercises (many to many)
        // main exercises
        for ($i=0;$i<count($mainExercisesArray);$i++) {
            // get exercise from database
            $exercise = Exercise::where('name', '=', $mainExercisesArray[$i])->first();
            // connect workout and exercise
            $workout->exercises()->save($exercise);
        }

        // add all the ab exercises (many to many)
        if ($absArray[0] != '') {
            for ($i=0;$i<count($absArray);$i++) {
                // get exercise from database
                $abExercise = Ab::where('name', '=', $absArray[$i])->first();
                // connect workout and exercise
                $workout->abs()->save($abExercise);
            }
        }

        // confirm results
        // dd(Workout::all()->toArray());


        // get logged in user's workouts
        $usersWorkouts  = $request->user()->workouts->toArray();

        return redirect('/')->with([
            'name' => null,
            'bodyParts' => null,
            'chest' => null,
            'back' => null,
            'shoulders' => null,
            'legs' => null,
            'biceps' => null,
            'triceps' => null,
            'abs' => null,
            'cardio' => null,
            'finalExercises' => null,
            'randomAbExercises' => null,
            'randomCardioExercise' => null,
            'generatingWorkout' => 'false',
            'generatingRandomWorkout' => 'false',
            'bodyPartsArray' => '',
            'cardioString' => '',
            'mainExercisesArray' => '',
            'absArray' => '',
            'usersWorkouts' => $usersWorkouts,
        ]);
        

        
    }


    public function showWorkout(Request $request) {
       
        // get workout data from database based on 'name'

        // get workout id
        $id = $request->route('id');

        // get the workout from database
        $workout = Workout::where('id', '=', $id)->first();

        // workout name
        $name = $workout->name;

        // get body parts
        $bodyParts = $workout->body_part_description;

        // created on date
        $date = $workout->created_at;
        $date = date('d-m-Y', strtotime($date));

        // see if we have cardio
        $cardio = false;
        $cardioType = '';
        $cardioExercises = $workout->cardio;
        if ($cardioExercises != null) {
            // we have cardio
            $cardio = true;

            // cardio type
            $cardioType = Cardio_Exercise::where('exercise', '=', $cardioExercises)->first()->type;
        }

        // all the main exercises [ [one,two], [three,four] ]
        //$mainExercisesArray = [[['one','two']],[['three','four'],['three','four']]];

        $workoutExercises = $workout->exercises->toArray();
        $mainExercisesArray = [];
        for($i=0;$i<count($workoutExercises);$i++) {
            $mainExercisesArray[$i] = [$workoutExercises[$i]['name'],strval($workoutExercises[$i]['set_count']).' sets of '.strval($workoutExercises[$i]['rep_count']).' reps'];
        }

        //dd($mainExercisesArray);


        // abs as true or false
        $abs = false;
        $abExercisesArray = [];
        if ($workout->abs != null) {
            // we have an ab workout
            $abs = true;

            // get ab workout
            $abExercises = $workout->abs->toArray();
            for($i=0;$i<count($abExercises);$i++) {
                $abExercisesArray[$i] = [$abExercises[$i]['name'],strval($abExercises[$i]['set_count']).' sets of '.strval($abExercises[$i]['rep_count']).' reps'];
            }
        }
    

        return view('showWorkout', [
            'title' => 'P3',
            'id' => $id,
            'name' => $name,
            'bodyParts' => $bodyParts,
            'date' => $date,
            'cardio' => $cardio,
            'cardioType' => $cardioType,
            'cardioExercises' => $cardioExercises,
            'mainExercisesArray' => $mainExercisesArray,
            'abs' => $abs,
            'abExercises' => $abExercisesArray,
        ]);
        

        
    }

    public function deleteWorkout(Request $request) {

        // workouts have many to many with exercises, and abs 
        // workouts have one to many with users, and cardio
       
        // get id of workout to delete
        $id = $request->route('id');

        // query the workout from database
        $workout = Workout::where('id', '=', $id)->first();

        // disconnent many to many relationships
        //$workout->pivot->delete();
        
        $workout->exercises()->detach();
        $workout->abs()->detach();

        // detach relationships
        //$workout->users()->detach();
        //$workout->cardio_exercises()->detach();

        // delete the workout
        if ($workout) {
            $workout->delete();
        }

        // get logged in user's workouts
        $usersWorkouts  = $request->user()->workouts->toArray();

        return redirect('/')->with([
            'name' => null,
            'bodyParts' => null,
            'chest' => null,
            'back' => null,
            'shoulders' => null,
            'legs' => null,
            'biceps' => null,
            'triceps' => null,
            'abs' => null,
            'cardio' => null,
            'finalExercises' => null,
            'randomAbExercises' => null,
            'randomCardioExercise' => null,
            'generatingWorkout' => 'false',
            'generatingRandomWorkout' => 'false',
            'bodyPartsArray' => '',
            'cardioString' => '',
            'mainExercisesArray' => '',
            'absArray' => '',
            'usersWorkouts' => $usersWorkouts,
        ]);
    }
    
}