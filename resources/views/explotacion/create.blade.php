@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/explotacion') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('explotacion.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection