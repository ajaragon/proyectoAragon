@extends('layouts.app')

@section('content')
@vite(['resources/css/tablas.css'])

<!-- Buscador de registros, impresion de tablas y creación de registros-->
<section class="busqueda">
    <div class="row">
            <div class="col-lg-6">
                <div class="input-group rounded" id="search-container">
                <input  type="search" 
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
            </div>
            <div class="col-lg-6">
                <div    class="btn-group" 
                        role="group" 
                        aria-label="Basic example">
                    <button type="button" class="btn btn-outline-light">Imprimir</button>
                    <button type="button" class="btn btn-outline-light">
                        <a id="nuevo-registro" href="{{ url('part/create') }}">Crear</a>
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
                    <th>Código de la pieza</th>
                    <th>Funciones</th><!--CRUD-->
                </tr>
            </thead>
            <tbody>
                <!--Blade-->
                @foreach($parts as $part)
                <tr>
                    <!--Como aparezcan en MyAdmin-->
                    <td>{{ $part->id }}</td>
                    <td>{{ $part->COD_Part }}</td>
                    <td>
                        <!--Añadir opción de actualizar y eliminar-->
                        <!--ACTUALIZAR-->
                        <!--
                            localhost/proyectoAragon/public/livestock_farmer/id/edit 
                            Para conocer cuál es el elemento que quiero que actualice,
                            le paso el id.
                            Se mostrará entonces la vista "edit" 
                            donde aparece el formulario con los campos que se quieren editar
                        -->
                        <a href="{{ url('/part/'.$part->id.'/edit') }}">Editar</a>
                        <!--ELIMINAR-->
                        <!--Para que el software conozca que elemento tiene que borrar,
                            se le pasa el id correspondiente
                        -->
                        <form action="{{ url('/part/'.$part->id) }}" method="post">
                        @csrf    
                            {{ method_field('DELETE')}} 
                            <input  type="submit" id="borrar" value="Eliminar" 
                                    onclick="return confirmacion('Los datos serán borrados')">
                        </form>
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