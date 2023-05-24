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
        "isset($livestock_farmer->DNI)?$livestock_farmer->DNI:' '"
        La función old() conserva la información que había en el campo
        antes de aplicar el guardar los cambios
        De lo contrario, esta información desaparece
    -->
    <h1>{{ $modo }}</h1><hr>

    <label  for="COD_Inventory"> Código del inventory: </label>
    <input  type="text" id="COD_Inventory" name="COD_Inventory" 
            value="{{ isset($inventory->COD_Inventory)?$inventory->COD_Inventory:old('COD_Inventory') }}"><br> 

    <label  for="COD_Part"> Código de la part: </label>
    <input  type="text" id="COD_Part" name="COD_Part" 
            value="{{ isset($inventory->COD_Part)?$inventory->COD_Part:old('COD_Part') }}"><br>

    <label  for="NUM_chamber"> Número de cámara frigorífica: </label>
    <input  type="text" id="NUM_chamber" name="NUM_chamber" 
            value="{{ isset($inventory->NUM_chamber)?$inventory->NUM_chamber:old('NUM_chamber') }}"><br>

    <label  for="COD_Slaughter"> Código del slaughter: </label>
    <input  type="text" id="COD_Slaughter" name="COD_Slaughter" 
            value="{{ isset($inventory->COD_Slaughter)?$inventory->COD_Slaughter:old('COD_Slaughter') }}"><br>

    <label  for="ID_Employee"> Identificador del employee: </label>
    <input  type="text" id="ID_Employee" name="ID_Employee" 
            value="{{ isset($inventory->ID_Employee)?$inventory->ID_Employee:old('ID_Employee') }}"><br>

    <label  for="Añadir">  </label>
    <input  type="submit" id="AgregarInventory" value="{{ $modo }}"><hr>

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

    <a href="{{ url('inventory/') }}" >Volver</a>
<!--fin del formulario por defecto-->