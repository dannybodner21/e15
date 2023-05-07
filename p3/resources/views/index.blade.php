@extends('template')

@section('title')
    {{ $title }}
@endsection

@section('head')
    <link href='/css/style.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
@endsection

@section('content')

    <body>

        <!-- user is not logged in -->
        @if (!Auth::user())
            <div style='text-align:center;padding-top:50px;'>
                <h6>Please <a href='/login'>login</a> to create and save workouts!</h6>
            </div>
            <!-- user is logged in -->
        @else
            <h5 style='text-align:center;padding-top:30px;'>
                Welcome, {{ Auth::user()->name }}!
            </h5>
            <!-- buttons to create workouts -->
            <div class='row' style='margin:auto; width:70%;'>
                <div class='column' style='text-align:center;width:50%;'>
                    <button class='formButtonTwo customButton' value='showForm' onclick='showForm()'>Create New
                        Workout</button>
                </div>
                <div class='column' style='text-align:center;width:50%;'>
                    <!-- figure out random workout here -->

                    <form action='/randomWorkout' method='POST'>
                        {{ csrf_field() }}
                        <button type='submit' class='formButtonTwo customButton' name='random' value='random'
                            test='generateRandomWorkoutButton'>Generate
                            Random
                            Workout</button>
                    </form>
                </div>
                <hr>
            </div>
            <!-- daily workout form section -->
            <section class='mainFormSection' id='mainFormSection'>
                <!-- Show any errors -->
                <div class='container' style='padding-top:35px;'>
                    <div class='row'>
                        <div class='col'>
                            @if (count($errors) > 0)
                                <div class='errorDiv'>
                                    <div class='errorHeader'>
                                        <h4><strong>Errors</strong></h4>
                                        <hr>
                                    </div>
                                    <ul class='textLeft'>
                                        @if ($errors->get('name'))
                                            <li class='listItem'>{{ $errors->first('name') }}</li>
                                        @endif
                                        @if (
                                            $errors->get('chest') ||
                                                $errors->get('back') ||
                                                $errors->get('legs') ||
                                                $errors->get('shoulders') ||
                                                $errors->get('biceps') ||
                                                $errors->get('triceps'))
                                            <li class='listItem'>Atleast one body part is required.</li>
                                        @endif
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class='dailyWorkoutFormDiv'>
                    <button class='XButton' value='hideForm' onclick='hideForm()'>X</button>
                    <form id='dailyWorkoutForm' method='POST' action='/dailyWorkout'>
                        {{ csrf_field() }}
                        <div>
                            <div style='text-align:center;padding-bottom:15px;'>
                                <h4><strong>Create a new Daily Workout</strong></h4>
                                <hr>
                            </div>
                            <label for='name'>
                                Name of workout:
                            </label>
                            <input type='text' name='name' value='{{ old('name') }}' test='mainFormName'>
                            <hr>

                            <label for='bodyParts'>
                                Body part(s):
                            </label>
                            <br>
                            <input type='checkbox' id='chest' name='chest' value='true'
                                {{ old('chest') ? 'checked' : '' }} test='mainFormChest'>
                            <label for='chest'>chest</label><br>
                            <input type='checkbox' id='back' name='back' value='true'
                                {{ old('back') ? 'checked' : '' }}>
                            <label for='back'>back</label><br>
                            <input type='checkbox' id='shoulders' name='shoulders' value='true'
                                {{ old('shoulders') ? 'checked' : '' }}>
                            <label for='shoulders'>shoulders</label><br>
                            <input type='checkbox' id='legs' name='legs' value='true'
                                {{ old('legs') ? 'checked' : '' }}>
                            <label for='legs'>legs</label><br>
                            <input type='checkbox' id='biceps' name='biceps' value='true'
                                {{ old('biceps') ? 'checked' : '' }}>
                            <label for='biceps'>biceps</label><br>
                            <input type='checkbox' id='triceps' name='triceps' value='true'
                                {{ old('triceps') ? 'checked' : '' }} test='mainFormTriceps'>
                            <label for='triceps'>triceps</label><br>
                            <hr>

                            <label for='abs'>
                                Include abs:
                            </label>
                            <br>
                            <label style='margin-top: 10px;'>
                                <input type='checkbox' value='true' name='abs' {{ old('abs') ? 'checked' : '' }}> Yes
                            </label>
                            <hr>

                            <label for='cardio'>
                                Cardio:
                            </label>
                            <select name='cardio' id='cardio'>
                                <option value='none' @if (old('cardio') == 'none') selected='selected' @endif>none
                                </option>
                                <option value='run' @if (old('cardio') == 'run') selected='selected' @endif>run
                                </option>
                                <option value='swim' @if (old('cardio') == 'swim') selected='selected' @endif>swim
                                </option>
                                <option value='stairmaster' @if (old('cardio') == 'stairmaster') selected='selected' @endif>
                                    stairmaster
                                </option>
                                <option value='bike' @if (old('cardio') == 'bike') selected='selected' @endif>bike
                                </option>
                                <option value='row' @if (old('cardio') == 'row') selected='selected' @endif>row
                                </option>
                            </select>

                        </div>
                        <div class='formButtonDiv'>
                            <button type='submit' class='formButtonTwo customButton' test='generateButton'>Generate
                                Workout</button>
                        </div>
                    </form>
                </div>
            </section>
            <!-- results from creating a workout -->
            <section id='results'>
                <!-- Show results after form is submitted -->
                <hr>
                <div class='container results'>
                    <button class='XButton' value='hideResults' onclick='hideResults()'>X</button>
                    <div class='row'>
                        <div class='col'>
                            @if (!is_null($name))
                                <div class='resultsDiv'>
                                    <div class='resultsHeader'>
                                        <h5 style='padding-bottom:10px;'><strong>{{ $name }}</strong></h5>
                                        <h6><strong>Bodyparts:</strong> {{ $bodyParts }}</h6>
                                        <hr>

                                        <!-- show cardio workout if it exists -->
                                        @if ($cardio != 'none')
                                            <h6><strong>Cardio:</strong> {{ $cardio }}</h6>
                                            <h6 class='indentedText'>{{ $randomCardioExercise }}</h6>
                                            <hr>
                                        @endif

                                        <!-- [ [one,two], [three,four] ] -->
                                        <h6><strong>Main exercises:</strong></h6>
                                        @foreach ($finalExercises as $bodyPartExercises)
                                            @foreach ($bodyPartExercises as $exercise)
                                                <h6 class='indentedText'>&#x2022; {{ $exercise[0] }}</h6>
                                                <h6 class='indentedTextTwo'>{{ $exercise[1] }}</h6>
                                            @endforeach
                                        @endforeach
                                        <hr>

                                        <!-- show cardio workout if it exists -->
                                        @if ($abs == 'true')
                                            <h6><strong>Ab workout:</strong></h6>
                                            @foreach ($randomAbExercises as $abExercise)
                                                <h6 class='indentedText'>&#x2022; {{ $abExercise[0] }}</h6>
                                                <h6 class='indentedTextTwo'>{{ $abExercise[1] }}</h6>
                                            @endforeach
                                            <hr>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class='row'>
                        <div class='column'
                            @if ($generatingRandomWorkout == 'false') style='text-align:center;width:50%;' @else style='text-align:center;width:100%;' @endif>
                            <form action='/saveWorkout' method='POST'>
                                {{ csrf_field() }}

                                <!-- name -->
                                <input type='hidden' name='name' value='{{ old('name') }}'>
                                <!-- body parts -->
                                <input type='hidden' name='bodyPartsArray' value='{{ $bodyPartsArray }}'>
                                <!-- cardio if it exists -->
                                <input type='hidden' name='cardioString' value='{{ $cardioString }}'>
                                <!-- main exercises -->
                                <input type='hidden' name='mainExercisesArray' value='{{ $mainExercisesArray }}'>
                                <!-- ab exercises if they exist -->
                                <input type='hidden' name='absArray' value='{{ $absArray }}'>

                                <button type='submit' class='resultButton customButton' name='save' value='save'
                                    test='saveWorkoutButton'>Save
                                    Workout</button>
                            </form>
                        </div>
                        <!-- don't show this button if the user clicked random workout -->
                        @if ($generatingRandomWorkout == 'false')
                            <div class='column' style='text-align:center;width:50%;'>
                                <button class='resultButton customButton' value='regenerateForm'
                                    onclick='regenerateForm()' test='regenerateWorkoutButton'>
                                    Re-generate Workout</button>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
            <!-- table view of user's saved workouts -->
            <div style='text-align:center;margin: 50px;'>

                <hr>

                <!-- show table if there are saved workouts -->
                @if (count($usersWorkouts) > 0)
                    <h5 style='padding-top:30px;'>Your Saved Workouts:</h5>
                    <table class='workoutsTable'>
                        <tr class='tableHeader'>
                            <th class='headerItem'>ID</th>
                            <th class='headerItem'>Workout Name</th>
                            <th class='headerItem'>Created On</th>
                            <th class='headerItem'>Body Parts</th>
                        </tr>

                        @foreach ($usersWorkouts as $workout)
                            <tr class='customTableRow' onclick="location.href='/workout/{{ $workout['id'] }}';">
                                <div>
                                    <td>{{ $workout['id'] }}</td>
                                    <td>{{ $workout['name'] }}</td>
                                    <td>{{ date('d-m-Y', strtotime($workout['created_at'])) }}</td>
                                    <td>{{ $workout['body_part_description'] }}</td>
                                </div>
                            </tr>
                        @endforeach

                    </table>
                @else
                    <h6 style='padding-top:35px;'>You don't have any saved workouts yet!</h6>
                @endif

            </div>
        @endif

    </body>

    @if ($generatingWorkout == 'false')
        <script>
            $(document).ready(function() {
                $('#results').hide();
            });
        </script>
    @else
        <script>
            $(document).ready(function() {
                $('#results').show();
            });
        </script>
    @endif

    <script>
        // hide some elements on page load
        $(document).ready(function() {
            $('#mainFormSection').hide();
        });

        function showForm() {
            $('#mainFormSection').show();
        }

        function hideForm() {
            $('#mainFormSection').hide();
        }

        function hideResults() {
            $('#results').hide();
        }

        function regenerateForm() {
            $('#dailyWorkoutForm').trigger('submit');
        }
    </script>

    @if (count($errors) > 0)
        <script>
            $(document).ready(function() {
                $('#mainFormSection').show();
            });
        </script>
    @endif


    </html>
@endsection
