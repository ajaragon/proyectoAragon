@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/farm') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('farm.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection