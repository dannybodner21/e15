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
            <div>
                <h6>Please <a href='/login'>login</a> to create and save workouts!</h6>
            </div>
        @else
            <!-- user is logged in -->
            <section style='padding-top:20px;padding-bottom:50px;' id='results'>
                <!-- Show workout -->
                <div class='container results'>
                    <div class='row'>
                        <div class='col'>
                            @if (!is_null($name))
                                <div class='resultsDiv'>
                                    <div class='resultsHeader'>
                                        <h5 style='padding-bottom:20px;text-align:center;'>
                                            <strong>{{ $name }}</strong>
                                        </h5>
                                        <h6><strong>Bodyparts:</strong> {{ $bodyParts }}</h6>
                                        <h6><strong>Create on:</strong> {{ $date }} </h6>
                                        <hr>

                                        <!-- show cardio workout if it exists -->
                                        @if ($cardio == true)
                                            <h6><strong>Cardio:</strong> {{ $cardioType }}</h6>
                                            <h6 class='indentedText'>{{ $cardioExercises }}</h6>
                                            <hr>
                                        @endif

                                        <!-- [ [one,two], [three,four] ] -->
                                        <h6><strong>Main exercises:</strong></h6>
                                        @foreach ($mainExercisesArray as $exercise)
                                            <h6 class='indentedText'>&#x2022; {{ $exercise[0] }}</h6>
                                            <h6 class='indentedTextTwo'>{{ $exercise[1] }}</h6>
                                        @endforeach
                                        <hr>

                                        <!-- show cardio workout if it exists -->
                                        @if ($abs == 'true')
                                            <h6><strong>Ab workout:</strong></h6>
                                            @foreach ($abExercises as $abExercise)
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
                        <div class='column' style='text-align:center;width:100%;'>
                            <form action='/deleteWorkout/{{ $id }}' method='POST'>
                                {{ csrf_field() }}

                                <!--
                                                    <input type='hidden' name='id' value=>
                                                    -->

                                <button type='submit' class='resultButton customButton' name='delete'
                                    value='delete'>Delete
                                    Workout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>



        @endif

    </body>

    </html>
@endsection
