<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="ID_Especie"> ID especie: </label>
    <input  type="text" id="ID_Especie" name="ID_Especie" 
            value="{{ isset($family->ID_Especie)?$family->ID_Especie:old('ID_Especie') }}"><br> 

    <label  for="Descripcion"> Descripción: </label>
    <input  type="text" id="Descripcion" name="Descripcion" 
            value="{{ isset($family->Descripcion)?$family->Descripcion:old('Descripcion') }}"><br>
       
    <label  for="Añadir">  </label>
    <input  type="submit" id="AgregarFamily" value="{{ $modo }}"><hr>
    
    <div>
        <ul>
                @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                                <dt>{{ $error }}</dt>
                        @endforeach
                @endif
        </ul>
    </div>

    <a href="{{ url('family/') }}" >Volver</a>
<!--fin del formulario por defecto-->