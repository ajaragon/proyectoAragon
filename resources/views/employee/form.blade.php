<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="ID_Employee"> ID del empleado: </label>
    <input  type="text" id="ID_Employee" name="ID_Employee" 
            value="{{ isset($employee->ID_Employee)?$employee->ID_Employee:old('ID_Employee') }}"><br>

    <label  for="DNI"> DNI: </label>
    <input  type="text" id="DNI" name="DNI" 
            value="{{ isset($employee->DNI)?$employee->DNI:old('DNI') }}"><br>
            
    <label  for="Nombre"> Nombre: </label>
    <input  type="text" id="Nombre" name="Nombre" 
            value="{{ isset($employee->Nombre)?$employee->Nombre:old('Nombre') }}"><br>

    <label  for="Apellido1"> Primer apellido: </label>
    <input  type="text" id="Apellido1" name="Apellido1" 
            value="{{ isset($employee->Apellido1)?$employee->Apellido1:old('Apellido1') }}"><br>

    <label  for="Apellido2"> Segundo apellido: </label>
    <input  type="text" id="Apellido2" name="Apellido2" 
            value="{{ isset($employee->Apellido2)?$employee->Apellido2:old('Apellido2') }}"><br>

    <label  for="Telefono"> Teléfono: </label>
    <input  type="text" id="Telefono" name="Telefono" 
            value="{{ isset($employee->Telefono)?$employee->Telefono:old('Telefono') }}"><br>

    <label  for="Correo_Electronico"> Correo electrónico: </label>
    <input  type="text" id="Correo_Electronico" name="Correo_Electronico" 
            value="{{ isset($employee->Correo_Electronico)?$employee->Correo_Electronico:old('Correo_Electronico') }}"><br>

    <label  for="Direccion"> Dirección: </label>
    <input  type="text" id="Direccion" name="Direccion" 
            value="{{ isset($employee->Direccion)?$employee->Direccion:old('Direccion') }}"><br>

    <label  for="Provincia"> Provincia: </label>
    <input  type="text" id="Provincia" name="Provincia" 
            value="{{ isset($employee->Provincia)?$employee->Provincia:old('Provincia') }}"><br>

    <label  for="CIF"> Provincia: </label>
    <input  type="text" id="CIF" name="CIF" 
            value="{{ isset($employee->CIF)?$employee->CIF:old('CIF') }}"><br>

    <label  for="AgregarEmpleado">  </label>
    <input  type="submit" id="AgregarEmpleado" value="{{ $modo }}"><hr>
    
    <div>
        <ul>
                @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                                <dt>{{ $error }}</dt>
                        @endforeach
                @endif
        </ul>
    </div>

    <a href="{{ url('employee/') }}" >Volver</a>
<!--fin del formulario por defecto-->