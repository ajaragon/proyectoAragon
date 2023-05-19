<!--Formulario por defecto-->
    <h1>{{ $modo }}</h1><hr>

    <label  for="ID_Animal"> DNI: </label>
    <input  type="text" id="ID_Animal" name="ID_Animal" 
            value="{{ isset($ganado->ID_Animal)?$ganado->ID_Animal:old('ID_Animal') }}"><br> 

    <label  for="NUM_Crotal"> Nombre: </label>
    <input  type="text" id="NUM_Crotal" name="NUM_Crotal" 
            value="{{ isset($ganado->NUM_Crotal)?$ganado->NUM_Crotal:old('NUM_Crotal') }}"><br>

    <label  for="NUM_Crotal"> Primer apellido: </label>
    <input  type="text" id="NUM_Crotal" name="NUM_Crotal" 
            value="{{ isset($ganado->NUM_Crotal)?$ganado->NUM_Crotal:old('NUM_Crotal') }}"><br>

    <label  for="Lugar_Engorde"> Segundo apellido: </label>
    <input  type="text" id="Lugar_Engorde" name="Lugar_Engorde" 
            value="{{ isset($ganado->Lugar_Engorde)?$ganado->Lugar_Engorde:old('Lugar_Engorde') }}"><br>

    <label  for="Fecha_NAC"> Teléfono: </label>
    <input  type="text" id="Fecha_NAC" name="Fecha_NAC" 
            value="{{ isset($ganado->Fecha_NAC)?$ganado->Fecha_NAC:old('Fecha_NAC') }}"><br>

    <label  for="Lugar_NAC"> Calle: </label>
    <input  type="text" id="Lugar_NAC" name="Lugar_NAC" 
            value="{{ isset($ganado->Lugar_NAC)?$ganado->Lugar_NAC:old('Lugar_NAC') }}"><br>

    <label  for="Fecha_SAC"> Localidad: </label>
    <input  type="text" id="Fecha_SAC" name="Fecha_SAC" 
            value="{{ isset($ganado->Fecha_SAC)?$ganado->Fecha_SAC:old('Fecha_SAC') }}"><br>

    <label  for="Lugar_SAC"> Comarca: </label>
    <input  type="text" id="Lugar_SAC" name="Lugar_SAC" 
            value="{{ isset($ganado->Lugar_SAC)?$ganado->Lugar_SAC:old('Lugar_SAC') }}"><br>

    <label  for="Añadir">  </label>
    <input  type="submit" id="AgregarGanado" value="{{ $modo }}"><hr>

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

    <a href="{{ url('ganado/') }}" >Volver</a>
<!--fin del formulario por defecto-->