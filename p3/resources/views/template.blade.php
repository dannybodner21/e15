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

<body>

    <header style='margin:0px;'>
        <nav>
            <ul>
                <!-- ...Other nav links here... -->
                <li>P3</li>

                <li>
                    @if (!Auth::user())
                        <a href='/login'>Login</a>
                    @else
                        <form method='POST' id='logout' action='/logout'>
                            {{ csrf_field() }}
                            <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a>
                        </form>
                    @endif
                </li>
                <li>Two</li>
                <li>Three</li>
            </ul>
        </nav>
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        &copy; P3, Inc.
    </footer>

</body>

</html>
