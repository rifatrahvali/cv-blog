<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV</title>

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/styles.css') }}">

</head>

<body>
    <div id="app">
        @yield('content')
    </div>

    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>