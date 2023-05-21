@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/matarife') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('matarife.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection