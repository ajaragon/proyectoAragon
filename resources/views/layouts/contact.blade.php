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
                                <li class="nav-item">
                                    <a class="nav-link active text-reset" aria-current="page" href="/proyectoAragon/public/main">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active text-reset" aria-current="page" href="/proyectoAragon/public/about">Quiénes somos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active text-reset" aria-current="page" href="/proyectoAragon/public/blog">Blog</a>
                                </li>
                                <!--
                                <li class="nav-item">
                                    <a class="nav-link active text-reset" aria-current="page" href="/proyectoAragon/public/contact">Contacto</a>
                                </li>-->
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

            <!-- Contenido del main -->
                    <!--
                        -Nombre
                        -Apellidos
                        -Provincia
                        -País
                        -Correo electrónico
                        -Mensaje
                    -->

            <!--https://www.youtube.com/watch?v=3JEXW-8Jc0Y-->
            <form   action=""
                    method=""
                    class="formulario d-flex justify-content-center m-4"
                    id="form">
                <div class="card col-sm-6 p-3">
                    <div class="mb-3 text-uppercase text-center fw-bold">
                        <h4>Contacto</h4>
                        <hr>
                    </div>

                    <!-- Nombre, primer apellido y segundo apellido -->
                    <div class="row">
                        <!-- Nombre -->
                        <div class="col-lg-4 mb-2">
                            <label for="nombre">Nombre:</label>
                            <input  type="text" 
                                    class="form-control"
                                    name="nombre" 
                                    id="nombre" 
                                    placeholder="Indroduzca el nombre...">
                        </div>

                        <!-- Primer apellido -->
                        <div class="col-lg-4 mb-2">
                            <label for="primer-apellido">Primer apellido:</label>
                            <input  type="text" 
                                    class="form-control"
                                    name="primer-apellido" 
                                    id="primer-apellido" 
                                    placeholder="Indroduzca el apellido...">
                        </div>

                        <!-- Segundo apellido -->
                        <div class="col-lg-4 mb-2">
                            <label for="segundo-apellido">Segundo apellido:</label>
                            <input  type="text" 
                                    class="form-control"
                                    name="segundo-apellido" 
                                    id="segundo-apellido" 
                                    placeholder="Indroduzca el apellido...">
                        </div>
                    </div>

                    <!-- Provincia y país -->
                    <div class="row">
                        <!-- Provincia -->
                        <div class="col-lg-6 mb-2">
                            <label for="provincia">Provincia:</label>
                            <input  type="text" 
                                    class="form-control"
                                    name="provincia" 
                                    id="provincia" 
                                    placeholder="Indroduzca la provincia...">
                        </div>

                        <!-- País -->
                        <div class="col-lg-6 mb-2">
                            <label for="pais">País:</label>
                            <input  type="text" 
                                    class="form-control"
                                    name="pais" 
                                    id="pais" 
                                    placeholder="Indroduzca el país...">
                        </div>
                    </div>
                    <div class="row">

                        <!-- Correo electrónico -->
                        <div class="col-lg-6 mb-2">
                            <label for="correo">Correo electrónico:</label>
                            <input  type="text" 
                                    class="form-control"
                                    name="correo" 
                                    id="correo" 
                                    placeholder="Indroduzca el correo electrónico...">
                        </div>

                        <!-- Teléfono -->
                        <div class="col-lg-6 mb-2">
                            <label for="telefono">Teléfono:</label>
                            <input  type="text" 
                                    class="form-control"
                                    name="telefono" 
                                    id="telefono" 
                                    placeholder="Indroduzca el teléfono...">
                        </div>
                    </div>
                    

                    <!-- Mensaje -->
                    <div class="mb-2">
                        <label for="mensaje">Mensaje:</label>
                        <textarea   type="text" 
                                    class="form-control"
                                    name="mensaje" 
                                    id="mensaje" 
                                    placeholder="Indroduzca el mensaje...">
                        </textarea>
                    </div>

                    <hr>
                    
                    <div class="row">
                        <div class="mb-2">
                            <button     class="btn btn-outline-dark" 
                                        type="submit"
                                        id="enviar">Enviar
                            </button>
                        </div>
                    </div>

                    <div id="mensaje-error"></div>
                </div>
            </form>

            <!--Validación del formulario -->
            <script>

                //Accedemos a los identificadores de los elementos
                var formulario =document.getElementById("form");
                var nombre =document.getElementById("nombre");
                var primerApellido =document.getElementById("primer-apellido");
                var segundoApellido =document.getElementById("segundo-apellido");
                var provincia =document.getElementById("provincia");
                var pais =document.getElementById("pais");
                var correo =document.getElementById("correo");
                var telefono =document.getElementById("telefono");
                var mensaje =document.getElementById("mensaje");
                var mensajeError =document.getElementById("mensaje-error");

                //Añadimos una escucha para que en el momento en el que 
                //se pulse el botón de enviar
                //ejecute la función de validación
                form.addEventListener("submit" , evento=>{
                    
                    evento.preventDefault();
                    var aviso =[];
                    //Tanto si el campo es nulo o se encuentra vacío
                    //soltará el mensaje de error
                    if(nombre.value === null || nombre.value === ' '){
                        mensajeError.push("Falta por rellenar el nombre");
                    }//fin del if

                    if(primerApellido.value === null || primerApellido.value === ' '){
                        mensajeError.push("Falta por rellenar el primer apellido");
                    }//fin del if
                    aviso.innerHTML =aviso.join(", ");

                });

                
            </script>

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