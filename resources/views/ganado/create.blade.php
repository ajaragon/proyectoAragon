@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/ganado') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('ganado.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection