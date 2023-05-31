<!--https://www.youtube.com/watch?v=owqgIwvXic0&list=LL&index=1-->

<!DOCTYPE html>
<html>
    <head>
        <title>Exportar empleados</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <h1>{{ $title }}</h1>
        <p>{{ $date }}</p>
    
        <table class="table table-bordered table-sm">
            <tr>
                    <th scope="col">ID registro</th><!--id MyAdmin-->
                    <th scope="col">Identificador del empleado</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Primer apellido</th>
                    <th scope="col">Segundo apellido</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo electrónico</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Provincia</th>
            </tr>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $animal->id }}</td>
                    <td>{{ $animal->ID_Employee }}</td>
                    <td>{{ $animal->DNI }}</td>
                    <td>{{ $animal->Nombre }}</td>
                    <td>{{ $animal->Apellido1 }}</td>
                    <td>{{ $animal->Apellido2 }}</td>
                    <td>{{ $animal->Telefono }}</td>
                    <td>{{ $animal->Correo_Electronico }}</td>
                    <td>{{ $animal->Direccion }}</td>
                    <td>{{ $animal->Provincia }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>