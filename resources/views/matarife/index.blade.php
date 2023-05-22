
@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('matarife/create') }}" >Crear nuevo registro</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID Matarife</th><!--id MyAdmin-->
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
            @foreach($slaughterers as $matarife)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $matarife->id }}</td>
                <td>{{ $matarife->DNI }}</td>
                <td>{{ $matarife->Nombre }}</td>
                <td>{{ $matarife->Apellido1 }}</td>
                <td>{{ $matarife->Apellido2 }}</td>
                <td>{{ $matarife->Telefono }}</td>
                <td>{{ $matarife->Correo_Electronico }}</td>
                <td>{{ $matarife->Provincia }}</td>
                <td>
                    <a href="{{ url('/matarife/'.$matarife->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/matarife/'.$matarife->id) }}" method="post">
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
    {!! $slaughterers->links() !!}
</div>
@endsection