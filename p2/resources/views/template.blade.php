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

    <header>
        <h2><strong>Portfolio Projector</strong></h2>
        <p class='subtext'>Calculate your cryptocurrency portfolio's future worth based on your own price projections
        </p>
        <hr class='customHR'>
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        &copy; Portfolio Projector, Inc.
    </footer>

</body>

</html>
