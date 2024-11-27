<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/styles.css') }}">

    <title>-</title>
</head>
<body class="bg-light">
    <div class="container">
        @include('layouts.partials.admin.messages') <!-- Durum Güncelleme mesajları buradan geliyor -->   
    </div>  

    @yield('auth-content')

    <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>