@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/explotacion') }}" method="post">  <!--enctype="multipart/form-data" para poder enviar archivos de imágenes-->
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('explotacion.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection