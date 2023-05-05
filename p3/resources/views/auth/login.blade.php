<!doctype html>
<html lang='en'>

<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>
    <link href='/css/style.css' type='text/css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @yield('head')
</head>

<body class='loginBackground'>
    <div class='container'>
        <div class='d-flex align-items-center justify-content-center'>
            <div class='loginDiv'>
                <h6 class='header' style='padding-bottom:0px;'>Login</h6>
                <hr class='customHR'>
                <form method='POST' action='/login'>

                    {{ csrf_field() }}

                    <label class='formLabel' for='email'>E-Mail Address</label>
                    <input id='email' type='email' name='email' value='{{ old('email') }}' autofocus>
                    @include('includes.error-field', ['fieldName' => 'email'])

                    <label class='formLabel' for='password'>Password</label>
                    <input id='password' type='password' name='password'>
                    @include('includes.error-field', ['fieldName' => 'password'])

                    <label style='margin-top: 10px;'>
                        <input type='checkbox' name='remember' {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                    <br>
                    <div class='formButtonDiv'>
                        <button class='formButton custom-btn btn-5' type='submit'>Login</button>
                    </div>

                </form>
                <p class='subtext'>
                    Don’t have an account? <a href='/register'>Register here...</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
