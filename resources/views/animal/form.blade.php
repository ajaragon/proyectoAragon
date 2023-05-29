<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="ID_Animal"> Identificador del animal: </label>
    <input  type="text" id="ID_Animal" name="ID_Animal" 
            value="{{ isset($animal->ID_Animal)?$animal->ID_Animal:old('ID_Animal') }}"><br>
            
    <label  for="NUM_Crotal"> Número del crotal: </label>
    <input  type="text" id="NUM_Crotal" name="NUM_Crotal" 
            value="{{ isset($animal->NUM_Crotal)?$animal->NUM_Crotal:old('NUM_Crotal') }}"><br>

    <label  for="L_Engorde"> Lugar de engorde: </label>
    <input  type="text" id="L_Engorde" name="L_Engorde" 
            value="{{ isset($animal->L_Engorde)?$animal->L_Engorde:old('L_Engorde') }}"><br>

    <label  for="L_Nacimiento"> Lugar de nacimiento: </label>
    <input  type="text" id="L_Nacimiento" name="L_Nacimiento" 
            value="{{ isset($animal->L_Nacimiento)?$animal->L_Nacimiento:old('L_Nacimiento') }}"><br>

    <label  for="F_Nacimiento"> Fecha de naccimiento: </label>
    <input  type="text" id="F_Nacimiento" name="F_Nacimiento" 
            value="{{ isset($animal->F_Nacimiento)?$animal->F_Nacimiento:old('F_Nacimiento') }}"><br>

    <label  for="L_Slaughter"> Lugar de sacrificio: </label>
    <input  type="text" id="L_Slaughter" name="L_Slaughter" 
            value="{{ isset($animal->L_Slaughter)?$animal->L_Slaughter:old('L_Slaughter') }}"><br>

    <label  for="F_Slaughter"> Fecha de sacrificio: </label>
    <input  type="text" id="F_Slaughter" name="F_Slaughter" 
            value="{{ isset($animal->F_Slaughter)?$animal->F_Slaughter:old('F_Slaughter') }}"><br>

    <label  for="ID_Especie"> Identificador de la especie: </label>
    <input  type="text" id="ID_Especie" name="ID_Especie" 
            value="{{ isset($animal->ID_Especie)?$animal->ID_Especie:old('ID_Especie') }}"><br>

    <label  for="CIF"> CIF de la explotación: </label>
    <input  type="text" id="CIF" name="CIF" 
            value="{{ isset($animal->CIF)?$animal->CIF:old('CIF') }}"><br>

    <label  for="AgregarAnimal">  </label>
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