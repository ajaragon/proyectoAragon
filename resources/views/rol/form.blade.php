<!--Formulario por defecto-->
    
<h1>{{ $modo }}</h1><hr>

<label  for="rol"> Rol: </label>
<input  type="text" id="rol" name="rol" 
        value="{{ isset($rol->rol)?$rol->rol:old('rol') }}"><br>

<label  for="AgregarRol">  </label>
<input  type="submit" id="AgregarRol" value="{{ $modo }}"><hr>

<div>
    <ul>
            @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                            <dt>{{ $error }}</dt>
                    @endforeach
            @endif
    </ul>
</div>

<a href="{{ url('rol/') }}" >Volver</a>
<!--fin del formulario por defecto-->