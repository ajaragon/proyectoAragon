<!--Formulario por defecto-->
    <h1>{{ $modo }}</h1><hr>

    <label  for="CIF"> DNI: </label>
    <input  type="text" id="CIF" name="CIF" 
            value="{{ isset($explotacion->CIF)?$ganadero->CIF:old('CIF') }}"><br> 

    <label  for="NOM_Explotacion"> Nombre: </label>
    <input  type="text" id="NOM_Explotacion" name="NOM_Explotacion" 
            value="{{ isset($explotacion->NOM_Explotacion)?$explotacion->NOM_Explotacion:old('NOM_Explotacion') }}"><br>

    <label  for="Telefono"> Primer apellido: </label>
    <input  type="text" id="Telefono" name="Telefono" 
            value="{{ isset($explotacion->Telefono)?$explotacion->Telefono:old('Telefono') }}"><br>

    <label  for="Calle"> Calle: </label>
    <input  type="text" id="Calle" name="Calle" 
            value="{{ isset($explotacion->Calle)?$explotacion->Calle:old('Calle') }}"><br>

    <label  for="Localidad"> Localidad: </label>
    <input  type="text" id="Localidad" name="Localidad" 
            value="{{ isset($explotacion->Localidad)?$explotacion->Localidad:old('Localidad') }}"><br>

    <label  for="Comarca"> Comarca: </label>
    <input  type="text" id="Comarca" name="Comarca" 
            value="{{ isset($explotacion->Comarca)?$explotacion->Comarca:old('Comarca') }}"><br>

    <label  for="Provincia"> Provincia: </label>
    <input  type="text" id="Provincia" name="Provincia" 
            value="{{ isset($explotacion->Provincia)?$explotacion->Provincia:old('Provincia') }}"><br>

    <label  for="Añadir">  </label>
    <input  type="submit" id="AgregarExplotacion" value="{{ $modo }}"><hr>

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

    <a href="{{ url('explotacion/') }}" >Volver</a>
<!--fin del formulario por defecto-->