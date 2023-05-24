@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/slaughterer') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('slaughterer.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection