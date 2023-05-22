<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="NUM_Colegiado"> Número de colegiado: </label>
    <input  type="text" id="NUM_Colegiado" name="NUM_Colegiado" 
            value="{{ isset($vets->NUM_Colegiado)?$vets->NUM_Colegiado:old('NUM_Colegiado') }}"><br> 

    <label  for="DNI"> DNI: </label>
    <input  type="text" id="DNI" name="DNI" 
            value="{{ isset($vets->DNI)?$vets->DNI:old('DNI') }}"><br> 

    <label  for="Nombre"> Nombre: </label>
    <input  type="text" id="Nombre" name="Nombre" 
            value="{{ isset($vets->Nombre)?$vets->Nombre:old('Nombre') }}"><br>

    <label  for="Apellido1"> Primer apellido: </label>
    <input  type="text" id="Apellido1" name="Apellido1" 
            value="{{ isset($vets->Apellido1)?$vets->Apellido1:old('Apellido1') }}"><br>

    <label  for="Apellido2"> Segundo apellido: </label>
    <input  type="text" id="Apellido2" name="Apellido2" 
            value="{{ isset($vets->Apellido2)?$vets->Apellido2:old('Apellido2') }}"><br>

    <label  for="Telefono"> Teléfono: </label>
    <input  type="text" id="Telefono" name="Telefono" 
            value="{{ isset($vets->Telefono)?$vets->Telefono:old('Telefono') }}"><br>

    <label  for="Correo_Electronico"> Correo electrónico: </label>
    <input  type="text" id="Correo_Electronico" name="Correo_Electronico" 
            value="{{ isset($vets->Correo_Electronico)?$vets->Correo_Electronico:old('Correo_Electronico') }}"><br>

    <label  for="Provincia"> Provincia: </label>
    <input  type="text" id="Provincia" name="Provincia" 
            value="{{ isset($vets->Provincia)?$vets->Provincia:old('Provincia') }}"><br>

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