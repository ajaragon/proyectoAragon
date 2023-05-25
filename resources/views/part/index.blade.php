
@extends('layouts.app') <!--
                            aplica el layout por defecto para que 
                            se aplique el estillo y aparezca el login
                        -->

@section('content')
<div class="container">
    <form action="" class="col-8">
        <div class="form-group">
            <input class="form-control, col-6" type="search" name="search" placeholder="Buscar identificador...">
            <button class="col-2" type="submit">Buscar</button>
        </div>
    </form>
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
    <a href="{{ url('part/create') }}" >Crear nuevo registro</a>
    <table class="table">
        <thead>
            <tr>
                <th>Código registro</th><!--id MyAdmin-->
                <th>Código de la pieza</th>
                <th>Funciones</th><!--CRUD-->
            </tr>
        </thead>
        <tbody>
            <!--Blade-->
            @foreach($parts as $part)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $part->id }}</td>
                <td>{{ $part->COD_Part }}</td>
                <td>
                    <!--Añadir opción de actualizar y eliminar-->
                    <!--ACTUALIZAR-->
                    <!--
                        localhost/proyectoAragon/public/livestock_farmer/id/edit 
                        Para conocer cuál es el elemento que quiero que actualice,
                        le paso el id.
                        Se mostrará entonces la vista "edit" 
                        donde aparece el formulario con los campos que se quieren editar
                    -->
                    <a href="{{ url('/part/'.$part->id.'/edit') }}">Editar</a>
                    <!--ELIMINAR-->
                    <!--Para que el software conozca que elemento tiene que borrar,
                        se le pasa el id correspondiente
                    -->
                    <form action="{{ url('/part/'.$part->id) }}" method="post">
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
</div>
@endsection