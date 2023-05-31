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
                <th scope="col">DNI</th>
                <th scope="col">Nombre</th>
                <th scope="col">Primer apellido</th>
                <th scope="col">Segundo apellido</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo electrónico</th>
                <th scope="col">Provincia</th>
                <th scope="col">CIF de la explotación</th>
            </tr>
            @foreach($livestock_farmers as $livestock_farmer)
                <tr>
                    <td>{{ $livestock_farmer->id }}</td>
                    <td>{{ $livestock_farmer->DNI }}</td>
                    <td>{{ $livestock_farmer->Nombre }}</td>
                    <td>{{ $livestock_farmer->Apellido1 }}</td>
                    <td>{{ $livestock_farmer->Apellido2 }}</td>
                    <td>{{ $livestock_farmer->Telefono }}</td>
                    <td>{{ $livestock_farmer->Correo_Electronico }}</td>
                    <td>{{ $livestock_farmer->Provincia }}</td>
                    <td>{{ $livestock_farmer->CIF }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>