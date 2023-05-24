
@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('family/create') }}" >Crear nuevo registro</a>
    <table class="table">
        <thead>
            <tr>
                <th>Código registro</th><!--id MyAdmin-->
                <th>ID especie</th>
                <th>Descripción</th>
                <th>Funciones</th><!--CRUD-->
            </tr>
        </thead>
        <tbody>
            <!--Blade-->
            @foreach($families as $family)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $family->id }}</td>
                <td>{{ $family->ID_Especie }}</td>
                <td>{{ $family->Descripcion }}</td>
                <td>
                    <a href="{{ url('/family/'.$family->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/family/'.$family->id) }}" method="post">
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
    {!! $families->links() !!}
</div>
@endsection