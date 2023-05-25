
@extends('layouts.app')

@section('content')
<div class="container">

    <form action="" class="col-8">
        <div class="form-group">
            <input class="form-control, col-6" type="search" name="search" placeholder="Buscar identificador...">
            <button class="col-2" type="submit">Buscar</button>
        </div>
    </form>
    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('chamber/create') }}" >Crear nuevo registro</a>
    <table class="table">
        <thead>
            <tr>
                <th>Código registro</th><!--id MyAdmin-->
                <th>Número de cámara</th>
                <th>Capacidad</th>
                <th>Código del sacrificio</th>
                <th>Funciones</th><!--CRUD-->
            </tr>
        </thead>
        <tbody>
            <!--Blade-->
            @foreach($chambers as $chamber)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $chamber->id }}</td>
                <td>{{ $chamber->NUM_Chamber }}</td>
                <td>{{ $chamber->Capacidad }}</td>
                <td>{{ $chamber->COD_Slaughter }}</td>
                <td>
                    <a href="{{ url('/chamber/'.$chamber->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/chamber/'.$chamber->id) }}" method="post">
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
</div>
@endsection