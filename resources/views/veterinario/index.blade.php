
@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('veterinario/create') }}" >Crear nuevo registro</a>
    <table class="table">
        <thead>
            <tr>
                <th>Código</th><!--id MyAdmin-->
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
            @foreach($veterinarios as $veterinario)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $veterinario->id }}</td>
                <td>{{ $veterinario->NUM_Colegiado }}</td>
                <td>{{ $veterinario->DNI }}</td>
                <td>{{ $veterinario->Nombre }}</td>
                <td>{{ $veterinario->Apellido1 }}</td>
                <td>{{ $veterinario->Apellido2 }}</td>
                <td>{{ $veterinario->Telefono }}</td>
                <td>{{ $veterinario->Correo_Electronico }}</td>
                <td>{{ $veterinario->Provincia }}</td>
                <td>
                    <a href="{{ url('/veterinario/'.$veterinario->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/veterinario/'.$veterinario->id) }}" method="post">
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
    {!! $veterinarios->links() !!}
</div>
@endsection