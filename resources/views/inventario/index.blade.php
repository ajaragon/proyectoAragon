
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
    <a href="{{ url('inventario/create') }}" >Crear nuevo registro</a>
    <table class="table">
        <thead>
            <tr>
                <th>Código</th><!--id MyAdmin-->
                <th>Código del inventario</th>
                <th>Código de la pieza</th>
                <th>Número de cámara</th>
                <th>Código de sacrificio</th>
                <th>ID empleado</th>
                <th>Funciones</th><!--CRUD-->
            </tr>
        </thead>
        <tbody>
            <!--Blade-->
            @foreach($inventories as $inventario)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $inventario->id }}</td>
                <td>{{ $inventario->COD_Inventario }}</td>
                <td>{{ $inventario->COD_Pieza }}</td>
                <td>{{ $inventario->NUM_Camara }}</td>
                <td>{{ $inventario->COD_Sacrificio }}</td>
                <td>{{ $inventario->ID_Empleado }}</td>
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
                    <a href="{{ url('/inventario/'.$inventario->id.'/edit') }}">Editar</a>
                    <!--ELIMINAR-->
                    <!--Para que el software conozca que elemento tiene que borrar,
                        se le pasa el id correspondiente
                    -->
                    <form action="{{ url('/inventario/'.$inventario->id) }}" method="post">
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
    {!! $inventories->links() !!}
</div>
@endsection