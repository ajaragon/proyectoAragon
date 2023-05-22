<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="ID_Animal"> Número de cámara: </label>
    <input  type="text" id="ID_Animal" name="ID_Animal" 
            value="{{ isset($animal->ID_Animal)?$animal->ID_Animal:old('ID_Animal') }}"><br>
            
    <label  for="NUM_Crotal"> Número de cámara: </label>
    <input  type="text" id="NUM_Crotal" name="NUM_Crotal" 
            value="{{ isset($animal->NUM_Crotal)?$animal->NUM_Crotal:old('NUM_Crotal') }}"><br>

    <label  for="L_Engorde"> Número de cámara: </label>
    <input  type="text" id="L_Engorde" name="L_Engorde" 
            value="{{ isset($animal->L_Engorde)?$animal->L_Engorde:old('L_Engorde') }}"><br>

    <label  for="L_Nacimiento"> Número de cámara: </label>
    <input  type="text" id="L_Nacimiento" name="L_Nacimiento" 
            value="{{ isset($animal->L_Nacimiento)?$animal->L_Nacimiento:old('L_Nacimiento') }}"><br>

    <label  for="F_Nacimiento"> Número de cámara: </label>
    <input  type="text" id="F_Nacimiento" name="F_Nacimiento" 
            value="{{ isset($animal->F_Nacimiento)?$animal->F_Nacimiento:old('F_Nacimiento') }}"><br>

    <label  for="L_Sacrificio"> Número de cámara: </label>
    <input  type="text" id="L_Sacrificio" name="L_Sacrificio" 
            value="{{ isset($animal->L_Sacrificio)?$animal->L_Sacrificio:old('L_Sacrificio') }}"><br>

    <label  for="F_Sacrificio"> Capacidad: </label>
    <input  type="text" id="F_Sacrificio" name="F_Sacrificio" 
            value="{{ isset($animal->F_Sacrificio)?$animal->F_Sacrificio:old('F_Sacrificio') }}"><br>

    <label  for="ID_Matarife"> Temperatura media: </label>
    <input  type="text" id="ID_Matarife" name="ID_Matarife" 
            value="{{ isset($animal->ID_Matarife)?$animal->ID_Matarife:old('ID_Matarife') }}"><br>

    <label  for="ID_Especie"> Temperatura media: </label>
    <input  type="text" id="ID_Especie" name="ID_Especie" 
            value="{{ isset($animal->ID_Especie)?$animal->ID_Especie:old('ID_Especie') }}"><br>

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