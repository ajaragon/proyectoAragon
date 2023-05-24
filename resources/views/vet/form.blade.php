<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="NUM_Colegiado"> Número de colegiado: </label>
    <input  type="text" id="NUM_Colegiado" name="NUM_Colegiado" 
            value="{{ isset($vet->NUM_Colegiado)?$vet->NUM_Colegiado:old('NUM_Colegiado') }}"><br> 

    <label  for="DNI"> DNI: </label>
    <input  type="text" id="DNI" name="DNI" 
            value="{{ isset($vet->DNI)?$vet->DNI:old('DNI') }}"><br> 

    <label  for="Nombre"> Nombre: </label>
    <input  type="text" id="Nombre" name="Nombre" 
            value="{{ isset($vet->Nombre)?$vet->Nombre:old('Nombre') }}"><br>

    <label  for="Apellido1"> Primer apellido: </label>
    <input  type="text" id="Apellido1" name="Apellido1" 
            value="{{ isset($vet->Apellido1)?$vet->Apellido1:old('Apellido1') }}"><br>

    <label  for="Apellido2"> Segundo apellido: </label>
    <input  type="text" id="Apellido2" name="Apellido2" 
            value="{{ isset($vet->Apellido2)?$vet->Apellido2:old('Apellido2') }}"><br>

    <label  for="Telefono"> Teléfono: </label>
    <input  type="text" id="Telefono" name="Telefono" 
            value="{{ isset($vet->Telefono)?$vet->Telefono:old('Telefono') }}"><br>

    <label  for="Correo_Electronico"> Correo electrónico: </label>
    <input  type="text" id="Correo_Electronico" name="Correo_Electronico" 
            value="{{ isset($vet->Correo_Electronico)?$vet->Correo_Electronico:old('Correo_Electronico') }}"><br>

    <label  for="Provincia"> Provincia: </label>
    <input  type="text" id="Provincia" name="Provincia" 
            value="{{ isset($vet->Provincia)?$vet->Provincia:old('Provincia') }}"><br>

    <label  for="AgregarVet">  </label>
    <input  type="submit" id="AgregarVet" value="{{ $modo }}"><hr>
    
    <div>
        <ul>
                @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                                <dt>{{ $error }}</dt>
                        @endforeach
                @endif
        </ul>
    </div>

    <a href="{{ url('vet/') }}" >Volver</a>
<!--fin del formulario por defecto-->