@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/usuario') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('usuario.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection