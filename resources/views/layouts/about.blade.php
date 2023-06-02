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
                                    <a class="nav-link active text-reset" aria-current="page" href="/proyectoAragon/public/main">Home</a>
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

            <!-- Contenido del main -->
                    <!--
                        Historia de la empresa
                        Filosofía de la empresa: calidad, bienestar animal, sostenibilidad, resilencia
                        Equipo
                        Proceso de sacrificio
                    -->
            <div class="container">
                <section class="text mt-5">
                    <h4 class="title">HISTORIA DE LA EMPRESA</h4>
                    <p>
                        La historia de nuestro matadero comenzó en el año 1990, cuando un grupo de ganaderos de la comarca decidió unirse para crear una pequeña explotación dedicada a la producción de carne de calidad.
                        Situada en las montañas y rodeada de pequeñas poblaciones, la explotación pronto se convirtió en un referente en la zona.
                    </p>
                    <p>
                        Desde sus inicios, nuestro matadero se ha caracterizado por su compromiso con la calidad y la seguridad alimentaria.
                        Nos hemos esforzado por ofrecer productos frescos y de la máxima calidad.
                        Pretendemos que los animales sean criados en condiciones óptimas y sacrificados siguiendo los estándares más exigentes.
                        Además, hemos mantenido siempre una estrecha relación con los ganaderos de la zona, colaborando con ellos para garantizar el bienestar animal y, sobre todo, la sostenibilidad del entorno.
                    </p>
                    <p>
                        A lo largo de estos años, hemos ido evolucionando y mejorando nuestras instalaciones y procesos, siempre con el objetivo de ofrecer el mejor servicio a nuestros clientes. 
                        En la actualidad, nuestro matadero cuenta con las últimas tecnologías en cuanto a control de calidad y seguridad alimentaria, y seguimos trabajando cada día para estar a la vanguardia en estos ámbitos.
                    </p>
                    <p>
                        Sin embargo, no todo ha sido fácil: a lo largo de estos años, hemos tenido que superar diversos obstáculos y desafíos.
                        La competencia de grandes empresas del sector y la crisis económica de los últimos años han sido algunos de ellos.
                    </p>
                    <p>
                        No obstante, gracias al esfuerzo y dedicación de nuestro equipo humano, hemos logrado mantenernos a flote y seguir creciendo.
                        Hoy en día, nuestro matadero sigue siendo una pequeña explotación comarcal, pero con una gran trayectoria y una sólida reputación en el sector.
                        Y seguimos trabajando con la misma ilusión y compromiso con los que empezamos hace más de 30 años.
                    </p>
                    <p>Texto originado por chatgpt</p>
                </section>
            </div>
        <!-- TEXTO EN INGLÉS

            The story of our slaughterhouse began in 1990 when a group of local farmers decided to come together and create a small operation dedicated to the production of quality meat. 
            Located in the mountains and surrounded by small communities, the operation quickly became a reference in the area. 
            From the beginning, our slaughterhouse has been characterized by its commitment to quality and food safety. 
            We have made efforts to offer fresh and highest-quality products. Our goal is to ensure that animals are raised under optimal conditions and slaughtered following the highest standards. 
            Additionally, we have always maintained a close relationship with the local farmers, collaborating with them to guarantee animal welfare and, above all, environmental sustainability. 
            Throughout these years, we have evolved and improved our facilities and processes, always with the aim of providing the best service to our customers. 
            Currently, our slaughterhouse is equipped with the latest technologies in quality control and food safety, and we continue to work every day to stay at the forefront in these areas. 
            However, it hasn't been easy: over the years, we have had to overcome various obstacles and challenges. 
            The competition from large companies in the sector and the economic crisis of recent years have been some of them. 
            Nevertheless, thanks to the effort and dedication of our team, we have managed to stay afloat and continue growing. 
            Today, our slaughterhouse remains a small local operation but with a great trajectory and a solid reputation in the industry. 
            And we continue to work with the same enthusiasm and commitment with which we started over 30 years ago.
        -->

        <!-- TEXTO EN FRANCÉS

            L'histoire de notre abattoir a commencé en 1990, lorsque un groupe d'éleveurs de la région a décidé de s'unir pour créer une petite exploitation dédiée à la production de viande de qualité. 
            Situé dans les montagnes et entouré de petites localités, l'exploitation est rapidement devenue une référence dans la région. 
            Depuis ses débuts, notre abattoir s'est caractérisé par son engagement envers la qualité et la sécurité alimentaire. 
            Nous nous sommes efforcés d'offrir des produits frais et de la plus haute qualité. 
            Notre objectif est que les animaux soient élevés dans des conditions optimales et abattus selon les normes les plus strictes. 
            De plus, nous avons toujours entretenu une relation étroite avec les éleveurs de la région, en collaborant avec eux pour garantir le bien-être animal et, surtout, la durabilité de l'environnement. 
            Au fil des années, nous avons évolué et amélioré nos installations et nos processus, toujours dans le but d'offrir le meilleur service à nos clients. 
            Aujourd'hui, notre abattoir dispose des dernières technologies en matière de contrôle de la qualité et de la sécurité alimentaire, et nous continuons à travailler chaque jour pour être à la pointe dans ces domaines. 
            Cependant, tout n'a pas été facile : au fil des ans, nous avons dû surmonter divers obstacles et défis. 
            La concurrence des grandes entreprises du secteur et la crise économique de ces dernières années en ont été quelques-uns. 
            Néanmoins, grâce aux efforts et à l'engagement de notre équipe, nous avons réussi à rester à flot et à continuer de croître. 
            Aujourd'hui, notre abattoir reste une petite exploitation locale, mais avec une grande trajectoire et une solide réputation dans le secteur. 
            Et nous continuons à travailler avec le même enthousiasme et le même engagement qu'il y a plus de 30 ans.

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