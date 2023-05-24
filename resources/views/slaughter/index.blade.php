
@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('slaughter/create') }}" >Crear nuevo registro</a>
    <table class="table">
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
                <th>Número de colegiado</th>
                <th>ID Animal</th>
                <th>ID Empleado</th>
                <th>Funciones</th><!--CRUD-->
            </tr>
        </thead>
        <tbody>
            <!--Blade-->
            @foreach($slaughters as $slaughter)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $slaughter->id }}</td>
                <td>{{ $slaughter->DNI }}</td>
                <td>{{ $slaughter->Nombre }}</td>
                <td>{{ $slaughter->Apellido1 }}</td>
                <td>{{ $slaughter->Apellido2 }}</td>
                <td>{{ $slaughter->Telefono }}</td>
                <td>{{ $slaughter->Correo_Electronico }}</td>
                <td>{{ $slaughter->Provincia }}</td>
                <td>{{ $slaughter->NUM_Colegiado }}</td>
                <td>{{ $slaughter->ID_Animal }}</td>
                <td>{{ $slaughter->ID_Employee }}</td>
                <td>
                    <a href="{{ url('/slaughter/'.$slaughter->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/slaughter/'.$slaughter->id) }}" method="post">
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
    {!! $slaughters->links() !!}
</div>
@endsection