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

    <label  for="COD_Part"> Código de la pieza: </label>
    <input  type="text" id="COD_Part" name="COD_Part" 
            value="{{ isset($part->COD_Part)?$part->COD_Part:old('COD_Part') }}"><br> 

    <label  for="Descripcion"> Descripción: </label>
    <input  type="text" id="Nombre" name="Nombre" 
            value="{{ isset($part->Nombre)?$part->Nombre:old('Nombre') }}"><br>

    <label  for="AgregarPart">  </label>
    <input  type="submit" id="AgregarPart" value="{{ $modo }}"><hr>

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

    <a href="{{ url('part/') }}" >Volver</a>
<!--fin del formulario por defecto-->