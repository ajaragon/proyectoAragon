
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
    
    <a href="{{ url('vet/create') }}" >Crear nuevo registro</a>
    <table class="table">
        <thead>
            <tr>
                <th>Código registro</th><!--id MyAdmin-->
                <th>Número del colegiado</th>
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
            @foreach($vets as $vet)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $vet->id }}</td>
                <td>{{ $vet->NUM_Colegiado }}</td>
                <td>{{ $vet->DNI }}</td>
                <td>{{ $vet->Nombre }}</td>
                <td>{{ $vet->Apellido1 }}</td>
                <td>{{ $vet->Apellido2 }}</td>
                <td>{{ $vet->Telefono }}</td>
                <td>{{ $vet->Correo_Electronico }}</td>
                <td>{{ $vet->Provincia }}</td>
                <td>
                    <a href="{{ url('/vet/'.$vet->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/vet/'.$vet->id) }}" method="post">
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