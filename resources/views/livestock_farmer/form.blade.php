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

    <label  for="DNI"> DNI: </label>
    <input  type="text" id="DNI" name="DNI" 
            value="{{ isset($livestock_farmer->DNI)?$livestock_farmer->DNI:old('DNI') }}"><br> 

    <label  for="Nombre"> Nombre: </label>
    <input  type="text" id="Nombre" name="Nombre" 
            value="{{ isset($livestock_farmer->Nombre)?$livestock_farmer->Nombre:old('Nombre') }}"><br>

    <label  for="Apellido1"> Primer apellido: </label>
    <input  type="text" id="Apellido1" name="Apellido1" 
            value="{{ isset($livestock_farmer->Apellido1)?$livestock_farmer->Apellido1:old('Apellido1') }}"><br>

    <label  for="Apellido2"> Segundo apellido: </label>
    <input  type="text" id="Apellido2" name="Apellido2" 
            value="{{ isset($livestock_farmer->Apellido2)?$livestock_farmer->Apellido2:old('Apellido2') }}"><br>

    <label  for="Telefono"> Teléfono: </label>
    <input  type="text" id="Telefono" name="Telefono" 
            value="{{ isset($livestock_farmer->Telefono)?$livestock_farmer->Telefono:old('Telefono') }}"><br>

    <label  for="Correo_Electronico"> Correo electrónico: </label>
    <input  type="text" id="Correo_Electronico" name="Correo_Electronico" 
            value="{{ isset($livestock_farmer->Correo_Electronico)?$livestock_farmer->Correo_Electronico:old('Correo_Electronico') }}"><br>

    <label  for="Provincia"> Provincia: </label>
    <input  type="text" id="Provincia" name="Provincia" 
            value="{{ isset($livestock_farmer->Provincia)?$livestock_farmer->Provincia:old('Provincia') }}"><br>

    <label  for="AgregarLivestock_farmer">  </label>
    <input  type="submit" id="AgregarLivestock_farmer" value="{{ $modo }}"><hr>

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

    <a href="{{ url('livestock_farmer/') }}" >Volver</a>
<!--fin del formulario por defecto-->