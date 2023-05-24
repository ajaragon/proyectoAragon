
@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('slaughterer/create') }}" >Crear nuevo registro</a>
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
                <th>Funciones</th><!--CRUD-->
            </tr>
        </thead>
        <tbody>
            <!--Blade-->
            @foreach($slaughterers as $slaughterer)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $slaughterer->id }}</td>
                <td>{{ $slaughterer->DNI }}</td>
                <td>{{ $slaughterer->Nombre }}</td>
                <td>{{ $slaughterer->Apellido1 }}</td>
                <td>{{ $slaughterer->Apellido2 }}</td>
                <td>{{ $slaughterer->Telefono }}</td>
                <td>{{ $slaughterer->Correo_Electronico }}</td>
                <td>{{ $slaughterer->Provincia }}</td>
                <td>
                    <a href="{{ url('/slaughterer/'.$slaughterer->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/slaughterer/'.$slaughterer->id) }}" method="post">
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