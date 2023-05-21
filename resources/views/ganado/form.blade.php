<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="ID_ANIMAL"> Identificar del animal: </label>
    <input  type="text" id="ID_ANIMAL" name="ID_ANIMAL" 
            value="{{ isset($ganado->ID_ANIMAL)?$ganado->ID_ANIMAL:old('ID_ANIMAL') }}"><br> 

    <label  for="NUM_Crotal"> Número del crotal: </label>
    <input  type="text" id="NUM_Crotal" name="NUM_Crotal" 
            value="{{ isset($ganado->NUM_Crotal)?$ganado->NUM_Crotal:old('NUM_Crotal') }}"><br>

    <label  for="L_Engorde"> Lugar de engorde: </label>
    <input  type="text" id="L_Engorde" name="L_Engorde" 
            value="{{ isset($ganado->L_Engorde)?$ganado->L_Engorde:old('L_Engorde') }}"><br>

    <label  for="L_Nacimiento"> Lugar de nacimiento: </label>
    <input  type="text" id="L_Nacimiento" name="L_Nacimiento" 
            value="{{ isset($ganado->L_Nacimiento)?$ganado->L_Nacimiento:old('L_Nacimiento') }}"><br>

    <label  for="F_Nacimiento"> Fecha de nacimiento: </label>
    <input  type="text" id="F_Nacimiento" name="F_Nacimiento" 
            value="{{ isset($ganado->F_Nacimiento)?$ganado->F_Nacimiento:old('F_Nacimiento') }}"><br>

    <label  for="L_Sacrificio"> Lugar de sacrificio: </label>
    <input  type="text" id="L_Sacrificio" name="L_Sacrificio" 
            value="{{ isset($ganado->L_Sacrificio)?$ganado->L_Sacrificio:old('L_Sacrificio') }}"><br>

    <label  for="F_Sacrificio"> Fecha de sacrificio: </label>
    <input  type="text" id="F_Sacrificio" name="F_Sacrificio" 
            value="{{ isset($ganado->F_Sacrificio)?$ganado->F_Sacrificio:old('F_Sacrificio') }}"><br>

    <label  for="Añadir">  </label>
    <input  type="submit" id="AgregarGanado" value="{{ $modo }}"><hr>
    
    <div>
        <ul>
                @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                                <dt>{{ $error }}</dt>
                        @endforeach
                @endif
        </ul>
    </div>

    <a href="{{ url('ganado/') }}" >Volver</a>
<!--fin del formulario por defecto-->