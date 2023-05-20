@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/administrador') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('administrador.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection