<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'p3 | switch',
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
        ]);
    }

    // pick exercises to include in the workout
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
    
        // Create arrays with temparary data for TESTING
        $chestArray = [
            ['barbell bench','5 sets of 8-12 reps'],
            ['incline barbell bench','5 sets of 8-12 reps'],
            ['decline barbell bench','5 sets of 8-12 reps'],
            ['four','5 sets of 8-12 reps'],
            ['five','5 sets of 8-12 reps'],
            ['six','5 sets of 8-12 reps'],
        ];

        $backArray = [
            ['pullups','x sets of y reps'],
            ['deadlift','x sets of y reps'],
            ['barbell row','x sets of y reps'],
            ['four','x sets of y reps'],
            ['five','x sets of y reps'],
            ['six','x sets of y reps'],
        ];

        $shouldersArray = [
            ['barbell overhead press','x sets of y reps'],
		    ['seated dumbbell overhead press','x sets of y reps'],
		    ['lateral raises','x sets of y reps'],
            ['four','x sets of y reps'],
            ['five','x sets of y reps'],
            ['six','x sets of y reps'],
        ];

        $legsArray = [
            ['squats','x sets of y reps'],
            ['leg press','x sets of y reps'],
            ['leg extension','x sets of y reps'],
            ['four','x sets of y reps'],
            ['five','x sets of y reps'],
            ['six','x sets of y reps'],
        ];

        $bicepsArray = [
            ['dumbbell curl','x sets of y reps'],
            ['barbell curl','x sets of y reps'],
            ['hammer curl','x sets of y reps'],
            ['four','x sets of y reps'],
            ['five','x sets of y reps'],
            ['six','x sets of y reps'],
        ];

        $tricepsArray = [
            ['dips','x sets of y reps'],
            ['rope pulldown','x sets of y reps'],
            ['close grip barbell bench','x sets of y reps'],
            ['four','x sets of y reps'],
            ['five','x sets of y reps'],
            ['six','x sets of y reps'],
        ];

        // initialize an array to hold each body part array
        $allExercises = [];

        $bodyParts = [];

        // STRUCTURE: workout:[ [bodypart1 [exercise1,sets/repts],[exercise2,sets/reps] ], [bp2 [e1],[e2] ]]

        // Grab exercises from whichever body parts were picked in the form
        if ($chest == 'true') {
            array_push($allExercises, $chestArray);
            array_push($bodyParts, 'chest');
        }
        if ($back == 'true') {
            array_push($allExercises, $backArray);
            array_push($bodyParts, 'back');
        }
        if ($legs == 'true') {
            array_push($allExercises, $legsArray);
            array_push($bodyParts, 'legs');
        }
        if ($shoulders == 'true') {
            array_push($allExercises, $shouldersArray);
            array_push($bodyParts, 'shoulders');
        }
        if ($biceps == 'true') {
            array_push($allExercises, $bicepsArray);
            array_push($bodyParts, 'biceps');
        }
        if ($triceps == 'true') {
            array_push($allExercises, $tricepsArray);
            array_push($bodyParts, 'triceps');
        }
        
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

        // initialize array so there is no array if abs is not checked
        $randomAbExercises =  [];

        // check if abs was checked
        if ($abs == 'true') {

            // get ab workout

            // TESTING DATA

            // ab exercises
            $abExercises = ['abs1','abs2','abs3','abs4','abs5','abs6','abs7','abs8','abs9','abs10'];
            
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

        // initialize so there isn't an error if no cardio
        $randomCardioExercise = ''; // not sure if this needs to be array or just string

        // check for cardio
        if ($cardio != 'none') {

            // get cardio workout
            if ($cardio == 'run') {
                // get a run workout
                $randomCardioExercise = 'run workout 1';

            } else if ($cardio == 'swim') {
                // get swim workout
                $randomCardioExercise = 'swim workout 1';

            } else if ($cardio == 'stairmaster') {
                // get stairmaster workout
                $randomCardioExercise = 'stairmaster workout 1';
                
            } else if ($cardio == 'bike') {
                // get bike workout
                $randomCardioExercise = 'bike workout 1';
                
            } else if ($cardio == 'row') {
                // get row workout
                $randomCardioExercise = 'row workout 1';
                
            }

        }


        // CODE FOR GETTING USER AND SHOWING LIST OF SAVED WORKOUTS
        //$workouts  = $request->user()->workouts;

 
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
        ])->withInput();
    }

    public function randomWorkout(Request $request) {

        // generate random work for name of workout
        $name = 'Random Workout 1';

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

        // figure out if beginner, intermediate or advanced workout
        // this will say how many exercises to get per body part
        // FOR NOW JUST GOING TO CHOOSE BETWEEN 3 OR 4 EXERCISES PER BODY PART
        $numberOfExercises = rand(3, 4);
        
        //-----------------------------------
        // TEMP DATA FOR TESTING
        $chestArray = [
            ['barbell bench','5 sets of 8-12 reps'],
            ['incline barbell bench','5 sets of 8-12 reps'],
            ['decline barbell bench','5 sets of 8-12 reps'],
            ['four','5 sets of 8-12 reps'],
            ['five','5 sets of 8-12 reps'],
            ['six','5 sets of 8-12 reps'],
        ];

        $backArray = [
            ['pullups','x sets of y reps'],
            ['deadlift','x sets of y reps'],
            ['barbell row','x sets of y reps'],
            ['four','x sets of y reps'],
            ['five','x sets of y reps'],
            ['six','x sets of y reps'],
        ];

        $shouldersArray = [
            ['barbell overhead press','x sets of y reps'],
		    ['seated dumbbell overhead press','x sets of y reps'],
		    ['lateral raises','x sets of y reps'],
            ['four','x sets of y reps'],
            ['five','x sets of y reps'],
            ['six','x sets of y reps'],
        ];

        $legsArray = [
            ['squats','x sets of y reps'],
            ['leg press','x sets of y reps'],
            ['leg extension','x sets of y reps'],
            ['four','x sets of y reps'],
            ['five','x sets of y reps'],
            ['six','x sets of y reps'],
        ];

        $bicepsArray = [
            ['dumbbell curl','x sets of y reps'],
            ['barbell curl','x sets of y reps'],
            ['hammer curl','x sets of y reps'],
            ['four','x sets of y reps'],
            ['five','x sets of y reps'],
            ['six','x sets of y reps'],
        ];

        $tricepsArray = [
            ['dips','x sets of y reps'],
            ['rope pulldown','x sets of y reps'],
            ['close grip barbell bench','x sets of y reps'],
            ['four','x sets of y reps'],
            ['five','x sets of y reps'],
            ['six','x sets of y reps'],
        ];
        //-----------------------------------

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
        
        // determine sets and reps - RIGHT NOW THEY ARE ATTACHED TO THE EXERCISES


        // choose if including abs or not
        $abs = rand(0, 1);

        // if including abs, get the workout
        $randomAbExercises = [];
        if ($abs == 1) {
            // include abs

            // ab exercises
            $abExercises = 
                ['abs1',
                'abs2',
                'abs3',
                'abs4',
                'abs5',
                'abs6',
                'abs7',
                'abs8',
                'abs9',
                'abs10'];
            
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

            } else if ($cardioOptions[$randomIndex] == 'swim') {
                // get swim workout
                $randomCardioExercise = 'swim workout 1';

            } else if ($cardioOptions[$randomIndex] == 'stairmaster') {
                // get stairmaster workout
                $randomCardioExercise = 'stairmaster workout 1';
                
            } else if ($cardioOptions[$randomIndex] == 'bike') {
                // get bike workout
                $randomCardioExercise = 'bike workout 1';
                
            } else if ($cardioOptions[$randomIndex] == 'row') {
                // get row workout
                $randomCardioExercise = 'row workout 1';
                
            }

        }

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
        ]);
    }

    // CREATE A FUNCTION THAT TAKES ARRAY AND CHOOSES RANDOM INDEXES



    

    
}