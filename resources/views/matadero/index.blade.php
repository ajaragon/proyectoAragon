
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
                <th>DNI</th>
                <th>Nombre</th>
                <th>Primer apellido</th>
                <th>Segundo apellido</th>
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
            @foreach($ganaderos as $ganadero)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $ganadero->id }}</td>
                <td>{{ $ganadero->DNI }}</td>
                <td>{{ $ganadero->Nombre }}</td>
                <td>{{ $ganadero->Apellido1 }}</td>
                <td>{{ $ganadero->Apellido2 }}</td>
                <td>{{ $ganadero->Telefono }}</td>
                <td>{{ $ganadero->Calle }}</td>
                <td>{{ $ganadero->Localidad }}</td>
                <td>{{ $ganadero->Comarca }}</td>
                <td>{{ $ganadero->Provincia }}</td>
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
                    <a href="{{ url('/ganadero/'.$ganadero->id.'/edit') }}">Editar</a>
                    <!--ELIMINAR-->
                    <!--Para que el software conozca que elemento tiene que borrar,
                        se le pasa el id correspondiente
                    -->
                    <form action="{{ url('/ganadero/'.$ganadero->id) }}" method="post">
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
    {!! $ganaderos->links() !!}
</div>
@endsection