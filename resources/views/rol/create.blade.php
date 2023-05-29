@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/rol') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('rol.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection