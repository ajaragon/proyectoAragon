
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
                <th>Número de cámara</th>
                <th>Capacidad</th>
                <th>Temperatura media</th>
                <th>Funciones</th><!--CRUD-->
            </tr>
        </thead>
        <tbody>
            <!--Blade-->
            @foreach($camaras as $camara)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $camara->id }}</td>
                <td>{{ $camara->Numero_Camara }}</td>
                <td>{{ $camara->Capacidad }}</td>
                <td>{{ $camara->Temperatura_Media }}</td>
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