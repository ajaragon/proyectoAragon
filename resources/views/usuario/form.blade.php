<!--Formulario por defecto-->
    
<h1>{{ $modo }}</h1><hr>

<label  for="name"> Nombre: </label>
<input  type="text" id="name" name="name" 
        value="{{ isset($usuario->name)?$usuario->name:old('name') }}"><br>

<label  for="email"> Correo electrónico: </label>
<input  type="text" id="email" name="email" 
        value="{{ isset($usuario->email)?$usuario->email:old('email') }}"><br>

<label  for="password"> Contraseña: </label>
<input  type="text" id="password" name="password" 
        value="{{ isset($usuario->password)?$usuario->password:old('password') }}"><br>

<label  for="roles"> Permisos(administrador, escritor, consultor): </label>
<input  type="text" id="roles" name="roles" 
        value="{{ isset($usuario->roles)?$usuario->roles:old('roles') }}"><br>

<label  for="AgregarUsuario">  </label>
<input  type="submit" id="AgregarUsuario" value="{{ $modo }}"><hr>

<div>
    <ul>
            @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                            <dt>{{ $error }}</dt>
                    @endforeach
            @endif
    </ul>
</div>

<a href="{{ url('usuario/') }}" >Volver</a>
<!--fin del formulario por defecto-->