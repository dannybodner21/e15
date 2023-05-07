@extends('template')

@section('title')
    Register
@endsection

@section('content')

    <body>
        <div class=''>
            <div class='d-flex align-items-center justify-content-center'>
                <div class='loginDiv'>
                    <h5 class='header'>Register</h5>
                    <form method='POST' action='/register'>

                        {{ csrf_field() }}
                        <!--<label for='name' style='margin-bottom:0px;'>Name</label>-->
                        <input id='name' type='text' name='name' value='{{ old('name') }}' autofocus
                            placeholder='Name'>
                        @include('includes.error-field', ['fieldName' => 'name'])

                        <!--<label for='email'>E-Mail Address</label>-->
                        <input id='email' type='email' name='email' value='{{ old('email') }}'
                            placeholder='Email Address'>
                        @include('includes.error-field', ['fieldName' => 'email'])

                        <!--<label for='password'>Password (min: 8)</label>-->
                        <input id='password' type='password' name='password' placeholder='Password (min: 8 char)'>
                        @include('includes.error-field', ['fieldName' => 'password'])

                        <!--<label for='password-confirm'>Confirm Password</label>-->
                        <input id='password-confirm' type='password' name='password_confirmation'
                            placeholder='Confirm  Password'>

                        <button type='submit' class='formButton customButton'>Register</button>

                    </form>
                    <p class='subtext'>
                        Already have an account? <a href='/login' class='customLink'>Login here...</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
@endsection
