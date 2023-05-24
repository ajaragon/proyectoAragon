
@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('employee/create') }}" >Crear nuevo registro</a>
    <table class="table">
        <thead>
            <tr>
                <th>Código registro</th><!--id MyAdmin-->
                <th>Identificador del empleado</th>
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
            @foreach($employees as $employee)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->ID_Employee }}</td>
                <td>{{ $employee->DNI }}</td>
                <td>{{ $employee->Nombre }}</td>
                <td>{{ $employee->Apellido1 }}</td>
                <td>{{ $employee->Apellido2 }}</td>
                <td>{{ $employee->Telefono }}</td>
                <td>{{ $employee->Correo_Electronico }}</td>
                <td>{{ $employee->Direccion }}</td>
                <td>{{ $employee->Provincia }}</td>
                <td>
                    <a href="{{ url('/employee/'.$employee->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/employee/'.$employee->id) }}" method="post">
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