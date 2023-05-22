<!--Formulario por defecto-->
    
    <h1>{{ $modo }}</h1><hr>

    <label  for="ID_Especie"> ID especie: </label>
    <input  type="text" id="ID_Especie" name="ID_Especie" 
            value="{{ isset($familia->ID_Especie)?$familia->ID_Especie:old('ID_Especie') }}"><br> 

    <label  for="Descripcion"> Descripción: </label>
    <input  type="text" id="Descripcion" name="Descripcion" 
            value="{{ isset($familia->Descripcion)?$explotacion->Descripcion:old('Descripcion') }}"><br>
       
    <label  for="Añadir">  </label>
    <input  type="submit" id="AgregarFamilia" value="{{ $modo }}"><hr>
    
    <div>
        <ul>
                @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                                <dt>{{ $error }}</dt>
                        @endforeach
                @endif
        </ul>
    </div>

    <a href="{{ url('familia/') }}" >Volver</a>
<!--fin del formulario por defecto-->