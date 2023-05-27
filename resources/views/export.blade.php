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
                    <th scope="col">ID registro</th><!--id MyAdmin-->
                    <th scope="col">ID Animal</th>
                    <th scope="col">Número de crotal</th>
                    <th scope="col">Lugar de engorde</th>
                    <th scope="col">Lugar de nacimiento</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Lugar de slaughter</th>
                    <th scope="col">Fecha de slaughter</th>
                    <th scope="col">ID Especie</th>
            </tr>
            @foreach($animals as $animal)
                <tr>
                    <td>{{ $animal->id }}</td>
                    <td>{{ $animal->ID_Animal }}</td>
                    <td>{{ $animal->NUM_Crotal }}</td>
                    <td>{{ $animal->L_Engorde }}</td>
                    <td>{{ $animal->L_Nacimiento }}</td>
                    <td>{{ $animal->F_Nacimiento }}</td>
                    <td>{{ $animal->L_Slaughter }}</td>
                    <td>{{ $animal->F_Slaughter }}</td>
                    <td>{{ $animal->ID_Especie }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>