@extends('layouts.app')

@section('content')
@vite(['resources/css/tablas.css'])

<!-- Buscador de registros, impresion de tablas y creación de registros-->
<section>
@can('crear-rol')
    <a class="btn btn-dark" href="{{ route('rol.create') }}">Crear rol</a>
@endcan
</section>

<section>
    <div class="table-responsive">
        <table class="table table-striped table-light table-hover table-bordered">
            <thead>
                <tr>
                    <th style="display:none">Código registro</th><!--id MyAdmin-->
                    <th>Rol</th>
                    <th>Funciones</th><!--CRUD-->
                </tr>
            </thead>
            <tbody>
                <!--Blade-->
                @foreach($rols as $rol)
                <tr>
                    <!--Como aparezcan en MyAdmin-->
                    <!--<td>{{ $rol->id }}</td>-->
                    <td>{{ $rol->name }}</td>
                    <td>{{ $rol->email }}</td>
                    <td>
                        @if(!empty($rol->getRoleNames()))
                        @foreach($rol->getRoleNames() as $rolName)
                        <h5><span class="badge badge-dark">{{ $rolName }}</span></h5>
                        @endforeach
                        @endif
                    </td>
                    <td>
                        @can('crear-rol')
                        <a class="btn btn-dark btn-sm" href="{{ url('/rol/'.$rol->id.'/edit') }}">Editar</a>
                        @endcan
                        <form action="{{ url('/rol/'.$rol->id) }}" method="post">
                        @csrf    
                            {{ method_field('DELETE') }} 
                            @can('crear-rol')
                            <input  type="submit" id="borrar" value="Eliminar" 
                                    onclick="return confirmacion('Los datos serán borrados')">
                            @endcan
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection