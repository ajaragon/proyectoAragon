@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/camara') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('camara.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection