<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/styles.css') }}">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-icons.css') }}">
</head>

<body>

    @include('layouts.partials.admin.header') <!-- Header buradan geliyor -->

    @include('layouts.partials.admin.messages') <!-- Durum Güncelleme mesajları buradan geliyor -->

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content') <!-- İçerik Alanı -->
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>