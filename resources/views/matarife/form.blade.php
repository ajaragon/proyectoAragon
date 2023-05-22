<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="DNI"> DNI: </label>
    <input  type="text" id="DNI" name="DNI" 
            value="{{ isset($matarife->DNI)?$matarife->DNI:old('DNI') }}"><br> 

    <label  for="Nombre"> Nombre: </label>
    <input  type="text" id="Nombre" name="Nombre" 
            value="{{ isset($matarife->Nombre)?$matarife->Nombre:old('Nombre') }}"><br>

    <label  for="Apellido1"> Primer apellido: </label>
    <input  type="text" id="Apellido1" name="Apellido1" 
            value="{{ isset($matarife->Apellido1)?$matarife->Apellido1:old('Apellido1') }}"><br>

    <label  for="Apellido2"> Segundo apellido: </label>
    <input  type="text" id="Apellido2" name="Apellido2" 
            value="{{ isset($matarife->Apellido2)?$matarife->Apellido2:old('Apellido2') }}"><br>

    <label  for="Telefono"> Teléfono: </label>
    <input  type="text" id="Telefono" name="Telefono" 
            value="{{ isset($matarife->Telefono)?$matarife->Telefono:old('Telefono') }}"><br>

    <label  for="Correo_Electronico"> Correo electrónico: </label>
    <input  type="text" id="Correo_Electronico" name="Correo_Electronico" 
            value="{{ isset($matarife->Correo_Electronico)?$matarife->Correo_Electronico:old('Correo_Electronico') }}"><br>

    <label  for="Provincia"> Provincia: </label>
    <input  type="text" id="Provincia" name="Provincia" 
            value="{{ isset($matarife->Provincia)?$matarife->Provincia:old('Provincia') }}"><br>

    <label  for="Añadir">  </label>
    <input  type="submit" id="AgregarMatarife" value="{{ $modo }}"><hr>
    
    <div>
        <ul>
                @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                                <dt>{{ $error }}</dt>
                        @endforeach
                @endif
        </ul>
    </div>

    <a href="{{ url('matarife/') }}" >Volver</a>
<!--fin del formulario por defecto-->