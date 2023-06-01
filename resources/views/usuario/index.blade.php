@extends('layouts.app')

@section('content')
@vite(['resources/css/tablas.css'])

<!-- Buscador de registros, impresion de tablas y creación de registros-->
<section>
    <a class="btn btn-dark" href="{{ route('usuario.create') }}">Crear usuario</a>
</section>

<section>
    <div class="table-responsive">
        <table class="table table-striped table-light table-hover table-bordered">
            <thead>
                <tr>
                    <th style="display:none">Código registro</th><!--id MyAdmin-->
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Rol</th>
                    <th>Funciones</th><!--CRUD-->
                </tr>
            </thead>
            <tbody>
                <!--Blade-->
                @foreach($usuarios as $usuario)
                <tr>
                    <!--Como aparezcan en MyAdmin-->
                    <!--<td>{{ $usuario->id }}</td>-->
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        @if(!empty($usuario->getRoleNames()))
                        @foreach($usuario->getRoleNames() as $rolName)
                        <h5><span class="badge badge-dark">{{ $rolName }}</span></h5>
                        @endforeach
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-dark btn-sm" href="{{ url('/usuario/'.$usuario->id.'/edit') }}">Editar</a>
                        
                        <form action="{{ url('/usuario/'.$usuario->id) }}" method="post">
                        @csrf    
                            {{ method_field('DELETE') }} 
                            <input class="btn btn-danger" type="submit" id="borrar" value="Eliminar" 
                                    onclick="return confirmacion('Los datos serán borrados')">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection