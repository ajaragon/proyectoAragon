@extends('layouts.app')

@section('content')
<div class="container">
    <!-- 
        Para que la función "storage" pueda recibir los datos que le introducen desde este formulario,
        desde el atributo action se debe pasar la url a la que queremos enviarlos a través de blade.
        php artisan route:list
            -POST ganadero ganadero.storage
    -->
    <form action="{{ url('/ganadero') }}" method="post">  <!--enctype="multipart/form-data" para poder enviar archivos de imágenes-->
    @csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
    @include('ganadero.form',['modo'=>'Añadir registro'])
    </form>
</div>
@endsection