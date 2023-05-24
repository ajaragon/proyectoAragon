
@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('animal/create') }}" >Crear nuevo registro</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID registro</th><!--id MyAdmin-->
                <th>ID Animal</th>
                <th>Número de crotal</th>
                <th>Lugar de engorde</th>
                <th>Lugar de nacimiento</th>
                <th>Fecha de nacimiento</th>
                <th>Lugar de slaughter</th>
                <th>Fecha de slaughter</th>
                <th>ID Especie</th>
                <th>Funciones</th><!--CRUD-->
            </tr>
        </thead>
        <tbody>
            <!--Blade-->
            @foreach($animals as $animal)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $animal->id }}</td>
                <td>{{ $animal->ID_Animal }}</td>
                <td>{{ $animal->NUM_Crotal }}</td>
                <td>{{ $animal->L_Engorde }}</td>
                <td>{{ $animal->L_Nacimiento }}</td>
                <td>{{ $animal->F_Nacimiento }}</td>
                <td>{{ $animal->L_Slaughter }}</td>
                <td>{{ $animal->F_Slaughter }}</td>
                <td>{{ $animal->ID_Especie }}</td>
                <td>
                    <a href="{{ url('/animal/'.$animal->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/animal/'.$animal->id) }}" method="post">
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
    {!! $animals->links() !!}
</div>
@endsection