<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

        <!-- Hoja de estilos -->
        @vite(['resources/css/front.css'])
        <!--<link rel="stylesheet" href="{{ asset('css/app.css') }}">-->

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!--:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.:.-->
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style5.css">

        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
        <link   rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        >
        <!-- JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


        <title>Interfaz Base de datos</title>
    </head>
    <body>
        <!--https://codepen.io/codervishwas/pen/OJmGyWQ-->
        <!--https://www.youtube.com/watch?v=_MrShB9fh7U-->
        <header class="header color-fondo-hf color-letras-hf">
            <!-- Barra de navegación -->
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">

                        <a class="navbar-brand" href="/proyectoAragon/public/main"><img src="{{ url('images/logo.png') }}" id="logo"></a>
                        <h5 class="d-none d-lg-block">Empresa</h5>

                        <!-- Botón hamburguesa -->
                        <button class="navbar-toggler collapsed d-flex d-lg-none flex-column justify-content-around" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon top-bar"></span>
                            <span class="toggler-icon middle-bar"></span>
                            <span class="toggler-icon bottom-bar"></span>
                        </button>

                        <!-- Menú -->
                        <div class="collapse navbar-collapse ms-lg-5" id="navbarNav">
                            <ul class="navbar-nav">
                                <!--
                                <li class="nav-item">
                                    <a class="nav-link active text-reset" aria-current="page" href="/proyectoAragon/public/main">Home</a>
                                </li>-->
                                <li class="nav-item">
                                    <a class="nav-link active text-reset" aria-current="page" href="/proyectoAragon/public/about">Quiénes somos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active text-reset" aria-current="page" href="/proyectoAragon/public/blog">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active text-reset" aria-current="page" href="/proyectoAragon/public/contact">Contacto</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Fin de menú -->

                        <!-- Login/Register -->
                        <div class="col-auto">
                            <a href="#" class="text-reset pr-2">Login</a>
                            <!--<a href="#" class="text-reset">Register</a>-->
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Fin del header -->
            <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        </header>
        <main>
            <!-- Contenido main -->
                <!-- Cuatro tarjetas con entradas de blog -->

        </main>
        <!--https://www.youtube.com/watch?v=KIEZqYZhcEU-->
        <!--https://www.youtube.com/watch?v=PSD5pFi6bx4-->
        <!--https://www.youtube.com/watch?v=CM_iZHTEZ3s-->
        <footer class="footer color-fondo-hf color-letras-hf text-white py-4">
            <!-- footer -->
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light justify-content-around">
                    <div class="container-fluid">

                        <!-- Logo -->
                        <a href="/proyectoAragon/public/main" class="col-lg-4 d-flex align-items-center">
                            <img    src="{{ url('images/logo.png') }}"
                                    alt="logo"
                                    class="img-logo mr-2"
                                    id="logo">
                        </a>

                        <!-- Dirección de la empresa -->
                        <ul class="col-lg-4 col-sm-12 list-unstyled">
                            <li class="text-reset">Dirección Plaza Mayor</li>
                            <li class="text-reset">28012, Madrid, España</li>
                            <li class="text-reset">Distrito Sol</li>
                        </ul>

                        <!-- Redes sociales -->
                        <ul class="col-lg-4 list-unstyled">
                            <li class="font-weight-bold text-uppercase">Nuestras redes sociales:</li>
                            <li class="d-flex justify-content-between">
                                <a href="https://twitter.com/?lang=es" class="text-reset">
                                    <i class="fab fa-twitter" id="twitter"></i>
                                </a>
                                <a href="https://es-es.facebook.com/" class="text-reset">
                                    <i class="fab fa-facebook-f" id="facebook"></i>
                                </a>
                                <a href="https://www.instagram.com/" class="text-reset">
                                    <i class="fab fa-instagram" id="instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </footer>
    </body>