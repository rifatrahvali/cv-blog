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

    <header class="border-bottom lh-1 py-3">
        <div class="container">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="link-secondary text-body-emphasis" href="{{ route('cv') }}">Siteye Git</a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#">
                        "In omnibus requiem quaesivi." <br>
                            — "Her şeyde huzuru aradım."
                    </a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="btn btn-sm btn-outline-secondary text-body-emphasis btn-admin" href="#">Admin</a>
                </div>
            </div>
        </div>
    </header>


    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content') <!-- İçerik Alanı -->
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>