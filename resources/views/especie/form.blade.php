<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="ID_Especie"> Identificador de la especie: </label>
    <input  type="text" id="ID_Especie" name="ID_Especie" 
            value="{{ isset($especie->ID_Especie)?$especie->ID_Especie:old('ID_Especie') }}"><br> 

    <label  for="Descripcion"> Descripción: </label>
    <input  type="text" id="Descripcion" name="Descripcion" 
            value="{{ isset($especie->Descripcion)?$especie->Descripcion:old('Descripcion') }}"><br>

    <label  for="Añadir">  </label>
    <input  type="submit" id="AgregarEspecie" value="{{ $modo }}"><hr>
    
    <div>
        <ul>
                @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                                <dt>{{ $error }}</dt>
                        @endforeach
                @endif
        </ul>
    </div>

    <a href="{{ url('especie/') }}" >Volver</a>
<!--fin del formulario por defecto-->