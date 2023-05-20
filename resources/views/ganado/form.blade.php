<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="DNI"> DNI: </label>
    <input  type="text" id="DNI" name="DNI" 
            value="{{ isset($ganado->DNI)?$ganado->DNI:old('DNI') }}"><br> 

    <label  for="Nombre"> Nombre: </label>
    <input  type="text" id="Nombre" name="Nombre" 
            value="{{ isset($ganado->Nombre)?$ganado->Nombre:old('Nombre') }}"><br>

    <label  for="Apellido1"> Primer apellido: </label>
    <input  type="text" id="Apellido1" name="Apellido1" 
            value="{{ isset($ganado->Apellido1)?$ganado->Apellido1:old('Apellido1') }}"><br>

    <label  for="Apellido2"> Segundo apellido: </label>
    <input  type="text" id="Apellido2" name="Apellido2" 
            value="{{ isset($ganado->Apellido2)?$ganado->Apellido2:old('Apellido2') }}"><br>

    <label  for="Telefono"> Teléfono: </label>
    <input  type="text" id="Telefono" name="Telefono" 
            value="{{ isset($ganado->Telefono)?$ganado->Telefono:old('Telefono') }}"><br>

    <label  for="Calle"> Calle: </label>
    <input  type="text" id="Calle" name="Calle" 
            value="{{ isset($ganado->Calle)?$ganado->Calle:old('Calle') }}"><br>

    <label  for="Localidad"> Localidad: </label>
    <input  type="text" id="Localidad" name="Localidad" 
            value="{{ isset($ganado->Localidad)?$ganado->Localidad:old('Localidad') }}"><br>

    <label  for="Comarca"> Comarca: </label>
    <input  type="text" id="Comarca" name="Comarca" 
            value="{{ isset($ganado->Comarca)?$ganado->Comarca:old('Comarca') }}"><br>

    <label  for="Provincia"> Provincia: </label>
    <input  type="text" id="Provincia" name="Provincia" 
            value="{{ isset($ganado->Provincia)?$ganado->Provincia:old('Provincia') }}"><br>

    <label  for="Añadir">  </label>
    <input  type="submit" id="AgregarGanado" value="{{ $modo }}"><hr>
    
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