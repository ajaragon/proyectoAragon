
@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('ganado/create') }}" >Crear nuevo registro</a>
    <table class="table">
        <thead>
            <tr>
                <th>Código</th><!--id MyAdmin-->
                <th>Identificador del animal</th>
                <th>Número del crotal</th>
                <th>Lugar del engorde</th>
                <th>Lugar de nacimiento</th>
                <th>Fecha de nacimiento</th>
                <th>Lugar de sacrifio</th>
                <th>Fecha de sacrificio</th>
                <th>Funciones</th><!--CRUD-->
            </tr>
        </thead>
        <tbody>
            <!--Blade-->
            @foreach($ganados as $ganado)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $ganado->id }}</td>
                <td>{{ $ganado->ID_ANIMAL }}</td>
                <td>{{ $ganado->NUM_Crotal }}</td>
                <td>{{ $ganado->L_Engorde }}</td>
                <td>{{ $ganado->L_Nacimiento }}</td>
                <td>{{ $ganado->F_Nacimiento }}</td>
                <td>{{ $ganado->L_Sacrificio }}</td>
                <td>{{ $ganado->F_Sacrificio }}</td>
                <td>
                    <a href="{{ url('/ganado/'.$ganado->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/ganado/'.$ganado->id) }}" method="post">
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
    {!! $ganados->links() !!}
</div>
@endsection