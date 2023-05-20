
@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('especie/create') }}" >Crear nuevo registro</a>
    <table class="table">
        <thead>
            <tr>
                <th>Código</th><!--id MyAdmin-->
                <th>DNI</th>
                <th>Nombre</th>
                <th>Primer apellido</th>
                <th>Segundo apellido</th>
                <th>Teléfono</th>
                <th>Calle</th>
                <th>Localidad</th>
                <th>Comarca</th>
                <th>Provincia</th>
                <th>Funciones</th><!--CRUD-->
            </tr>
        </thead>
        <tbody>
            <!--Blade-->
            @foreach($especies as $especie)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $especie->id }}</td>
                <td>{{ $especie->DNI }}</td>
                <td>{{ $especie->Nombre }}</td>
                <td>{{ $especie->Apellido1 }}</td>
                <td>{{ $especie->Apellido2 }}</td>
                <td>{{ $especie->Telefono }}</td>
                <td>{{ $especie->Calle }}</td>
                <td>{{ $especie->Localidad }}</td>
                <td>{{ $especie->Comarca }}</td>
                <td>{{ $especie->Provincia }}</td>
                <td>
                    <a href="{{ url('/especie/'.$especie->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/especie/'.$especie->id) }}" method="post">
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
    {!! $especies->links() !!}
</div>
@endsection