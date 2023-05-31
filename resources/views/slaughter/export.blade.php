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
                <th scope="col">Código de sacrificio</th>
                <th scope="col">Número de colegiado</th>
                <th scope="col">Identificador del animal</th>
                <th scope="col">Identificador del empleado</th>
            </tr>
            @foreach($slaughters as $slaughter)
                <tr>
                    <td>{{ $slaughter->id }}</td>
                    <td>{{ $slaughter->COD_Slaughter }}</td>
                    <td>{{ $slaughter->NUM_Colegiado }}</td>
                    <td>{{ $slaughter->ID_Animal }}</td>
                    <td>{{ $slaughter->ID_Employee }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>