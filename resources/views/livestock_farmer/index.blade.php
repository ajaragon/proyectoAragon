@extends('layouts.app')

@section('content')
@vite(['resources/css/tablas.css'])

<!-- Buscador de registros, impresion de tablas y creación de registros-->
<section class="busqueda">
    <!--BARRA DE BÚSQUEDA DE REGISTROS-->
        <div class="row">
            <form class="col-lg-6">
                <div class="input-group rounded" id="search-container">
                <input  type="search" 
                        id="search"
                        name="search" 
                        class="form-control rounded" 
                        placeholder="Buscar identificador..." 
                        aria-label="Search" 
                        aria-describedby="search-addon" />
                <button>
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                </button>
                </div>
            </form>
            <div class="col-lg-6">
                <div    class="btn-group" 
                        role="group" 
                        aria-label="Basic example">
                    <button type="button" class="btn btn-outline-light">
                        <a class="arreglo-bootstrap" id="exportar" href="{{ url('livestock_farmer-export') }}">Imprimir</a>
                    </button>
                    <button type="button" class="btn btn-outline-light">
                        <a class="arreglo-bootstrap" id="nuevo-registro" href="{{ url('livestock_farmer/create') }}">Crear</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tabla con los registros-->
<!--https://getbootstrap.com/docs/5.0/content/tables/-->
<section>
    <div class="table-responsive">
        <table class="table table-striped table-light table-hover table-bordered">
            <thead>
                <tr>
                    <th>Código registro</th><!--id MyAdmin-->
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Teléfono</th>
                    <th>Correo electrónico</th>
                    <th>Provincia</th>
                    <th>CIF de la explotación</th>
                    <th>Funciones</th><!--CRUD-->
                </tr>
            </thead>
            <tbody>
                <!--Blade-->
                @foreach($livestock_farmers as $livestock_farmer)
                <tr>
                    <!--Como aparezcan en MyAdmin-->
                    <td>{{ $livestock_farmer->id }}</td>
                    <td>{{ $livestock_farmer->DNI }}</td>
                    <td>{{ $livestock_farmer->Nombre }}</td>
                    <td>{{ $livestock_farmer->Apellido1 }}</td>
                    <td>{{ $livestock_farmer->Apellido2 }}</td>
                    <td>{{ $livestock_farmer->Telefono }}</td>
                    <td>{{ $livestock_farmer->Correo_Electronico }}</td>
                    <td>{{ $livestock_farmer->Provincia }}</td>
                    <td>{{ $livestock_farmer->CIF }}</td>
                    <td>
                        @role(['administrador', 'escritor'])
                        <!--Añadir opción de actualizar y eliminar-->
                        <!--ACTUALIZAR-->
                        <!--
                            localhost/proyectoAragon/public/livestock_farmer/id/edit 
                            Para conocer cuál es el elemento que quiero que actualice,
                            le paso el id.
                            Se mostrará entonces la vista "edit" 
                            donde aparece el formulario con los campos que se quieren editar
                        -->
                        <a href="{{ url('/livestock_farmer/'.$livestock_farmer->id.'/edit') }}">Editar</a>
                        @endrole
                        @role(['administrador'])
                        <!--ELIMINAR-->
                        <!--Para que el software conozca que elemento tiene que borrar,
                            se le pasa el id correspondiente
                        -->
                        <form action="{{ url('/livestock_farmer/'.$livestock_farmer->id) }}" method="post">
                        @csrf    
                            {{ method_field('DELETE')}} 
                            <input  type="submit" id="borrar" value="Eliminar" 
                                    onclick="return confirmacion('Los datos serán borrados')">
                        </form>
                        @endrole
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!--Mensaje por defecto-->
    <!--<div class="alert-success alert-dismissible" role="alert">-->
    <div>
        @if(Session::has('mensaje'))    <!--Si existe un mensaje-->
        {{ Session::get('mensaje')}}    <!--
                                            obtendrá del controlador,
                                            el mensaje que tiene que mostrar
                                            en cada situación
                                        -->
        @endif
        <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>-->
    </div>
</section>
@endsection
