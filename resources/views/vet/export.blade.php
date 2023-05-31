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
                <th scope="col">Número del colegiado</th>
                <th scope="col">DNI</th>
                <th scope="col">Nombre</th>
                <th scope="col">Primer apellido</th>
                <th scope="col">Segundo apellido</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo electrónico</th>
                <th scope="col">Provincia</th>
            </tr>
            @foreach($vets as $vet)
                <tr>
                    <td>{{ $vet->id }}</td>
                    <td>{{ $vet->NUM_Colegiado }}</td>
                    <td>{{ $vet->DNI }}</td>
                    <td>{{ $vet->Nombre }}</td>
                    <td>{{ $vet->Apellido1 }}</td>
                    <td>{{ $vet->Apellido2 }}</td>
                    <td>{{ $vet->Telefono }}</td>
                    <td>{{ $vet->Correo_Electronico }}</td>
                    <td>{{ $vet->Provincia }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>