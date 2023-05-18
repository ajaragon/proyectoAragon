FORMULARIO DE CREACIÓN DE GANADERO 

<!-- 
    Para que la función "storage" pueda recibir los datos que le introducen desde este formulario,
    desde el atributo action se debe pasar la url a la que queremos enviarlos a través de blade.
    php artisan route:list
        -POST ganadero ganadero.storage
-->
<form action="{{ url('/ganadero') }}" method="post"><hr>  <!--enctype="multipart/form-data" para poder enviar archivos de imágenes-->
@csrf <!--TOKEN DE SEGURIDAD: ENVÍO DE DATOS DESDE EL FORMULARIO-->      
@include('ganadero.form')
</form>