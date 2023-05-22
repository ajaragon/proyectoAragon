@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/empleado') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('empleado.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection