
@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('explotacion/create') }}" >Crear nuevo registro</a>
    <table class="table">
        <thead>
            <tr>
                <th>Código</th><!--id MyAdmin-->
                <th>CIF</th>
                <th>Nombre de la explotación</th>
                <th>Titular</th>
                <th>Teléfono</th>
                <th>Correo electrónico</th>
                <th>Dirección</th>
                <th>Comarca</th>
                <th>Provincia</th>
                <th>Código postal</th>
                <th>Funciones</th><!--CRUD-->
            </tr>
        </thead>
        <tbody>
            <!--Blade-->
            @foreach($explotacions as $explotacion)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $explotacion->id }}</td>
                <td>{{ $explotacion->CIF }}</td>
                <td>{{ $explotacion->Nombre_Explotacion }}</td>
                <td>{{ $explotacion->Titular }}</td>
                <td>{{ $explotacion->Telefono }}</td>
                <td>{{ $explotacion->Correo_Electronico }}</td>
                <td>{{ $explotacion->Direccion }}</td>
                <td>{{ $explotacion->Comarca }}</td>
                <td>{{ $explotacion->Provincia }}</td>
                <td>{{ $explotacion->CP }}</td>
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
    {!! $explotacions->links() !!}
</div>
@endsection