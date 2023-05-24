<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="ID_Employee"> Número de cámara: </label>
    <input  type="text" id="ID_Employee" name="ID_Employee" 
            value="{{ isset($employee->ID_Employee)?$employee->ID_Employee:old('ID_Employee') }}"><br>

    <label  for="DNI"> Número de cámara: </label>
    <input  type="text" id="DNI" name="DNI" 
            value="{{ isset($employee->DNI)?$employee->DNI:old('DNI') }}"><br>
            
    <label  for="Nombre"> Número de cámara: </label>
    <input  type="text" id="Nombre" name="Nombre" 
            value="{{ isset($employee->Nombre)?$employee->Nombre:old('Nombre') }}"><br>

    <label  for="Apellido1"> Número de cámara: </label>
    <input  type="text" id="Apellido1" name="Apellido1" 
            value="{{ isset($employee->Apellido1)?$employee->Apellido1:old('Apellido1') }}"><br>

    <label  for="Apellido2"> Número de cámara: </label>
    <input  type="text" id="Apellido2" name="Apellido2" 
            value="{{ isset($employee->Apellido2)?$employee->Apellido2:old('Apellido2') }}"><br>

    <label  for="Telefono"> Número de cámara: </label>
    <input  type="text" id="Telefono" name="Telefono" 
            value="{{ isset($employee->Telefono)?$employee->Telefono:old('Telefono') }}"><br>

    <label  for="Correo_Electronico"> Número de cámara: </label>
    <input  type="text" id="Correo_Electronico" name="Correo_Electronico" 
            value="{{ isset($employee->Correo_Electronico)?$employee->Correo_Electronico:old('Correo_Electronico') }}"><br>

    <label  for="Direccion"> Capacidad: </label>
    <input  type="text" id="Direccion" name="Direccion" 
            value="{{ isset($employee->Direccion)?$employee->Direccion:old('Direccion') }}"><br>

    <label  for="Provincia"> Temperatura media: </label>
    <input  type="text" id="Provincia" name="Provincia" 
            value="{{ isset($employee->Provincia)?$employee->Provincia:old('Provincia') }}"><br>

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