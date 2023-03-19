@extends('template')

@section('title')
    {{ $title }}
@endsection

@section('head')
    <link href='/css/style.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
@endsection

@section('content')

    <section>
        <!-- Create form -->
        <form class='calculateForm' method='GET' action='/calculate'>
            <!-- Amount of cryptocurrencies -->
            <div class='sectionHeader'>
                <label for='amountOfCryptos'>
                    How many cryptocurrencies do you own:
                </label>
                <select name='amountOfCryptos' id='amountOfCryptos'>
                    <option value='1' @if (old('amountOfCryptos') == 1) selected='selected' @endif>1</option>
                    <option value='2' @if (old('amountOfCryptos') == 2) selected='selected' @endif>2</option>
                    <option value='3' @if (old('amountOfCryptos') == 3) selected='selected' @endif>3</option>
                </select>
            </div>
            <hr class='customHRTwo'>

            <div class='container containerAdditional' id='formContainer'>
                <div class='row'>
                    <div class='col' id='colOne'>
                        <!-- Crytpocurrency 1 -->
                        <div class='formDiv'>
                            <div class='cryptoHeader'>
                                <h4><strong>Cryptocurrency 1</strong></h4>
                                <hr>
                            </div>
                            <label for='cryptoNameOne'>
                                Name of your cryptocurrency:
                            </label>
                            <br>
                            <textarea name='cryptoNameOne'>{{ old('cryptoNameOne') }}</textarea>
                            <hr>
                            <label for='cryptoQuantityOne'>
                                Quantity:
                            </label>
                            <br>
                            <input type='text' name='cryptoQuantityOne' value='{{ old('cryptoQuantityOne') }}'>
                            <hr>
                            <label for='cryptoPriceOne'>
                                Projected future price:
                            </label>
                            <br>
                            <input type='text' name='cryptoPriceOne' value='{{ old('cryptoPriceOne') }}'>
                            <br>
                        </div>
                    </div>
                    <div class='col' id='colTwo'>
                        <!-- Cryptocurrency 2 -->
                        <div class='formDiv'>
                            <div class='cryptoHeader'>
                                <h4><strong>Cryptocurrency 2</strong></h4>
                                <hr>
                            </div>
                            <label for='cryptoNameTwo'>
                                Name of your cryptocurrency:
                            </label>
                            <br>
                            <textarea name='cryptoNameTwo'>{{ old('cryptoNameTwo') }}</textarea>
                            <hr>
                            <label for='cryptoQuantityTwo'>
                                Quantity:
                            </label>
                            <br>
                            <input type='text' name='cryptoQuantityTwo' value='{{ old('cryptoQuantityTwo') }}'>
                            <hr>
                            <label for='cryptoPriceTwo'>
                                Projected future price:
                            </label>
                            <br>
                            <input type='text' name='cryptoPriceTwo' value='{{ old('cryptoPriceTwo') }}'>
                            <br>
                        </div>
                    </div>
                    <div class='col' id='colThree'>
                        <!-- Cryptocurrency 3 -->
                        <div class='formDiv'>
                            <div class='cryptoHeader'>
                                <h4><strong>Cryptocurrency 3</strong></h4>
                                <hr>
                            </div>
                            <label for='cryptoNameThree'>
                                Name of your cryptocurrency:
                            </label>
                            <br>
                            <textarea name='cryptoNameThree'>{{ old('cryptoNameThree') }}</textarea>
                            <hr>
                            <label for='cryptoQuantityThree'>
                                Quantity:
                            </label>
                            <br>
                            <input type='text' name='cryptoQuantityThree' value='{{ old('cryptoQuantityThree') }}'>
                            <hr>
                            <label for='cryptoPriceThree'>
                                Projected future price:
                            </label>
                            <br>
                            <input type='text' name='cryptoPriceThree' value='{{ old('cryptoPriceThree') }}'>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class='buttonDiv'>
                <button type='submit' class='calculateButton'>Calculate</button>
            </div>
        </form>
    </section>
    <section>
        <!-- Show any errors -->
        <div class='container containerAdditional'>
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

        <hr class='customHRTwo'>

        <!-- Show results -->
        <div class='container containerAdditional'>
            <div class='row'>
                <div class='col'>
                    @if (!is_null($totalCryptoWorthSentence))
                        <div class='resultsDiv'>
                            <div class='resultsHeader'>
                                <h4><strong>Your Portfolio</strong></h4>
                                <hr>
                            </div>
                            <div class='sentence'>
                                <p>{{ $cryptoOneSentence }}</p>
                                <hr>
                                @if ($amountOfCryptos >= 2)
                                    <p>{{ $cryptoTwoSentence }}</p>
                                    <hr>
                                @endif
                                @if ($amountOfCryptos == 3)
                                    <p>{{ $cryptoThreeSentence }}</p>
                                    <hr>
                                @endif
                                <p>{{ $totalCryptoWorthSentence }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Javascript to handle show/hide on form elements -->
    @if (old('amountOfCryptos') == 3)
        <script>
            $('#colOne').show();
            $('#colTwo').show();
            $('#colThree').show();
            document.getElementById('formContainer').style.maxWidth = '100%';
        </script>
    @elseif (old('amountOfCryptos') == 2)
        <script>
            $('#colOne').show();
            $('#colTwo').show();
            $('#colThree').hide();
            document.getElementById('formContainer').style.maxWidth = '80%';
        </script>
    @else
        <script>
            $('#colOne').show();
            $('#colTwo').hide();
            $('#colThree').hide();
            document.getElementById('formContainer').style.maxWidth = '40%';
        </script>
    @endif
    <script>
        $(function() {
            $('#amountOfCryptos').on('change', function() {
                if (this.value == '1') {
                    $('#colOne').show();
                    $('#colTwo').hide();
                    $('#colThree').hide();
                    document.getElementById('formContainer').style.maxWidth = '40%';
                } else if (this.value == '2') {
                    $('#colOne').show();
                    $('#colTwo').show();
                    $('#colThree').hide();
                    document.getElementById('formContainer').style.maxWidth = '80%';
                } else {
                    $('#colOne').show();
                    $('#colTwo').show();
                    $('#colThree').show();
                    document.getElementById('formContainer').style.maxWidth = '100%';
                }
            });
        });
    </script>

@endsection
