@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/familia') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('familia.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection