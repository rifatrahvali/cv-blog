<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/styles.css') }}">

    <title>Blog</title>
</head>
<body class="bg-light">
    
    @yield('blog-content')

    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>