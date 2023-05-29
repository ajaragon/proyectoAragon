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
                        <a id="nuevo-registro" href="{{ url('slaughterer/create') }}">Crear</a>
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
                    <th>Funciones</th><!--CRUD-->
                </tr>
            </thead>
            <tbody>
                <!--Blade-->
                @foreach($slaughterers as $slaughterer)
                <tr>
                    <!--Como aparezcan en MyAdmin-->
                    <td>{{ $slaughterer->id }}</td>
                    <td>{{ $slaughterer->DNI }}</td>
                    <td>{{ $slaughterer->Nombre }}</td>
                    <td>{{ $slaughterer->Apellido1 }}</td>
                    <td>{{ $slaughterer->Apellido2 }}</td>
                    <td>{{ $slaughterer->Telefono }}</td>
                    <td>{{ $slaughterer->Correo_Electronico }}</td>
                    <td>{{ $slaughterer->Provincia }}</td>
                    <td>
                        <a href="{{ url('/slaughterer/'.$slaughterer->id.'/edit') }}">Editar</a>
                        
                        <form action="{{ url('/slaughterer/'.$slaughterer->id) }}" method="post">
                        @csrf    
                            {{ method_field('DELETE') }} 
                            <input  type="submit" id="borrar" value="Eliminar" 
                                    onclick="return confirmacion('Los datos serán borrados')">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
</section>
@endsection