@extends('template')

@section('content')

    <body>
        <div class=''>
            <div class='d-flex align-items-center justify-content-center'>
                <div class='loginDiv'>
                    <h6 class='header' style='padding-bottom:0px;'>Register</h6>
                    <hr class='customHR'>
                    <form method='POST' action='/register'>

                        {{ csrf_field() }}
                        <div>
                            <label for='name' style='margin-bottom:0px;'>Name</label>
                            <input style='margin-bottom:20px;' id='name' type='text' name='name'
                                value='{{ old('name') }}' autofocus>
                        </div>
                        @include('includes.error-field', ['fieldName' => 'name'])


                        <label for='email'>E-Mail Address</label>
                        <input id='email' type='email' name='email' value='{{ old('email') }}'>
                        @include('includes.error-field', ['fieldName' => 'email'])

                        <label for='password'>Password (min: 8)</label>
                        <input id='password' type='password' name='password'>
                        @include('includes.error-field', ['fieldName' => 'password'])

                        <label for='password-confirm'>Confirm Password</label>
                        <input id='password-confirm' type='password' name='password_confirmation'>

                        <button type='submit' class='formButton custom-btn btn-5'>Register</button>

                    </form>
                    <p class='subtext'>
                        Already have an account? <a href='/login'>Login here...</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
@endsection
