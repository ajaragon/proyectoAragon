
@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('familia/create') }}" >Crear nuevo registro</a>
    <table class="table">
        <thead>
            <tr>
                <th>Código</th><!--id MyAdmin-->
                <th>ID especie</th>
                <th>Descripción</th>
                <th>Funciones</th><!--CRUD-->
            </tr>
        </thead>
        <tbody>
            <!--Blade-->
            @foreach($farms as $explotacion)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $explotacion->id }}</td>
                <td>{{ $explotacion->ID_Especie }}</td>
                <td>{{ $explotacion->Descripcion }}</td>
                <td>
                    <a href="{{ url('/familia/'.$familia->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/familia/'.$familia->id) }}" method="post">
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