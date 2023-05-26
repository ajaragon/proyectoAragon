
<!--Vista del contenido común de las interfaces de la base de datos-->
<!--SEGUÍ ESTE TUTORIAL-->
<!--https://www.youtube.com/watch?v=yV0y74Pu86I-->

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Hoja de estilos -->
    <!-- https://laravel.com/docs/8.x/blade#stacks -->
    <!-- https://laracasts.com/discuss/channels/laravel/how-to-link-external-css-file-to-laravel-blade-file -->
    
    <link rel="stylesheet" href="/css/main.css">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Interfaz Base de datos</title>
  </head>
  <body>
    <h1>ESTO ES APP</h1>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="container-fluid" id="app">
        <div class="row flex-nowrap">
            <div class="bg-dark col-auto col-md-2 min-vh-100">
                <div class="bg-dark p-2">
                    <a class="d-flex text-decoration-none mt-1 align-items-center text-white">
                        <span class="fs-4 d-none d-sm-inline">MENÚ LATERAL</span>
                    </a>
                    <ul class="nav nav-pills flex-column mt-4">
                        <li class="nav-item">
                            <a href="" class="nav-link text-white" aria-current="page">
                                <i class="fs-5 fa fa-guage"></i>
                                <span class="fs-5 ms-3 d-none d-sm-inline">TABLAS</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link text-white" aria-current="page">
                                <i class="fs-5 fa fa-table-list"></i>
                                <span class="fs-5 ms-3 d-none d-sm-inline">ANIMALES</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link text-white" aria-current="page">
                                <i class="fs-5 fa fa-table-list"></i>
                                <span class="fs-5 ms-3 d-none d-sm-inline">ANIMALES</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--<main class="py-4">
            @yield('contenidoBase')
        </main>-->
    </div>
  </body>
</html>
