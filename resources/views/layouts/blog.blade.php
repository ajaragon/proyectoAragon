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
                                    <a class="nav-link active text-reset" aria-current="page" href="/proyectoAragon/public/main">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active text-reset" aria-current="page" href="/proyectoAragon/public/about">Quiénes somos</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link active text-reset" aria-current="page" href="/proyectoAragon/public/contact">Contacto</a>
                                </li>
                                <li>
                                    <!-- Para poder acceder nuevamente a la intranet -->
                                    @role(['administrador', 'escritor' ''consultor])
                                    <a class="nav-link active text-reset" aria-current="page" href="{{ route('home') }}">Consultas</a>
                                    @endrole
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
            <!-- Contenido -->
            <!-- Introducción al blog -->
            <!-- Cuatro tarjetas de entradas de blog -->

            <nav class="navbar navbar-expand-lg bg-azul-claro c-blanco front-to-back" id="navbar-inferior">

            </nav>

            <!-- Carrusel -->
            <!--https://www.youtube.com/watch?v=zVjAA6UxvtU-->
            <section class="mb-4">
                <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active c-item">
                        <img src="{{ url('images/galeria-pueblo-1.jpg') }}" class="d-block w-100 c-img" alt="pueblo">
                        <div class="carousel-caption top-0 mt-4">
                            <h5 class="fs-2 c-azul-oscuro">Trazos del Valle</h5>
                            <p class="fs-4 c-azul-oscuro">Historias de Naturaleza y Tradición</p>
                        </div>
                    </div>
                        <div class="carousel-item c-item">
                        <img src="{{ url('images/galeria-hombre-montaña.jpg') }}" class="d-block w-100 c-img" alt="montaña-hombre">
                        </div>
                        <div class="carousel-item c-item">
                        <img src="{{ url('images/galeria-pueblo-2.jpg') }}" class="d-block w-100 c-img" alt="pueblo">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </section>
            

            <!--<h4 class="titulo-blog c-azul-oscuro">Trazos del Valle: Historias de Naturaleza y Tradición</h4>-->

            <!-- Sección introducción blog -->

            <section class="container texto">
                <p>Bienvenido al blog de nuestro Matadero Comarcal: Descubre la esencia de nuestra tradición y naturaleza</p>
                <p>En nuestro Matadero Comarcal, hemos sido parte integral de la comunidad durante décadas, ofreciendo productos cárnicos de alta calidad y sostenibles. 
                    Ahora, estamos emocionados de presentar nuestra sección de blog, donde compartiremos historias fascinantes, conocimientos 
                    y experiencias que giran en torno a nuestra larga trayectoria en el arte de la carne.</p>
                <p>Aquí en el blog, te invitamos a sumergirte en nuestra tradición, descubrir los secretos detrás de nuestros productos y explorar los tesoros naturales que nos rodean. 
                    Nuestro objetivo es brindarte una visión más profunda de lo que hacemos 
                    y cómo nos conectamos con la tierra, el pueblo y las maravillas de la naturaleza que nos rodea.</p>
                <p>Cada entrada en el blog te llevará a un viaje único. 
                    Explorarás la belleza de nuestro valle, donde las majestuosas montañas se funden con el verdor de los campos y los ríos cristalinos. 
                    Descubrirás las aves autóctonas que pueblan nuestros cielos 
                    y las rutas de senderismo que te permitirán adentrarte en un entorno natural impresionante.</p>
                <p>Acompáñanos mientras compartimos historias sobre nuestra flora endémica, aves fascinantes y encuentros emocionantes con la fauna local. 
                    A través de nuestras entradas de blog, te invitamos a sentir la conexión íntima que tenemos con la naturaleza 
                    y cómo se refleja en nuestros productos, que llevan consigo el sabor y la esencia auténtica de nuestra tierra.</p>
                <p>¡Te invitamos a explorar nuestro blog y sumergirte en la rica historia, tradición y naturaleza que hacen de nuestro Matadero Comarcal un lugar único! 
                    Descubre con nosotros todo lo que nos hace especiales 
                    y cómo cuidamos cada detalle para ofrecerte productos de calidad excepcional.</p>
                <p>Esperamos que disfrutes de esta experiencia y que te animes a formar parte de nuestra comunidad, compartiendo tus comentarios y experiencias. 
                    ¡Bienvenido al fascinante mundo de nuestro Matadero Comarcal!"</p>
            </section>

            <hr class="linea justify-center bg-rosa">

            <!-- tarjetas -->
            <section class="container-section mb-4">

                <!-- "Pueblo del Valle: Un destino excepcional en plena naturaleza" -->
                <div class="blog-card bg-azul-claro c-azul-oscuro">
                    <div class="card-image img-1"></div>
                    <h6>Pueblo del Valle</h6>
                    <p>Un destino excepcional en plena naturaleza. No te lo querrás perder por nada del mundo</p>
                    <a href="#" class="bg-rosa c-blanco">Acceder</a>
                </div>

                <!-- "Explora la maravillosa naturaleza de nuestra comarca: Flora, aves autóctonas y fauna en senderismo" -->
                <div class="blog-card bg-azul-claro c-azul-oscuro">
                    <div class="card-image img-2"></div>
                    <h6>Explora la maravillosa naturaleza de nuestra comarca</h6>
                    <p> Flora, aves autóctonas y fauna en senderismo</p>
                    <a href="#" class="bg-rosa c-blanco">Acceder</a>
                </div>
                
                <!-- "El Espectáculo de la Migración" -->
                <div class="blog-card bg-azul-claro c-azul-oscuro">
                    <div class="card-image img-3"></div>
                    <h6>El Espectáculo de la Migración</h6>
                    <p>En los idílicos parajes del Pueblo del Valle, la naturaleza se despliega en todo su esplendor con la llegada de la migración de aves.</p>
                    <a href="#" class="bg-rosa c-blanco">Acceder</a>
                </div>

                <!-- "Máscaras y mucho tequila" -->
                <div class="blog-card bg-azul-claro c-azul-oscuro">
                    <div class="card-image img-4"></div>
                    <h6>Máscaras y mucho tequila</h6>
                    <p> En lo alto de una colina, oculto entre los valles del Pueblo del Valle, se alza majestuoso el Castillo de los Ecos.</p>
                    <a href="#" class="bg-rosa c-blanco">Acceder</a>
                </div>
            </section>
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