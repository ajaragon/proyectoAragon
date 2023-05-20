
@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('administrador/create') }}" >Crear nuevo registro</a>
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
            @foreach($administradores as $administrador)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $administrador->id }}</td>
                <td>{{ $administrador->DNI }}</td>
                <td>{{ $administrador->Nombre }}</td>
                <td>{{ $administrador->Apellido1 }}</td>
                <td>{{ $administrador->Apellido2 }}</td>
                <td>{{ $administrador->Telefono }}</td>
                <td>{{ $administrador->Calle }}</td>
                <td>{{ $administrador->Localidad }}</td>
                <td>{{ $administrador->Comarca }}</td>
                <td>{{ $administrador->Provincia }}</td>
                <td>
                    <a href="{{ url('/administrador/'.$administrador->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/administrador/'.$administrador->id) }}" method="post">
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
    {!! $administradores->links() !!}
</div>
@endsection