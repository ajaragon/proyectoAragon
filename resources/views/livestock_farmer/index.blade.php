
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
    <a href="{{ url('livestock_farmer/create') }}" >Crear nuevo registro</a>
    <table class="table">
        <thead>
            <tr>
                <th>Código registro</th><!--id MyAdmin-->
                <th>DNI</th>
                <th>Nombre</th>
                <th>Primer apellido</th>
                <th>Segundo apellido</th>
                <th>Teléfono</th>
                <th>Correo electrónico</th>
                <th>Provincia</th>
                <th>Funciones</th><!--CRUD-->
            </tr>
        </thead>
        <tbody>
            <!--Blade-->
            @foreach($livestock_farmers as $livestock_farmer)
            <tr>
                <!--Como aparezcan en MyAdmin-->
                <td>{{ $livestock_farmer->id }}</td>
                <td>{{ $livestock_farmer->DNI }}</td>
                <td>{{ $livestock_farmer->Nombre }}</td>
                <td>{{ $livestock_farmer->Apellido1 }}</td>
                <td>{{ $livestock_farmer->Apellido2 }}</td>
                <td>{{ $livestock_farmer->Telefono }}</td>
                <td>{{ $livestock_farmer->Correo_Electronico }}</td>
                <td>{{ $livestock_farmer->Provincia }}</td>
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
                    <a href="{{ url('/livestock_farmer/'.$livestock_farmer->id.'/edit') }}">Editar</a>
                    <!--ELIMINAR-->
                    <!--Para que el software conozca que elemento tiene que borrar,
                        se le pasa el id correspondiente
                    -->
                    <form action="{{ url('/livestock_farmer/'.$livestock_farmer->id) }}" method="post">
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
    {!! $livestock_farmers->links() !!}
</div>
@endsection