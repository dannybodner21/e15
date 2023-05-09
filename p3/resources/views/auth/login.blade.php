@extends('template')

@section('title')
    Login
@endsection

@section('content')

    <body class='loginBackground'>
        <div class='container'>
            <div class='d-flex align-items-center justify-content-center'>
                <div class='loginDiv'>
                    <h5 class='header'>Login</h5>

                    <!-- Login form -->
                    <form method='POST' action='/login'>

                        {{ csrf_field() }}

                        <input id='email' type='email' name='email' value='{{ old('email') }}' autofocus
                            placeholder='Email Address'>
                        @include('includes.error-field', ['fieldName' => 'email'])

                        <input id='password' type='password' name='password' placeholder='Password'>
                        @include('includes.error-field', ['fieldName' => 'password'])

                        <label class='formLabel' style='margin-top: 10px;'>
                            <input type='checkbox' name='remember' {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                        <br>
                        <div class='formButtonDiv'>
                            <button class='formButton customButton' type='submit'>Login</button>
                        </div>

                    </form>
                    <p class='subtext'>
                        Don’t have an account? <a href='/register' class='customLink'>Register here...</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
@endsection
