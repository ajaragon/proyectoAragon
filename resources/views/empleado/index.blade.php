
@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('animal/create') }}" >Crear nuevo registro</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID Empleado</th><!--id MyAdmin-->
                <th>DNI</th>
                <th>Nombre</th>
                <th>Primer apellido</th>
                <th>Segundo apellido</th>
                <th>Teléfono</th>
                <th>Correo electrónico</th>
                <th>Dirección</th>
                <th>Provincia</th>
                <th>Funciones</th><!--CRUD-->
            </tr>
        </thead>
        <tbody>
            <!--Blade-->
            @foreach($animals as $animal)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $empleado->id }}</td>
                <td>{{ $empleado->DNI }}</td>
                <td>{{ $empleado->Nombre }}</td>
                <td>{{ $empleado->Apellido1 }}</td>
                <td>{{ $empleado->Apellido2 }}</td>
                <td>{{ $empleado->Telefono }}</td>
                <td>{{ $empleado->Correo_Electronico }}</td>
                <td>{{ $empleado->Direccion }}</td>
                <td>{{ $empleado->Provincia }}</td>
                <td>
                    <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/empleado/'.$empleado->id) }}" method="post">
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
    {!! $employees->links() !!}
</div>
@endsection