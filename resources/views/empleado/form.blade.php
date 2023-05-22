<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="DNI"> Número de cámara: </label>
    <input  type="text" id="DNI" name="DNI" 
            value="{{ isset($empleado->DNI)?$empleado->DNI:old('DNI') }}"><br>
            
    <label  for="Nombre"> Número de cámara: </label>
    <input  type="text" id="Nombre" name="Nombre" 
            value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}"><br>

    <label  for="Apellido1"> Número de cámara: </label>
    <input  type="text" id="Apellido1" name="Apellido1" 
            value="{{ isset($empleado->Apellido1)?$empleado->Apellido1:old('Apellido1') }}"><br>

    <label  for="Apellido2"> Número de cámara: </label>
    <input  type="text" id="Apellido2" name="Apellido2" 
            value="{{ isset($empleado->Apellido2)?$empleado->Apellido2:old('Apellido2') }}"><br>

    <label  for="Telefono"> Número de cámara: </label>
    <input  type="text" id="Telefono" name="Telefono" 
            value="{{ isset($empleado->Telefono)?$empleado->Telefono:old('Telefono') }}"><br>

    <label  for="Correo_Electronico"> Número de cámara: </label>
    <input  type="text" id="Correo_Electronico" name="Correo_Electronico" 
            value="{{ isset($empleado->Correo_Electronico)?$empleado->Correo_Electronico:old('Correo_Electronico') }}"><br>

    <label  for="Direccion"> Capacidad: </label>
    <input  type="text" id="Direccion" name="Direccion" 
            value="{{ isset($empleado->Direccion)?$empleado->Direccion:old('Direccion') }}"><br>

    <label  for="Provincia"> Temperatura media: </label>
    <input  type="text" id="Provincia" name="Provincia" 
            value="{{ isset($empleado->Provincia)?$empleado->Provincia:old('Provincia') }}"><br>

    <label  for="Añadir">  </label>
    <input  type="submit" id="AgregarAnimal" value="{{ $modo }}"><hr>
    
    <div>
        <ul>
                @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                                <dt>{{ $error }}</dt>
                        @endforeach
                @endif
        </ul>
    </div>

    <a href="{{ url('animal/') }}" >Volver</a>
<!--fin del formulario por defecto-->