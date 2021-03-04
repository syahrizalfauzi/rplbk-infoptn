<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        html {
            position: relative;
            min-height: 100%;
            scroll-behavior: smooth;
        }

        main {
            padding-bottom: 120px;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none !important;
            color: #000;
        }

        .zoom {

            transition: transform .2s;
        }

        .zoom:hover {
            transform: scale(1.01);
        }

        .zoom:active {
            transform: scale(0.99);
        }

    </style>

    <title>@yield('title')</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <header class="navbar navbar-expand-lg navbar-light bg-light">
        <nav class="container">
            <a class="navbar-brand" href="{{ url('/') }}">PTNInfo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="ml-auto collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto nav-pills">
                    <li class="nav-item">
                        <a class="nav-link @if ($__env->yieldContent('navlink') == 'Home') active text-white @endif " href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($__env->yieldContent('navlink') == 'About') active text-white @endif" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($__env->yieldContent('navlink') == 'Log in') active text-white @endif" href="{{ url('/login') }}">Log
                            in</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main role="main" class="container my-4">
        @yield('content')
    </main>

    <footer class="footer p-4">
        <div class="container text-muted">
            <p>
                Dibuat oleh kelompok 1 mata kuliah Rekayasa Perangkat Lunak Berbasis Komponen kelas B <br>
                Departemen Teknik Komputer, Fakultas Teknik <br>
                Universitas Diponegoro @ 2021
            </p>

        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>


</html>
