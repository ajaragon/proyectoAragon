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
        <header class="header">
            <!-- Barra de navegación -->
            <nav class="navbar
                        color-navbar
                        background-navbar
                        bg-dark
                        navbar-expand-md
                        text-uppercase">

                <div class="container">
                    
                        <!-- Nombre de la empresa y el logo -->
                        <a class="navbar-brand" href="#">
                        <img    src="{{ url('images/logo.png') }}"
                                alt="logo"
                                class="img-logo mr-2"
                                id="logo">Empresa
                        </a>
                        
                        <!-- Donde se oculta el menú en pantallas más pequeñas -->
                        <button     data-bs-toggle="collapse" 
                                    data-bs-target="header-menu"
                                    type="button" 
                                    class="navbar-toggler">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                                
                        <!-- Páginas del sitio web -->
                        <div class="collapse navbar-collapse" id="header-menu">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="active nav-link" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Quiénes somos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contáctanos</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Cambiar idioma -->

                </div>
            </nav>
            <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        </header>
        <main>

            <!-- Contenido del main -->
                    <!--
                        -Servicios que ofrece
                            .Recepción
                            .Sacrificio
                            .Almacenamiento

                            .Halal
                            .Bovino
                            .Vacuno
                        -iframe de la localización
                        -Certificados
                        -Imágenes del negocio
                    -->
                        <!-- Logo + nombre de la empresa -->
                        <!-- Navigation -->
                    <!--https://codepen.io/taviskaron01/pen/MWrrLzZ-->

        </main>
        <!--https://www.youtube.com/watch?v=KIEZqYZhcEU-->
        <!--https://www.youtube.com/watch?v=PSD5pFi6bx4-->
        <!--https://www.youtube.com/watch?v=CM_iZHTEZ3s-->
        <footer class="footer bg-dark text-white py-4">
            <div class="container">
                <nav class="row">

                    <!-- Logo -->
                    <a href="#" class="col-4 d-flex align-items-center">
                        <img    src="{{ url('images/logo.png') }}"
                                alt="logo"
                                class="img-logo mr-2"
                                id="logo">
                    </a>

                    <!-- Dirección de la empresa -->
                    <ul class="col-4 list-unstyled">
                        <li>Dirección Plaza Mayor</li>
                        <li>28012, Madrid, España</li>
                        <li>Distrito Sol</li>
                    </ul>

                    <!-- Redes sociales -->
                    <ul class="col-4 list-unstyled">
                        <li class="font-weight-bold text-uppercase">Nuestras redes sociales:</li>
                        <li class="d-flex justify-content-between">
                            <a href="#">
                                <i class="fab fa-twitter" id="twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-facebook-f" id="facebook"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-instagram" id="instagram"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </footer>
    </body>