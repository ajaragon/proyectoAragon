@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/especie') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('especie.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection