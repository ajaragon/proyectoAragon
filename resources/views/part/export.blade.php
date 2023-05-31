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
                <th scope="col">Código de la pieza</th>
                <th scope="col">Descripción</th>
            </tr>
            @foreach($parts as $part)
                <tr>
                    <td>{{ $part->id }}</td>
                    <td>{{ $part->COD_Part }}</td>
                    <td>{{ $part->Descripcion }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>