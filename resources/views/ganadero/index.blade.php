MOSTRAR LISTA DE GANADEROS
 <table class="table">
    <thead>
        <tr>
            <th>Código</th><!--id MyAdmin-->
            <th>DNI</th>
            <th>Nombre</th>
            <th>Primer apellido</th>
            <th>Segundo apellido</th>
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
            <td>{{ $ganadero->nombre }}</td>
            <td>{{ $ganadero->Apellido1 }}</td>
            <td>{{ $ganadero->Apellido2 }}</td>
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
                    <input  type="submit" 
                            id="borrar" 
                            value="Eliminar" 
                            onclick="return confirmacion('Los datos serán borrados')">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
 </table>