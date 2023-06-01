
@extends('layouts.app')

@section('content')
@vite(['resources/css/tablas.css'])

<!-- Buscador de registros, impresion de tablas y creación de registros-->
<section class="busqueda">
    <!--BARRA DE BÚSQUEDA DE REGISTROS-->
    <!--
        Tutorial:
        https://www.youtube.com/watch?v=L2pBIKreVx0
        https://www.youtube.com/watch?v=aPYEOVDTV6E
        Mediante un formulario, se recogerán los datos que se vayan introduciendo en la dirección /XXXXX
        mediante el método get se pasarán a la función index de la clase correspondiente
        Finalmente, esta devolverá los registros que haya encontrado
    -->
    <!--<form action="{{ url('/busqueda')}}" type="get">-->
    
    <!--
    <form action="" class="col-8">
        <div class="form-group">
            <input class="form-control, col-6" type="search" name="search" placeholder="Buscar identificador...">
            <button class="col-2" type="submit">Buscar</button>
        </div>
    </form>
    -->

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
                        <a class="arreglo-bootstrap" id="exportar" href="{{ url('animal-export') }}">Imprimir</a>
                    </button>
                    @can('crear')
                    <button type="button" class="btn btn-outline-light">
                        <a class="arreglo-bootstrap" id="nuevo-registro" href="{{ url('animal/create') }}">Crear</a>
                    </button>
                    @endcan
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
                    <th scope="col">ID registro</th><!--id MyAdmin-->
                    <th scope="col">ID Animal</th>
                    <th scope="col">Número de crotal</th>
                    <th scope="col">Lugar de engorde</th>
                    <th scope="col">Lugar de nacimiento</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Lugar de slaughter</th>
                    <th scope="col">Fecha de slaughter</th>
                    <th scope="col">ID Especie</th>
                    <th scope="col">CIF de la explotación</th>
                    <th scope="col">Funciones</th><!--CRUD-->
                </tr>
            </thead>
            <tbody>
                <!--Blade-->
                @foreach($animals as $animal)
                <tr>
                    <!--Como aparezcan en MyAdmin-->
                    <td>{{ $animal->id }}</td>
                    <td>{{ $animal->ID_Animal }}</td>
                    <td>{{ $animal->NUM_Crotal }}</td>
                    <td>{{ $animal->L_Engorde }}</td>
                    <td>{{ $animal->L_Nacimiento }}</td>
                    <td>{{ $animal->F_Nacimiento }}</td>
                    <td>{{ $animal->L_Slaughter }}</td>
                    <td>{{ $animal->F_Slaughter }}</td>
                    <td>{{ $animal->ID_Especie }}</td>
                    <td>{{ $animal->CIF }}</td>
                    <td>
                        @role(['administrador', 'escritor'])
                        <a href="{{ url('/animal/'.$animal->id.'/edit') }}">Editar</a>
                        @endrole
                        @role(['administrador'])
                        <form action="{{ url('/animal/'.$animal->id) }}" method="post">
                        @csrf    
                            {{ method_field('DELETE') }} 
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
    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
</section>
@endsection