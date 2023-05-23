<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="Numero_Camara"> Número de cámara: </label>
    <input  type="text" id="Numero_Camara" name="Numero_Camara" 
            value="{{ isset($camara->Numero_Camara)?$camara->Numero_Camara:old('Numero_Camara') }}"><br> 

    <label  for="Capacidad"> Capacidad: </label>
    <input  type="text" id="Capacidad" name="Capacidad" 
            value="{{ isset($camara->Capacidad)?$camara->Capacidad:old('Capacidad') }}"><br>
    <!--
    <label  for="Temperatura_Media"> Temperatura media: </label>
    <input  type="text" id="Temperatura_Media" name="Temperatura_Media" 
            value="{{ isset($camara->Temperatura_Media)?$camara->Temperatura_Media:old('Temperatura_Media') }}"><br>
    -->
    <label  for="Añadir">  </label>
    <input  type="submit" id="AgregarCamara" value="{{ $modo }}"><hr>
    
    <div>
        <ul>
                @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                                <dt>{{ $error }}</dt>
                        @endforeach
                @endif
        </ul>
    </div>

    <a href="{{ url('camara/') }}" >Volver</a>
<!--fin del formulario por defecto-->