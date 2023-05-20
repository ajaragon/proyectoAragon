@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/veterinario') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('veterinario.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection