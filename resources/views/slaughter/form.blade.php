<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="COD_Slaughter"> Código del sacrificio: </label>
    <input  type="text" id="COD_Slaughter" name="COD_Slaughter" 
            value="{{ isset($slaughter->COD_Slaughter)?$slaughter->COD_Slaughter:old('COD_Slaughter') }}"><br> 

    <label  for="NUM_Colegiado"> Identificador del vaterinario: </label>
    <input  type="text" id="NUM_Colegiado" name="NUM_Colegiado" 
            value="{{ isset($slaughter->NUM_Colegiado)?$slaughter->NUM_Colegiado:old('ID_VNUM_Colegiadoet') }}"><br>

    <label  for="ID_Animal"> Identificador del animal: </label>
    <input  type="text" id="ID_Animal" name="ID_Animal" 
            value="{{ isset($slaughter->ID_Animal)?$slaughter->ID_Animal:old('ID_Animal') }}"><br>

    <label  for="ID_Employee"> Identificador del empleado: </label>
    <input  type="text" id="ID_Employee" name="ID_Employee" 
            value="{{ isset($slaughter->ID_Employee)?$slaughter->ID_Employee:old('ID_Employee') }}"><br>

    <label  for="AgregarSlaughter">  </label>
    <input  type="submit" id="AgregarSlaughter" value="{{ $modo }}"><hr>
    
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