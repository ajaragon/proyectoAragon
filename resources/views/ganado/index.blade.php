
@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('ganado/create') }}" >Crear nuevo registro</a>
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
            @foreach($ganados as $ganado)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $ganado->id }}</td>
                <td>{{ $ganado->DNI }}</td>
                <td>{{ $ganado->Nombre }}</td>
                <td>{{ $ganado->Apellido1 }}</td>
                <td>{{ $ganado->Apellido2 }}</td>
                <td>{{ $ganado->Telefono }}</td>
                <td>{{ $ganado->Calle }}</td>
                <td>{{ $ganado->Localidad }}</td>
                <td>{{ $ganado->Comarca }}</td>
                <td>{{ $ganado->Provincia }}</td>
                <td>
                    <a href="{{ url('/ganado/'.$ganado->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/ganado/'.$ganado->id) }}" method="post">
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
    {!! $ganados->links() !!}
</div>
@endsection