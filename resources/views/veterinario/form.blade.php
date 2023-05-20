<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="DNI"> DNI: </label>
    <input  type="text" id="DNI" name="DNI" 
            value="{{ isset($veterinario->DNI)?$veterinario->DNI:old('DNI') }}"><br> 

    <label  for="Nombre"> Nombre: </label>
    <input  type="text" id="Nombre" name="Nombre" 
            value="{{ isset($veterinario->Nombre)?$veterinario->Nombre:old('Nombre') }}"><br>

    <label  for="Apellido1"> Primer apellido: </label>
    <input  type="text" id="Apellido1" name="Apellido1" 
            value="{{ isset($veterinario->Apellido1)?$veterinario->Apellido1:old('Apellido1') }}"><br>

    <label  for="Apellido2"> Segundo apellido: </label>
    <input  type="text" id="Apellido2" name="Apellido2" 
            value="{{ isset($veterinario->Apellido2)?$veterinario->Apellido2:old('Apellido2') }}"><br>

    <label  for="Telefono"> Teléfono: </label>
    <input  type="text" id="Telefono" name="Telefono" 
            value="{{ isset($veterinario->Telefono)?$veterinario->Telefono:old('Telefono') }}"><br>

    <label  for="Calle"> Calle: </label>
    <input  type="text" id="Calle" name="Calle" 
            value="{{ isset($veterinario->Calle)?$veterinario->Calle:old('Calle') }}"><br>

    <label  for="Localidad"> Localidad: </label>
    <input  type="text" id="Localidad" name="Localidad" 
            value="{{ isset($veterinario->Localidad)?$veterinario->Localidad:old('Localidad') }}"><br>

    <label  for="Comarca"> Comarca: </label>
    <input  type="text" id="Comarca" name="Comarca" 
            value="{{ isset($veterinario->Comarca)?$veterinario->Comarca:old('Comarca') }}"><br>

    <label  for="Provincia"> Provincia: </label>
    <input  type="text" id="Provincia" name="Provincia" 
            value="{{ isset($veterinario->Provincia)?$veterinario->Provincia:old('Provincia') }}"><br>

    <label  for="Añadir">  </label>
    <input  type="submit" id="AgregarVeterinario" value="{{ $modo }}"><hr>
    
    <div>
        <ul>
                @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                                <dt>{{ $error }}</dt>
                        @endforeach
                @endif
        </ul>
    </div>

    <a href="{{ url('veterinario/') }}" >Volver</a>
<!--fin del formulario por defecto-->