<!--Formulario por defecto-->
    <!-- 
        A través del atributo value,
        se le pasa la información que aparece en la pantalla anterior,
        de no existir este atributo, 
        el espacio aparecería en blanco
    -->
    <label for="DNI"> DNI: </label>
    <input type="text" id="DNI" name="DNI" value="{{ $ganadero->DNI }}"><br> 

    <label for="Nombre"> Nombre: </label>
    <input type="text" id="Nombre" name="Nombre" value="{{ $ganadero->Nombre }}"><br>

    <label for="Apellido1"> Primer apellido: </label>
    <input type="text" id="Apellido1" name="Apellido1" value="{{ $ganadero->Apellido1 }}"><br>

    <label for="Apellido2"> Segundo apellido: </label>
    <input type="text" id="Apellido2" name="Apellido2" value="{{ $ganadero->Apellido2 }}"><br>

    <label for="Calle"> Calle: </label>
    <input type="text" id="Calle" name="Calle" value="{{ $ganadero->Calle }}"><br>

    <label for="Localidad"> Localidad: </label>
    <input type="text" id="Localidad" name="Localidad" value="{{ $ganadero->Localidad }}"><br>

    <label for="Comarca"> Comarca: </label>
    <input type="text" id="Comarca" name="Comarca" value="{{ $ganadero->Comarca }}"><br>

    <label for="Provincia"> Provincia: </label>
    <input type="text" id="Provincia" name="Provincia" value="{{ $ganadero->Provincia }}"><br>

    <label for="Añadir">  </label>
    <input type="submit" id="AgregarGanadero" value="Añadir"><hr>
<!--fin del formulario por defecto-->