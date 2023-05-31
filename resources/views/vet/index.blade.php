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
                        <a class="arreglo-bootstrap" id="exportar" href="{{ url('vet-export') }}">Imprimir</a>
                    </button>
                    <button type="button" class="btn btn-outline-light">
                        <a class="arreglo-bootstrap" id="nuevo-registro" href="{{ url('vet/create') }}">Crear</a>
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
                    <th>Número del colegiado</th>
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
                @foreach($vets as $vet)
                <tr>
                    <!--Como aparezcan en MyAdmin-->
                    <td>{{ $vet->id }}</td>
                    <td>{{ $vet->NUM_Colegiado }}</td>
                    <td>{{ $vet->DNI }}</td>
                    <td>{{ $vet->Nombre }}</td>
                    <td>{{ $vet->Apellido1 }}</td>
                    <td>{{ $vet->Apellido2 }}</td>
                    <td>{{ $vet->Telefono }}</td>
                    <td>{{ $vet->Correo_Electronico }}</td>
                    <td>{{ $vet->Provincia }}</td>
                    <td>
                        <a href="{{ url('/vet/'.$vet->id.'/edit') }}">Editar</a>
                        
                        <form action="{{ url('/vet/'.$vet->id) }}" method="post">
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
        <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
        </div>
    </div>
</section>
@endsection
