<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="DNI"> DNI: </label>
    <input  type="text" id="DNI" name="DNI" 
            value="{{ isset($slaughterer->DNI)?$slaughterer->DNI:old('DNI') }}"><br> 

    <label  for="Nombre"> Nombre: </label>
    <input  type="text" id="Nombre" name="Nombre" 
            value="{{ isset($slaughterer->Nombre)?$slaughterer->Nombre:old('Nombre') }}"><br>

    <label  for="Apellido1"> Primer apellido: </label>
    <input  type="text" id="Apellido1" name="Apellido1" 
            value="{{ isset($slaughterer->Apellido1)?$slaughterer->Apellido1:old('Apellido1') }}"><br>

    <label  for="Apellido2"> Segundo apellido: </label>
    <input  type="text" id="Apellido2" name="Apellido2" 
            value="{{ isset($slaughterer->Apellido2)?$slaughterer->Apellido2:old('Apellido2') }}"><br>

    <label  for="Telefono"> Teléfono: </label>
    <input  type="text" id="Telefono" name="Telefono" 
            value="{{ isset($slaughterer->Telefono)?$slaughterer->Telefono:old('Telefono') }}"><br>

    <label  for="Correo_Electronico"> Correo electrónico: </label>
    <input  type="text" id="Correo_Electronico" name="Correo_Electronico" 
            value="{{ isset($slaughterer->Correo_Electronico)?$slaughterer->Correo_Electronico:old('Correo_Electronico') }}"><br>

    <label  for="Provincia"> Provincia: </label>
    <input  type="text" id="Provincia" name="Provincia" 
            value="{{ isset($slaughterer->Provincia)?$slaughterer->Provincia:old('Provincia') }}"><br>

    <label  for="AgregarSlaughterer">  </label>
    <input  type="submit" id="AgregarSlaughterer" value="{{ $modo }}"><hr>
    
    <div>
        <ul>
                @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                                <dt>{{ $error }}</dt>
                        @endforeach
                @endif
        </ul>
    </div>

    <a href="{{ url('slaughterer/') }}" >Volver</a>
<!--fin del formulario por defecto-->