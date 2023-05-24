@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/chamber') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('chamber.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection