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
    <body class="bg-blanco">
        <!--https://codepen.io/codervishwas/pen/OJmGyWQ-->
        <!--https://www.youtube.com/watch?v=_MrShB9fh7U-->
        <header class="header bg-azul-oscuro c-blanco">

                <!-- Barra de navegación superior -->
                <nav class="navbar navbar-expand-lg">
                    
                        <!-- Logo -->
                        <a  class="navbar-brand" 
                            href="/proyectoAragon/public/main"><img 
                            src="{{ url('images/logo.png') }}" 
                            id="logo"></a>
                        <h5 class="d-none d-lg-block">Empresa</h5>

                        <!-- Botón hamburguesa -->
                        <button     class="navbar-toggler collapsed d-flex d-lg-none flex-column justify-content-around" 
                                    type="button" 
                                    data-bs-toggle="collapse" 
                                    data-bs-target="#navbarNav" 
                                    aria-controls="navbarNav" 
                                    aria-expanded="false" 
                                    aria-label="Toggle navigation">
                            <span class="toggler-icon top-bar"></span>
                            <span class="toggler-icon middle-bar"></span>
                            <span class="toggler-icon bottom-bar"></span>
                        </button>
                        <!-- fin del botón hamburguesa -->

                        <!-- Menú -->
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
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
                                <li>
                                    <!-- Para poder acceder nuevamente a la intranet -->
                                    @role(['administrador', 'escritor' ''consultor])
                                    <a class="nav-link active text-reset" aria-current="page" href="{{ route('home') }}">Consultas</a>
                                    @enrol
                                </li>
                                <!-- Login -->
                                @guest
                                    @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link c-rosa login" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @endif
                                @else
                                <li class="nav-item dropdown">
                                    <a  id="navbarDropdown" 
                                        class="nav-link dropdown-toggle login c-rosa" 
                                        href="#" role="button" 
                                        data-bs-toggle="dropdown" 
                                        aria-haspopup="true" 
                                        aria-expanded="false" 
                                        v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <a class="dropdown-item">Otra cosa</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                                <!-- fin del login -->
                            </ul>
                        <!-- Fin de menú -->
                </nav>
            </div>
            <!-- Fin del header -->
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
                    -->
                        <!-- Logo + nombre de la empresa -->
                        <!-- Navigation -->
                    <!--https://codepen.io/taviskaron01/pen/MWrrLzZ-->
                    <!--https://mataderodehuesca.com/#block-block-4-->
                    <!--https://www.youtube.com/watch?v=CZ_fUrs3tL4&list=PLUW3XAK9O3HHv6LPCxTDLvg_YQMVNeiJZ&index=3-->
            
            <!-- Barra de navegación inferior -->
            <nav class="navbar navbar-expand-lg bg-azul-claro c-blanco front-to-back" id="navbar-inferior">

                
            </nav>
                
            <!-- Sección servicios -->
            <section class="text-reset text-center p-4">
                <h4>EMPRESA</h4>
                <p>Empresa familiar dedicada a la ganadería desde 1990</p>
                
                <hr class="c-azul-claro">
                    
                <div class="row justify-content-center">
                    <!-- Recepción -->
                    <div class="col-lg-4 col-md-12">
                        <div class="image">
                            <div id="zoom-In">
                                <figure>
                                    <img src="{{ url('images/galeria-rebaño.jpg') }}" alt="rebaño" class="img-z"/>
                                </figure>
                                <h6>Nos encargamos de la recepción de los animales</h6>   
                            </div>
                        </div>
                    </div>
                    <!-- Sacrificio -->
                    <div class="col-lg-4 col-md-12">
                        <div class="image">
                            <div id="zoom-In">
                                <figure>
                                    <img src="{{ url('images/galeria-corrales-2.jpg') }}" alt="corrales" class="img-z"/>
                                </figure>
                                <h6>Nos encargamos del sacrificio de los animales</h6>   
                            </div>
                        </div>
                    </div>
                    <!-- Conservación -->
                    <div class="col-lg-4 col-md-12">
                        <div class="image">
                            <div id="zoom-In">
                                <figure>
                                    <img src="{{ url('images/galeria-matadero-1.jpg') }}" alt="matadero" class="img-z"/>
                                </figure>
                                <h6>Nos encargamos de la conservación de las piezas de los animales</h6>   
                            </div> 
                        </div> 
                    </div>
                </div>
            </section>
            <!-- Fin de la sección servicios -->
            <!--
            <section class="iframe align-content-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1205.5241693150017!2d-3.7067995896263244!3d40.41482319885855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1smadrid%20plaza%20mayor!5e0!3m2!1ses!2ses!4v1685311921344!5m2!1ses!2ses" 
                        width="600" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </section>
            -->
        </main>
        <!--https://www.youtube.com/watch?v=KIEZqYZhcEU-->
        <!--https://www.youtube.com/watch?v=PSD5pFi6bx4-->
        <!--https://www.youtube.com/watch?v=CM_iZHTEZ3s-->
        <footer class="footer bg-azul-oscuro c-blanco text-white py-4">
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