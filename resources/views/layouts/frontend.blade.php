<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - Blog</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        html {
            overflow-y: scroll;
            /* Her zaman dikey kaydırma çubuğunu göster */
        }

        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            border-radius: 0;
        }

        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid black;
            margin: 20px auto;
        }

        .section-title {
            font-weight: bold;
            font-size: 1.2rem;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .line {
            border-bottom: 2px solid black;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .horizontal-left-line {
            border-left: 2px solid black;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .contact-info,
        .social-icons,
        .contact-icons {
            text-align: center;
        }

        .social-icons a {
            text-decoration: none;
            color: black;
            padding-left: 5px;
        }

        .contact-icons i {
            font-size: 24px;
            margin: 0 10px;
            color: black;
        }

        .right-align {
            text-align: right;
        }
    </style>
</head>

<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- JavaScript Dosyaları -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>