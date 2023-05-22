@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/animal') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('animal.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection