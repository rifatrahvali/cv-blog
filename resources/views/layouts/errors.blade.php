<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hata') - {{ config('app.name', 'Laravel') }}</title>
    
    <!-- Stil Dosyaları -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/styles.css') }}">
</head>
<body class="bg-light">
    <!-- Hata Sayfası İçeriği -->
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        @yield('content') <!-- Sayfaya özel içerik buraya eklenir -->
    </div>

    <!-- JavaScript Dosyaları -->
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>