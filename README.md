Andrés Julián Aragón Guerrero

Versiones:

1.0V Creación de Modelos y Vistas

2.0V Creación de Tablas y Campos

3.0V Creación de relaciones

Para realizar la programación de la base de datos he seguido el tutorial de YouTube
"Cómo hacer un CRUD en Laravel paso a paso, gratis y desde cero" del canal Develoteca

https://www.youtube.com/watch?v=9DU7WLZeam8

composer require laravel/ui

En la carpeta vistas se crea una nueva carpeta llamada auth

php artisan ui bootstrap --auth

npm install

npm run dev

Para realizar cambios en los campos seguí el tutorial de YouTube
"Modificar tablas ya existentes con las migraciones de Laravel" del canal Duilio Palacios
https://www.youtube.com/watch?v=fT9is7r6QoM

Para crear las relaciones entre las tablas consulté la documentación de Laravel

https://laravel.com/docs/10.x/eloquent-relationships

https://www.youtube.com/watch?v=GFo3N9RNu8U

php artisan make:model Farm  -cr

php artisan make:migration create_farm_table

//En un principio, el códido en el archivo app.blade.php era: 
    <a class="nav-link" href="{{ route('farm.index') }}">{{ __('Registro de las farmes') }}</a>
//Pero en la pantalla aparecía el error Route [XXXXXXX] not defined
//Así que para solucionarlo encontré este vídeo:

https://www.youtube.com/watch?v=8uHWH8NWfEg

Para ordenar registros:

https://www.youtube.com/watch?v=pmstPUEL2kU

