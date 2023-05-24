@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/slaughter') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('slaughter.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection