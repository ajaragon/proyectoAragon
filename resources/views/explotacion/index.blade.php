
@extends('layouts.app') <!--
                            aplica el layout por defecto para que 
                            se aplique el estillo y aparezca el login
                        -->

@section('content')
<div class="container">
    <!--Mensaje por defecto-->
    <!--<div class="alert-success alert-dismissible" role="alert">-->
    <div>
        @if(Session::has('mensaje'))    <!--Si existe un mensaje-->
        {{ Session::get('mensaje')}}    <!--
                                            obtendrá del controlador,
                                            el mensaje que tiene que mostrar
                                            en cada situación
                                        -->
        @endif
        <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>-->
    </div>

    <!--Links hacia las diferentes vistas-->
    <a href="{{ url('ganadero/create') }}" >Crear ganadero</a>
    <table class="table">
        <thead>
            <tr>
                <th>Código</th><!--id MyAdmin-->
                <th>CIF</th>
                <th>Nombre de la explotación</th>
                <th>Teléfono</th>
                <th>Calle</th>
                <th>Localidad</th>
                <th>Comarca</th>
                <th>Provincia</th>
                <th>Funciones</th><!--CRUD-->
            </tr>
        </thead>
        <tbody>
            <!--Blade-->
            @foreach($explotaciones as $explotacion)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $explotacion->id }}</td>
                <td>{{ $explotacion->CIF }}</td>
                <td>{{ $explotacion->NOM_Explotacion }}</td>
                <td>{{ $explotacion->Telefono }}</td>
                <td>{{ $explotacion->Calle }}</td>
                <td>{{ $explotacion->Localidad }}</td>
                <td>{{ $explotacion->Comarca }}</td>
                <td>{{ $explotacion->Provincia }}</td>
                <td>
                    
                    <a href="{{ url('/explotacion/'.$explotacion->id.'/edit') }}">Editar</a>
                    
                    <form action="{{ url('/explotacion/'.$explotacion->id) }}" method="post">
                    @csrf    
                        {{ method_field('DELETE')}} 
                        <input  type="submit" id="borrar" value="Eliminar" 
                                onclick="return confirmacion('Los datos serán borrados')">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $explotacion->links() !!}
</div>
@endsection