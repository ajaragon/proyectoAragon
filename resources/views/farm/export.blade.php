<!--https://www.youtube.com/watch?v=owqgIwvXic0&list=LL&index=1-->

<!DOCTYPE html>
<html>
    <head>
        <title>Exportar animales</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <h1>{{ $title }}</h1>
        <p>{{ $date }}</p>
    
        <table class="table table-bordered table-sm">
            <tr>
                <th scope="col">Código registro</th><!--id MyAdmin-->
                <th scope="col">CIF</th>
                <th scope="col">Nombre de la explotación</th>
                <th scope="col">Titular</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo electrónico</th>
                <th scope="col">Dirección</th>
                <th scope="col">Comarca</th>
                <th scope="col">Provincia</th>
                <th scope="col">Código postal</th>
            </tr>
            @foreach($farms as $farm)
                <tr>
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
                </tr>
            @endforeach
        </table>
    </body>
</html>