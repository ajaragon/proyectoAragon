<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="DNI"> DNI: </label>
    <input  type="text" id="DNI" name="DNI" 
            value="{{ isset($administrador->DNI)?$administrador->DNI:old('DNI') }}"><br> 

    <label  for="Nombre"> Nombre: </label>
    <input  type="text" id="Nombre" name="Nombre" 
            value="{{ isset($administrador->Nombre)?$administrador->Nombre:old('Nombre') }}"><br>

    <label  for="Apellido1"> Primer apellido: </label>
    <input  type="text" id="Apellido1" name="Apellido1" 
            value="{{ isset($administrador->Apellido1)?$administrador->Apellido1:old('Apellido1') }}"><br>

    <label  for="Apellido2"> Segundo apellido: </label>
    <input  type="text" id="Apellido2" name="Apellido2" 
            value="{{ isset($administrador->Apellido2)?$administrador->Apellido2:old('Apellido2') }}"><br>

    <label  for="Telefono"> Teléfono: </label>
    <input  type="text" id="Telefono" name="Telefono" 
            value="{{ isset($administrador->Telefono)?$administrador->Telefono:old('Telefono') }}"><br>

    <label  for="Calle"> Calle: </label>
    <input  type="text" id="Calle" name="Calle" 
            value="{{ isset($administrador->Calle)?$administrador->Calle:old('Calle') }}"><br>

    <label  for="Localidad"> Localidad: </label>
    <input  type="text" id="Localidad" name="Localidad" 
            value="{{ isset($administrador->Localidad)?$administrador->Localidad:old('Localidad') }}"><br>

    <label  for="Comarca"> Comarca: </label>
    <input  type="text" id="Comarca" name="Comarca" 
            value="{{ isset($administrador->Comarca)?$administrador->Comarca:old('Comarca') }}"><br>

    <label  for="Provincia"> Provincia: </label>
    <input  type="text" id="Provincia" name="Provincia" 
            value="{{ isset($administrador->Provincia)?$administrador->Provincia:old('Provincia') }}"><br>

    <label  for="Añadir">  </label>
    <input  type="submit" id="AgregarAdministrador" value="{{ $modo }}"><hr>
    
    <div>
        <ul>
                @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                                <dt>{{ $error }}</dt>
                        @endforeach
                @endif
        </ul>
    </div>

    <a href="{{ url('administrador/') }}" >Volver</a>
<!--fin del formulario por defecto-->