
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
    <a href="{{ url('ganado/create') }}" >Crear animal</a>
    <table class="table">
        <thead>
            <tr>
                <th>Código</th><!--id MyAdmin-->
                <th>Código del animal</th>
                <th>Número del crotal</th>
                <th>Lugar de engorde</th>
                <th>Fecha de nacimiento</th>
                <th>Lugar de nacimiento</th>
                <th>Fecha de sacrificio</th>
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
                <td>{{ $ganado->ID_Animal }}</td>
                <td>{{ $ganado->NUM_Crotal }}</td>
                <td>{{ $ganado->Lugar_Engorde }}</td>
                <td>{{ $ganado->Fecha_NAC }}</td>
                <td>{{ $ganado->Lugar_NAC }}</td>
                <td>{{ $ganado->Fecha_SAC }}</td>
                <td>{{ $ganado->Lugar_SAC }}</td>
                <td>
                    <!--Añadir opción de actualizar y eliminar-->
                    <!--ACTUALIZAR-->
                    <!--
                        localhost/proyectoAragon/public/ganadero/id/edit 
                        Para conocer cuál es el elemento que quiero que actualice,
                        le paso el id.
                        Se mostrará entonces la vista "edit" 
                        donde aparece el formulario con los campos que se quieren editar
                    -->
                    <a href="{{ url('/ganado/'.$ganado->id.'/edit') }}">Editar</a>
                    <!--ELIMINAR-->
                    <!--Para que el software conozca que elemento tiene que borrar,
                        se le pasa el id correspondiente
                    -->
                    <form action="{{ url('/ganado/'.$ganado->id) }}" method="post">
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
    {!! $ganado->links() !!}
</div>
@endsection