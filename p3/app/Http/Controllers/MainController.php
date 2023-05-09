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

        // Check if user is logged in
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $currentUser = User::where('id', '=', $userId)->first();

            // Get user's workouts
            $usersWorkouts = $currentUser->workouts->toArray();
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

    // Helper function to pick exercises to include in a workout
    // Takes array of exercises (by body part) and amount needed
    // Returns array of the picked exercises
    public function pickExercises($allExercises, $numberOfExercises) {
        
        // Results array
        $finalExercises = [];

        // Loop through body parts
        for ($i = 0; $i < count($allExercises); $i++) {

            // Get random indexes from the array
            $randomIndexes = array_rand($allExercises[$i], $numberOfExercises);

            // Loop through exercises to get the ones we will include based on indexes chosen
            for ($j = 0; $j < count($randomIndexes); $j++) {

                // Add exercises to the results array
                array_push($finalExercises, $allExercises[$i][$randomIndexes[$j]]);
            }
        }

        // Return results
        return $finalExercises;
    }

    public function dailyWorkout(Request $request) {

        // Form validation
        // Require a name and atleast one major body part
        $request->validate([
            'name' => 'required',
            'chest' => 'required_without_all:back,shoulders,legs,biceps,triceps',
            'back' => 'required_without_all:chest,shoulders,legs,biceps,triceps',
            'shoulders' => 'required_without_all:chest,back,legs,biceps,triceps',
            'legs' => 'required_without_all:chest,back,shoulders,biceps,triceps',
            'biceps' => 'required_without_all:chest,back,shoulders,legs,triceps',
            'triceps' => 'required_without_all:chest,back,shoulders,legs,biceps',
        ]);
    
        // Get form data
        $name = $request->input('name', '');
        $chest = $request->input('chest', '');
        $back = $request->input('back', '');
        $shoulders = $request->input('shoulders', '');
        $legs = $request->input('legs', '');
        $biceps = $request->input('biceps', '');
        $triceps = $request->input('triceps', '');
        $abs = $request->input('abs', '');
        $cardio = $request->input('cardio', '');

        // Initialize arrays
        $allExercises = [];
        $bodyParts = [];

        // Grab exercises from whichever body parts were picked in the form
        if ($chest == 'true') {
            $chestRows = Exercise::where('body_part','=','Chest')->get()->toArray();
            $chestArray = [];
            // Format it
            for($i=0;$i<count($chestRows);$i++) {
                $chestArray[$i] = [$chestRows[$i]['name'],strval($chestRows[$i]['set_count']).' sets of '.strval($chestRows[$i]['rep_count']).' reps'];
            }
            // Add to appropriate arrays
            array_push($allExercises, $chestArray);
            array_push($bodyParts, 'Chest');
        }
        if ($back == 'true') {
            $backRows = Exercise::where('body_part','=','Back')->get()->toArray();
            $backArray = [];
            // Format it
            for($i=0;$i<count($backRows);$i++) {
                $backArray[$i] = [$backRows[$i]['name'],strval($backRows[$i]['set_count']).' sets of '.strval($backRows[$i]['rep_count']).' reps'];
            }
            // Add to appropriate arrays
            array_push($allExercises, $backArray);
            array_push($bodyParts, 'Back');
        }
        if ($legs == 'true') {
            $legsRows = Exercise::where('body_part','=','Legs')->get()->toArray();
            $legsArray = [];
            // Format it
            for($i=0;$i<count($legsRows);$i++) {
                $legsArray[$i] = [$legsRows[$i]['name'],strval($legsRows[$i]['set_count']).' sets of '.strval($legsRows[$i]['rep_count']).' reps'];
            }
            // Add to appropriate arrays
            array_push($allExercises, $legsArray);
            array_push($bodyParts, 'Legs');
        }
        if ($shoulders == 'true') {
            $shouldersRows = Exercise::where('body_part','=','Shoulders')->get()->toArray();
            $shouldersArray = [];
            // Format it
            for($i=0;$i<count($shouldersRows);$i++) {
                $shouldersArray[$i] = [$shouldersRows[$i]['name'],strval($shouldersRows[$i]['set_count']).' sets of '.strval($shouldersRows[$i]['rep_count']).' reps'];
            }
            // Add to appropriate arrays
            array_push($allExercises, $shouldersArray);
            array_push($bodyParts, 'Shoulders');
        }
        if ($biceps == 'true') {
            $bicepsRows = Exercise::where('body_part','=','Biceps')->get()->toArray();
            $bicepsArray = [];
            // Format it
            for($i=0;$i<count($bicepsRows);$i++) {
                $bicepsArray[$i] = [$bicepsRows[$i]['name'],strval($bicepsRows[$i]['set_count']).' sets of '.strval($bicepsRows[$i]['rep_count']).' reps'];
            }
            // Add to appropriate arrays
            array_push($allExercises, $bicepsArray);
            array_push($bodyParts, 'Biceps');
        }
        if ($triceps == 'true') {
            $tricepsRows = Exercise::where('body_part','=','Triceps')->get()->toArray();
            $tricepsArray = [];
            // Format it
            for($i=0;$i<count($tricepsRows);$i++) {
                $tricepsArray[$i] = [$tricepsRows[$i]['name'],strval($tricepsRows[$i]['set_count']).' sets of '.strval($tricepsRows[$i]['rep_count']).' reps'];
            }
            // Add to appropriate arrays
            array_push($allExercises, $tricepsArray);
            array_push($bodyParts, 'Triceps');
        }

        // This will be used in hidden form to hold all body parts including abs and cardio
        $bodyPartsArray = $bodyParts;

        // Choose the final exercises to include in the workout
        $finalExercises = MainController::pickExercises($allExercises, 3);

        // Get array of exercise names(strings) to use for hidden form fields
        $mainExercisesArray = [];
        for ($i=0;$i<count($finalExercises);$i++) {
            array_push($mainExercisesArray, $finalExercises[$i][0]);
        }

        // Initialize array so there is no error if abs is not checked
        $randomAbExercises =  [];

        // Check if abs was checked
        if ($abs == 'true') {

            array_push($bodyPartsArray, 'Abs');

            // Grab ab exercises from database
            $abRows = Ab::all()->toArray();
            $abExercises = [];
            for ($i=0;$i<count($abRows);$i++) {
                // Format it
                $abExercises[$i] = [$abRows[$i]['name'],strval($abRows[$i]['set_count']).' sets of '.strval($abRows[$i]['rep_count']).' reps'];
            }
            
            // Create an ab workout consisting of 3-6 ab exercises

            // get random number between 3 and 6 inclusive
            $numberOfExercises = rand(3, 6);

            // get random keys from ab exercise array
            $randomAbExercises = array_rand($abExercises, $numberOfExercises);
        
            // That will give keys, so now we have to get the values
            for ($i = 0; $i < count($randomAbExercises); $i++) {
                $randomAbExercises[$i] = $abExercises[$randomAbExercises[$i]];
            }
        }

        $absArray = [];
        for ($i=0;$i<count($randomAbExercises);$i++) {
            array_push($absArray, $randomAbExercises[$i][0]);
        }

        // Initialize so there isn't an error if no cardio
        $randomCardioExercise = '';

        // Check for cardio
        if ($cardio != 'none') {

            // Will hold exercises of whichever cardio was picked
            $cardioArray = [];

            // Get cardio workout
            if ($cardio == 'run') {

                // Get array of run exercises
                $runRows = Cardio_Exercise::where('type','=','Run')->get()->toArray();
                for($i=0;$i<count($runRows);$i++) {
                    $cardioArray[$i] = $runRows[$i]['exercise'];
                }

                array_push($bodyPartsArray, 'Run');

            } else if ($cardio == 'swim') {

                // Get array of swim exercises
                $swimRows = Cardio_Exercise::where('type','=','Swim')->get()->toArray();
                for($i=0;$i<count($swimRows);$i++) {
                    $cardioArray[$i] = $swimRows[$i]['exercise'];
                }

                array_push($bodyPartsArray, 'Swim');

            } else if ($cardio == 'stairmaster') {

                // Get array of stairmaster exercises
                $stairmasterRows = Cardio_Exercise::where('type','=','Stairmaster')->get()->toArray();
                for($i=0;$i<count($stairmasterRows);$i++) {
                    $cardioArray[$i] = $stairmasterRows[$i]['exercise'];
                }

                array_push($bodyPartsArray, 'Stairmaster');
                
            } else if ($cardio == 'bike') {

                // Get array of bike exercises
                $bikeRows = Cardio_Exercise::where('type','=','Bike')->get()->toArray();
                for($i=0;$i<count($bikeRows);$i++) {
                    $cardioArray[$i] = $bikeRows[$i]['exercise'];
                }

                array_push($bodyPartsArray, 'Bike');
                
            } else if ($cardio == 'row') {

                // Get array of row exercises
                $rowRows = Cardio_Exercise::where('type','=','Row')->get()->toArray();
                for($i=0;$i<count($rowRows);$i++) {
                    $cardioArray[$i] = $rowRows[$i]['exercise'];
                }

                array_push($bodyPartsArray, 'Row');
            }

            // Take the array of chosen cardio exercises and pick a random one
            $randomCardioIndex = rand(0, count($cardioArray));
            $randomCardioExercise = $cardioArray[$randomCardioIndex];

        }
        $cardioString = $randomCardioExercise;

        // Get logged in user's workouts
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

        // Name for random workout
        $name = 'Random Workout';

        // Get random number 1-3 of how many body parts to include
        $numberOfBodyParts = rand(1, 3);

        // Choose the body parts
        $allBodyParts = ['chest','back','shoulders','legs','biceps','triceps'];

        // Get random keys from all body parts array
        $randomIndexes = array_rand($allBodyParts, $numberOfBodyParts);

        // *If array_rand only chooses one index, it returns an int not an array*
        // To ensure no error, i will cast the int to an array
        if (is_int($randomIndexes)) {
            $newArray = [];
            array_push($newArray, $randomIndexes);
            $randomIndexes = $newArray;
        }

        // That will give keys, so now we have to get the values
        $randomWorkoutBodyParts = [];
        for ($i = 0; $i < count($randomIndexes); $i++) {
            $randomWorkoutBodyParts[$i] = $allBodyParts[$randomIndexes[$i]];
        }

        $bodyPartsArray = $randomWorkoutBodyParts;

        // Choose how many exercises to get per body part
        $numberOfExercises = rand(3, 4);

        // Loop through chosen body parts and get exercises
        $randomWorkoutExercises = [];
        for ($i = 0; $i < count($randomWorkoutBodyParts); $i++) {
            if ($randomWorkoutBodyParts[$i] == 'chest') {
                $chestRows = Exercise::where('body_part','=','Chest')->get()->toArray();
                $chestArray = [];
                for($j=0;$j<count($chestRows);$j++) {
                    $chestArray[$j] = [$chestRows[$j]['name'],strval($chestRows[$j]['set_count']).' sets of '.strval($chestRows[$j]['rep_count']).' reps'];
                }
                array_push($randomWorkoutExercises, $chestArray);
            } else if ($randomWorkoutBodyParts[$i] == 'back') {
                $backRows = Exercise::where('body_part','=','Back')->get()->toArray();
                $backArray = [];
                for($j=0;$j<count($backRows);$j++) {
                    $backArray[$j] = [$backRows[$j]['name'],strval($backRows[$j]['set_count']).' sets of '.strval($backRows[$j]['rep_count']).' reps'];
                }
                array_push($randomWorkoutExercises, $backArray);
            } else if ($randomWorkoutBodyParts[$i] == 'legs') {
                $legsRows = Exercise::where('body_part','=','Legs')->get()->toArray();
                $legsArray = [];
                for($j=0;$j<count($legsRows);$j++) {
                    $legsArray[$j] = [$legsRows[$j]['name'],strval($legsRows[$j]['set_count']).' sets of '.strval($legsRows[$j]['rep_count']).' reps'];
                }
                array_push($randomWorkoutExercises, $legsArray);
            } else if ($randomWorkoutBodyParts[$i] == 'shoulders') {
                $shouldersRows = Exercise::where('body_part','=','Shoulders')->get()->toArray();
                $shouldersArray = [];
                for($j=0;$j<count($shouldersRows);$j++) {
                    $shouldersArray[$j] = [$shouldersRows[$j]['name'],strval($shouldersRows[$j]['set_count']).' sets of '.strval($shouldersRows[$j]['rep_count']).' reps'];
                }
                array_push($randomWorkoutExercises, $shouldersArray);
            } else if ($randomWorkoutBodyParts[$i] == 'biceps') {
                $bicepsRows = Exercise::where('body_part','=','Biceps')->get()->toArray();
                $bicepsArray = [];
                for($j=0;$j<count($bicepsRows);$j++) {
                    $bicepsArray[$j] = [$bicepsRows[$j]['name'],strval($bicepsRows[$j]['set_count']).' sets of '.strval($bicepsRows[$j]['rep_count']).' reps'];
                }
                array_push($randomWorkoutExercises, $bicepsArray);
            } else if ($randomWorkoutBodyParts[$i] == 'triceps') {
                $tricepsRows = Exercise::where('body_part','=','Triceps')->get()->toArray();
                $tricepsArray = [];
                for($j=0;$j<count($tricepsRows);$j++) {
                    $tricepsArray[$j] = [$tricepsRows[$j]['name'],strval($tricepsRows[$j]['set_count']).' sets of '.strval($tricepsRows[$j]['rep_count']).' reps'];
                }
                array_push($randomWorkoutExercises, $tricepsArray);
            }
        }

        // Get array of all the chosen exercises
        $finalExercises = MainController::pickExercises($randomWorkoutExercises, $numberOfExercises);
        
        // Get array of exercise names(strings) to use for hidden form fields
        $mainExercisesArray = [];
        for ($i=0;$i<count($finalExercises);$i++) {
            array_push($mainExercisesArray, $finalExercises[$i][0]);
        }

        // Choose if abs will be included or not
        $abs = rand(0, 1);

        // If including abs, get the workout
        $randomAbExercises = [];
        if ($abs == 1) {

            // Include abs
            array_push($bodyPartsArray, 'abs');

            // Get all ab exercises
            $abRows = Ab::all()->toArray();
            $abExercises = [];
            for ($i=0;$i<count($abRows);$i++) {
                $abExercises[$i] = [$abRows[$i]['name'],strval($abRows[$i]['set_count']).' sets of '.strval($abRows[$i]['rep_count']).' reps'];
            }
            
            // Create an ab workout consisting of 3-6 ab exercises

            // Get random number between 3 and 6 inclusive
            $numberOfExercises = rand(3, 6);

            // Get random keys from ab exercise array
            $randomAbExercises = array_rand($abExercises, $numberOfExercises);
        
            // Get the values
            for ($i = 0; $i < count($randomAbExercises); $i++) {
                $randomAbExercises[$i] = $abExercises[$randomAbExercises[$i]];
            }
        }

        $absArray = [];
        for ($i=0;$i<count($randomAbExercises);$i++) {
            array_push($absArray, $randomAbExercises[$i][0]);
        }

        // Choose if cardio will be included or not
        $cardio = rand(0, 1);

        // If including cardio, get the workout
        $randomCardioExercise = '';
        $cardioArray = [];
        if ($cardio == 1) {

            // Include cardio
            $cardioOptions = ['run','swim','stairmaster','bike','row'];
            $randomIndex = array_rand($cardioOptions, 1);
            $cardioChoice = $cardioOptions[$randomIndex];

            // Get array of chosen cardio exercises
            $cardioRows = Cardio_Exercise::where('type','=',$cardioChoice)->get()->toArray();
            for($i=0;$i<count($cardioRows);$i++) {
                $cardioArray[$i] = $cardioRows[$i]['exercise'];
            }

            // Add cardio type to body parts
            array_push($bodyPartsArray, $cardioChoice);
            $cardio = $cardioChoice;

            // Take the array of chosen cardio exercises and pick a random one
            $randomCardioIndex = rand(0, count($cardioArray));
            $randomCardioExercise = $cardioArray[$randomCardioIndex];
            
        } else {
            $cardio = 'none';
        }
        $cardioString = $randomCardioExercise;

        // Get logged in user's workouts
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
    
    public function saveWorkout(Request $request) {

        // Create random workout name if necessary
        $randomName = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz-:,'),0,8);
        $randomName = 'Random Workout: '.$randomName;

        // Get data
        $name = $request->input('name');
        if ($name == null) {
            $name = $randomName;
        }
        $bodyPartDescription = $request->input('bodyPartsArray');
        $cardioString = $request->input('cardioString', '');
        $mainExercisesArray = explode(',', $request->input('mainExercisesArray'));
        $absArray = explode(',', $request->input('absArray'));

        // Instantiate a new Workout Model object
        $workout = new Workout();

        // Name
        $workout->name = $name;

        // Body part description
        $workout->body_part_description = $bodyPartDescription;

        // Workout to user, one to many
        $user = auth()->user();
        $workout->user()->associate($user);

        // Workout to cardio_exercise, one to many, nullable
        if ($cardioString != '') {

            // Get cardio exercise from database
            $cardio_exercise = Cardio_Exercise::where('exercise', '=', $cardioString)->first();
            $workout->cardio_exercise()->associate($cardio_exercise);
        }

        // Save workout
        $workout->save();

        // Add all the exercises (many to many)
        // Main exercises
        for ($i=0;$i<count($mainExercisesArray);$i++) {

            // Get exercise from database
            $exercise = Exercise::where('name', '=', $mainExercisesArray[$i])->first();

            // Connect workout and exercise
            $workout->exercises()->save($exercise);
        }

        // Add all the ab exercises (many to many)
        if ($absArray[0] != '') {
            for ($i=0;$i<count($absArray);$i++) {

                // Get exercise from database
                $abExercise = Ab::where('name', '=', $absArray[$i])->first();

                // Connect workout and exercise
                $workout->abs()->save($abExercise);
            }
        }

        // Get logged in user's workouts
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
       
        // Get workout id
        $id = $request->route('id');

        // Get workout from database
        $workout = Workout::where('id', '=', $id)->first();

        // Workout name
        $name = $workout->name;

        // Get body parts
        $bodyParts = $workout->body_part_description;

        // Created on date
        $date = $workout->created_at;
        $date = date('F d, Y', strtotime($date));

        // See if we have cardio
        $cardio = false;
        $cardioType = '';
        $cardioExercises = $workout->cardio_exercise->exercise;
        if ($cardioExercises != null) {

            // We have cardio
            $cardio = true;

            // Cardio type
            $cardioType = Cardio_Exercise::where('exercise', '=', $cardioExercises)->first()->type;
        }

        // Main exercises
        $workoutExercises = $workout->exercises->toArray();
        $mainExercisesArray = [];
        for($i=0;$i<count($workoutExercises);$i++) {
            $mainExercisesArray[$i] = [$workoutExercises[$i]['name'],strval($workoutExercises[$i]['set_count']).' sets of '.strval($workoutExercises[$i]['rep_count']).' reps'];
        }

        // Abs as true or false
        $abs = false;
        $abExercisesArray = [];
        if (count($workout->abs->toArray()) > 0) {

            // We have an ab workout
            $abs = true;

            // Get ab workout
            $abExercises = $workout->abs->toArray();
            for($i=0;$i<count($abExercises);$i++) {
                $abExercisesArray[$i] = [$abExercises[$i]['name'],strval($abExercises[$i]['set_count']).' sets of '.strval($abExercises[$i]['rep_count']).' reps'];
            }
        }
    
        // Return
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

        // Workouts have many to many with exercises, and abs 
        // Workouts have one to many with users, and cardio
       
        // Get id of workout to delete
        $id = $request->route('id');

        // Query the workout from database
        $workout = Workout::where('id', '=', $id)->first();
        
        // Detach
        $workout->exercises()->detach();
        $workout->abs()->detach();

        // Delete the workout
        if ($workout) {
            $workout->delete();
        }

        // Get logged in user's workouts
        $usersWorkouts  = $request->user()->workouts->toArray();

        // Return
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