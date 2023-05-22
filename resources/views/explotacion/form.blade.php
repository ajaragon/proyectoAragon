<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="CIF"> CIF: </label>
    <input  type="text" id="CIF" name="CIF" 
            value="{{ isset($explotacion->CIF)?$explotacion->CIF:old('CIF') }}"><br> 

    <label  for="Nombre_Explotacion"> Nombre de la explotación: </label>
    <input  type="text" id="Nombre_Explotacion" name="Nombre_Explotacion" 
            value="{{ isset($explotacion->Nombre_Explotacion)?$explotacion->Nombre_Explotacion:old('Nombre_Explotacion') }}"><br>

    <label  for="Titular"> Titular de la explotación: </label>
    <input  type="text" id="Titular" name="Titular" 
            value="{{ isset($explotacion->Titular)?$explotacion->Titular:old('Titular') }}"><br>

    <label  for="Telefono"> Teléfono: </label>
    <input  type="text" id="Telefono" name="Telefono" 
            value="{{ isset($explotacion->Telefono)?$explotacion->Telefono:old('Telefono') }}"><br>

    <label  for="Correo_Electronico"> Correo electrónico: </label>
    <input  type="text" id="Correo_Electronico" name="Correo_Electronico" 
            value="{{ isset($explotacion->Correo_Electronico)?$explotacion->Correo_Electronico:old('Correo_Electronico') }}"><br>

    <label  for="Direccion"> Dirección: </label>
    <input  type="text" id="Direccion" name="Direccion" 
            value="{{ isset($explotacion->Direccion)?$explotacion->Direccion:old('Direccion') }}"><br>

    <label  for="Comarca"> Comarca: </label>
    <input  type="text" id="Comarca" name="Comarca" 
            value="{{ isset($explotacion->Comarca)?$explotacion->Comarca:old('Comarca') }}"><br>

    <label  for="Provincia"> Provincia: </label>
    <input  type="text" id="Provincia" name="Provincia" 
            value="{{ isset($explotacion->Provincia)?$explotacion->Provincia:old('Provincia') }}"><br>

    <label  for="CP"> Código postal: </label>
    <input  type="text" id="CP" name="CP" 
            value="{{ isset($explotacion->CP)?$explotacion->CP:old('CP') }}"><br>
            
    <label  for="Añadir">  </label>
    <input  type="submit" id="AgregarExplotacion" value="{{ $modo }}"><hr>
    
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