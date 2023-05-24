@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/employee') }}" method="post">
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('employee.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection