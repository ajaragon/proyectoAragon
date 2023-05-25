<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="NUM_Chamber"> Número de cámara: </label>
    <input  type="text" id="NUM_Chamber" name="NUM_Chamber" 
            value="{{ isset($chamber->NUM_Chamber)?$chamber->NUM_Chamber:old('NUM_Chamber') }}"><br> 

    <label  for="Capacidad"> Capacidad: </label>
    <input  type="text" id="Capacidad" name="Capacidad" 
            value="{{ isset($chamber->Capacidad)?$chamber->Capacidad:old('Capacidad') }}"><br>

    <label  for="COD_Slaughter"> Código de la pieza: </label>
    <input  type="text" id="COD_Slaughter" name="COD_Slaughter" 
            value="{{ isset($chamber->COD_Slaughter)?$chamber->COD_Slaughter:old('COD_Slaughter') }}"><br>
    
    <label  for="AgregarChamber">  </label>
    <input  type="submit" id="AgregarChamber" value="{{ $modo }}"><hr>
    
    <div>
        <ul>
                @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                                <dt>{{ $error }}</dt>
                        @endforeach
                @endif
        </ul>
    </div>

    <a href="{{ url('chamber/') }}" >Volver</a>
<!--fin del formulario por defecto-->