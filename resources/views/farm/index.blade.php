
@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        @if(Session::has('mensaje'))
        {{ Session::get('mensaje')}} 
        @endif
    </div>
    
    <a href="{{ url('farm/create') }}" >Crear nuevo registro</a>
    <table class="table">
        <thead>
            <tr>
                <th>Código registro</th><!--id MyAdmin-->
                <th>CIF</th>
                <th>Nombre de la explotación</th>
                <th>Titular</th>
                <th>Teléfono</th>
                <th>Correo electrónico</th>
                <th>Dirección</th>
                <th>Comarca</th>
                <th>Provincia</th>
                <th>Código postal</th>
                <th>DNI del ganadero</th>
                <th>Código del animal</th>
                <th>Funciones</th><!--CRUD-->
            </tr>
        </thead>
        <tbody>
            <!--Blade-->
            @foreach($farms as $farm)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $farm->id }}</td>
                <td>{{ $farm->CIF }}</td>
                <td>{{ $farm->Nombre_Farm }}</td>
                <td>{{ $farm->Titular }}</td>
                <td>{{ $farm->Telefono }}</td>
                <td>{{ $farm->Correo_Electronico }}</td>
                <td>{{ $farm->Direccion }}</td>
                <td>{{ $farm->Comarca }}</td>
                <td>{{ $farm->Provincia }}</td>
                <td>{{ $farm->CP }}</td>
                <td>{{ $farm->DNI }}</td>
                <td>{{ $farm->ID_Animal }}</td>
                <td>
                    <a href="{{ url('/farm/'.$farm->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/farm/'.$farm->id) }}" method="post">
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
    {!! $farms->links() !!}
</div>
@endsection