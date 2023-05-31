<!--https://www.youtube.com/watch?v=owqgIwvXic0&list=LL&index=1-->

<!DOCTYPE html>
<html>
    <head>
        <title>Exportar cámaras</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <h1>{{ $title }}</h1>
        <p>{{ $date }}</p>
    
        <table class="table table-bordered table-sm">
            <tr>
                    <th scope="col">ID registro</th><!--id MyAdmin-->
                    <th scope="col">Número de cámara</th>
                    <th scope="col">Capacidad</th>
                    <th scope="col">Código del sacrificio</th>
            </tr>
            @foreach($chambers as $chamber)
                <tr>
                    <td>{{ $chamber->id }}</td>
                    <td>{{ $chamber->NUM_Chamber }}</td>
                    <td>{{ $chamber->Capacidad }}</td>
                    <td>{{ $chamber->COD_Slaughter }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>