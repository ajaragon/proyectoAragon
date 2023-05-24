@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/family') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('family.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection