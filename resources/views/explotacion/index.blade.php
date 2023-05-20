
@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('ganadero/create') }}" >Crear nuevo registro</a>
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
            @foreach($explotaciones as $explotacion)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $explotacion->id }}</td>
                <td>{{ $explotacion->DNI }}</td>
                <td>{{ $explotacion->Nombre }}</td>
                <td>{{ $explotacion->Apellido1 }}</td>
                <td>{{ $explotacion->Apellido2 }}</td>
                <td>{{ $explotacion->Telefono }}</td>
                <td>{{ $explotacion->Calle }}</td>
                <td>{{ $explotacion->Localidad }}</td>
                <td>{{ $explotacion->Comarca }}</td>
                <td>{{ $explotacion->Provincia }}</td>
                <td>
                    <a href="{{ url('/explotacion/'.$explotacion->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/explotacion/'.$explotacion->id) }}" method="post">
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
    {!! $explotaciones->links() !!}
</div>
@endsection