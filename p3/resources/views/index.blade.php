@extends('template')

@section('title')
    {{ $title }}
@endsection

@section('head')
    <link href='/css/style.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
@endsection

@section('content')
    @if (Auth::user())
        <h2>
            Hello {{ Auth::user()->name }}!
        </h2>
    @endif

    <body>

        <div class='row' style='margin:auto; width:70%;'>
            <div class='column' style='text-align:center;width:50%;'>
                <button class='formButtonTwo' value='showForm' onclick='showForm()'>Create New
                    Workout</button>
            </div>
            <div class='column' style='text-align:center;width:50%;'>
                <!-- figure out random workout here -->

                <form action='/randomWorkout' method='POST'>
                    {{ csrf_field() }}
                    <button type='submit' class='formButtonTwo' name='random' value='random'>Generate Random
                        Workout</button>
                </form>
            </div>
            <hr>
        </div>

        <section class='mainFormSection' id='mainFormSection'>
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
                        <br>
                        <input type='text' name='name' value='{{ old('name') }}'>
                        <hr>

                        <label for='bodyParts'>
                            Body part(s):
                        </label>
                        <br>
                        <input type='checkbox' id='chest' name='chest' value='true'
                            {{ old('chest') ? 'checked' : '' }}>
                        <label for='chest'>chest</label><br>
                        <input type='checkbox' id='back' name='back' value='true'
                            {{ old('back') ? 'checked' : '' }}>
                        <label for='back'>back</label><br>
                        <input type='checkbox' id="shoulders" name="shoulders" value="true"
                            {{ old('shoulders') ? 'checked' : '' }}>
                        <label for='shoulders'>shoulders</label><br>
                        <input type='checkbox' id='legs' name='legs' value='true'
                            {{ old('legs') ? 'checked' : '' }}>
                        <label for='legs'>legs</label><br>
                        <input type='checkbox' id='biceps' name='biceps' value='true'
                            {{ old('biceps') ? 'checked' : '' }}>
                        <label for='biceps'>biceps</label><br>
                        <input type='checkbox' id='triceps' name='triceps' value='true'
                            {{ old('triceps') ? 'checked' : '' }}>
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
                            <option value='run' @if (old('cardio') == 'run') selected='selected' @endif>run</option>
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
                        <button type='submit' class='formButtonTwo'>Generate Workout</button>
                    </div>
                </form>
            </div>
            <!-- Show any errors -->
            <div class='container'>
                <div class='row'>
                    <div class='col'>
                        @if (count($errors) > 0)
                            <div class='errorDiv'>
                                <div class='errorHeader'>
                                    <h4><strong>Errors</strong></h4>
                                    <hr>
                                </div>
                                <ul class='textLeft'>
                                    @foreach ($errors->all() as $error)
                                        <li class='listItem'>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section id='results'>
            <!-- Show results after form is submitted -->
            <hr>
            <div class='container results'>
                <div class='row'>
                    <div class='col'>
                        @if (!is_null($name))
                            <div class='resultsDiv'>
                                <div class='resultsHeader'>
                                    <h5 style='padding-bottom:10px;'><strong>{{ $name }}</strong></h5>
                                    <h6><strong>Bodyparts:</strong> {{ $bodyParts }}</h6>
                                    <h6><strong>Create on:</strong> </h6>
                                    <hr>

                                    <h6><strong>Cardio:</strong> {{ $cardio }}</h6>
                                    <h6 class='indentedText'>{{ $randomCardioExercise }}</h6>
                                    <hr>

                                    <!-- [ [one,two], [three,four] ] -->
                                    <h6><strong>Main exercises:</strong></h6>
                                    @foreach ($finalExercises as $bodyPartExercises)
                                        @foreach ($bodyPartExercises as $exercise)
                                            <h6 class='indentedText'>&#x2022; {{ $exercise[0] }}</h6>
                                            <h6 class='indentedTextTwo'>{{ $exercise[1] }}</h6>
                                        @endforeach
                                    @endforeach
                                    <hr>

                                    <h6><strong>Ab workout:</strong> {{ $abs }}</h6>
                                    @foreach ($randomAbExercises as $abExercise)
                                        <h6 class='indentedText'>{{ $abExercise }}</h6>
                                    @endforeach
                                    <hr>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class='row'>
                    <div class='column' style='text-align:center;width:50%;'>
                        <button type='submit' class='resultButton'>Save Workout</button>
                    </div>
                    <div class='column' style='text-align:center;width:50%;'>
                        <button type='submit' class='resultButton'>Re-generate Workout</button>
                    </div>
                </div>
            </div>
        </section>

        <div style='text-align:center;margin: 50px;'>
            <hr>
            <h5 style='padding-top:15px;'><strong>Saved Workouts:</strong></h5>
            <table class='workoutsTable'>
                <tr class='tableHeader'>
                    <th class='headerItem'>Workout Name</th>
                    <th class='headerItem'>Created On</th>
                    <th class='headerItem'>Body Parts</th>
                </tr>
                <tr>
                    <td>Workout One</td>
                    <td>April 19, 2023</td>
                    <td>Chest and Triceps</td>
                </tr>
                <tr>
                    <td>Workout Two</td>
                    <td>April 19, 2023</td>
                    <td>Back and Biceps</td>
                </tr>
                <tr>
                    <td>Workout Three</td>
                    <td>April 19, 2023</td>
                    <td>Legs</td>
                </tr>
                <tr>
                    <td>Workout Four</td>
                    <td>April 19, 2023</td>
                    <td>Shoulders</td>
                </tr>
            </table>
        </div>

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
    </script>

    </html>
@endsection
