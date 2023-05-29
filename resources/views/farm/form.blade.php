<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="CIF"> CIF: </label>
    <input  type="text" id="CIF" name="CIF" 
            value="{{ isset($farm->CIF)?$farm->CIF:old('CIF') }}"><br> 

    <label  for="Nombre_Farm"> Nombre de la explotación: </label>
    <input  type="text" id="Nombre_Farm" name="Nombre_Farm" 
            value="{{ isset($farm->Nombre_Farm)?$farm->Nombre_Farm:old('Nombre_Farm') }}"><br>

    <label  for="Titular"> Titular de la explotación: </label>
    <input  type="text" id="Titular" name="Titular" 
            value="{{ isset($farm->Titular)?$farm->Titular:old('Titular') }}"><br>

    <label  for="Telefono"> Teléfono: </label>
    <input  type="text" id="Telefono" name="Telefono" 
            value="{{ isset($farm->Telefono)?$farm->Telefono:old('Telefono') }}"><br>

    <label  for="Correo_Electronico"> Correo electrónico: </label>
    <input  type="text" id="Correo_Electronico" name="Correo_Electronico" 
            value="{{ isset($farm->Correo_Electronico)?$farm->Correo_Electronico:old('Correo_Electronico') }}"><br>

    <label  for="Direccion"> Dirección: </label>
    <input  type="text" id="Direccion" name="Direccion" 
            value="{{ isset($farm->Direccion)?$farm->Direccion:old('Direccion') }}"><br>

    <label  for="Comarca"> Comarca: </label>
    <input  type="text" id="Comarca" name="Comarca" 
            value="{{ isset($farm->Comarca)?$farm->Comarca:old('Comarca') }}"><br>

    <label  for="Provincia"> Provincia: </label>
    <input  type="text" id="Provincia" name="Provincia" 
            value="{{ isset($farm->Provincia)?$farm->Provincia:old('Provincia') }}"><br>

    <label  for="CP"> Código postal: </label>
    <input  type="text" id="CP" name="CP" 
            value="{{ isset($farm->CP)?$farm->CP:old('CP') }}"><br>
    
    <label  for="AgregarFarm">  </label>
    <input  type="submit" id="AgregarFarm" value="{{ $modo }}"><hr>
    
    <div>
        <ul>
                @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                                <dt>{{ $error }}</dt>
                        @endforeach
                @endif
        </ul>
    </div>

    <a href="{{ url('farm/') }}" >Volver</a>
<!--fin del formulario por defecto-->