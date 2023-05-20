
@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('camara/create') }}" >Crear nuevo registro</a>
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
            @foreach($camaras as $camara)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $camara->id }}</td>
                <td>{{ $camara->DNI }}</td>
                <td>{{ $camara->Nombre }}</td>
                <td>{{ $camara->Apellido1 }}</td>
                <td>{{ $camara->Apellido2 }}</td>
                <td>{{ $camara->Telefono }}</td>
                <td>{{ $camara->Calle }}</td>
                <td>{{ $camara->Localidad }}</td>
                <td>{{ $camara->Comarca }}</td>
                <td>{{ $camara->Provincia }}</td>
                <td>
                    <a href="{{ url('/camara/'.$camara->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/camara/'.$camara->id) }}" method="post">
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
    {!! $camaras->links() !!}
</div>
@endsection