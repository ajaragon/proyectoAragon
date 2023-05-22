<!--Formulario por defecto-->
    <!-- 
        A través del atributo value,
        se le pasa la información que aparece en la pantalla anterior,
        de no existir este atributo, 
        el espacio aparecería en blanco
    -->
    <!--
        Con un operador ternario, le decimos al programa que 
        en el caso de que esté definida la variable,
        se muestre en pantalla.
        En caso contrario, lo sustituirá por un espacio en blanco
        "isset($ganadero->DNI)?$ganadero->DNI:' '"
        La función old() conserva la información que había en el campo
        antes de aplicar el guardar los cambios
        De lo contrario, esta información desaparece
    -->
    <h1>{{ $modo }}</h1><hr>

    <label  for="COD_Inventario"> Código del inventario: </label>
    <input  type="text" id="COD_Inventario" name="COD_Inventario" 
            value="{{ isset($inventario->COD_Inventario)?$inventario->COD_Inventario:old('COD_Inventario') }}"><br> 

    <label  for="COD_Pieza"> Código de la pieza: </label>
    <input  type="text" id="COD_Pieza" name="COD_Pieza" 
            value="{{ isset($inventario->COD_Pieza)?$inventario->COD_Pieza:old('COD_Pieza') }}"><br>

    <label  for="NUM_Camara"> Número de cámara frigorífica: </label>
    <input  type="text" id="NUM_Camara" name="NUM_Camara" 
            value="{{ isset($inventario->NUM_Camara)?$inventario->NUM_Camara:old('NUM_Camara') }}"><br>

    <label  for="COD_Sacrificio"> Código del sacrificio: </label>
    <input  type="text" id="COD_Sacrificio" name="COD_Sacrificio" 
            value="{{ isset($inventario->COD_Sacrificio)?$inventario->COD_Sacrificio:old('COD_Sacrificio') }}"><br>

    <label  for="ID_Empleado"> Identificador del empleado: </label>
    <input  type="text" id="ID_Empleado" name="ID_Empleado" 
            value="{{ isset($inventario->ID_Empleado)?$inventario->ID_Empleado:old('ID_Empleado') }}"><br>

    <label  for="Añadir">  </label>
    <input  type="submit" id="AgregarInventario" value="{{ $modo }}"><hr>

    <!--Aviso de campos por rellenar-->
    <div>
        <ul>
                @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                                <dt>{{ $error }}</dt>
                        @endforeach
                @endif
        </ul>
    </div>

    <a href="{{ url('inventario/') }}" >Volver</a>
<!--fin del formulario por defecto-->