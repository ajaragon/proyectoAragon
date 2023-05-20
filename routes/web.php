<?php

//Import punteros hacie los controladores
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; //enlace creado con el controlador de explotacion
use App\Http\Controllers\ExplotacionController; //enlace creado con el controlador de explotacion
use App\Http\Controllers\CamaraController; //enlace creado con el controlador de camara
use App\Http\Controllers\EspecieController; //enlace creado con el controlador de especie
use App\Http\Controllers\GanaderoController; //enlace creado con el controlador de ganadero
use App\Http\Controllers\GanadoController; //enlace creado con el controlador de ganado
use App\Http\Controllers\AdministradorController; //enlace creado con el controlador de administrador
use App\Http\Controllers\VeterinarioController; //enlace creado con el controlador de veterinario
use App\Http\Controllers\MatarifeController; //enlace creado con el controlador de matarife


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');  //aparece la vista donde el usuario se loguea
});

//RUTAS GANADEROS
/*
RUTAS NECESARIAS:
    Ruta para mostrar la lista con todos los ganaderos
        (
            Podré añadir un nuevo ganadero,
            borrar un ganadero,
            abrir una interfaz donde actualizar los datos del ganadero
        )
    Ruta para mostrar una interfaz donde pueda actualizar los datos de un ganadero
*/

//---------------------------------------------------------------\\
//OPCIÓN DE RUTAS 1
/*
Ejemplo de ruta:
Route::get('/', function () {
    return view('Ganadero.');   //el punto permite acceder 
                                //a cualquiera de las vistas de 
                                // la carpeta ganadero
});
*/
/*
//Routa que me dirige hacia la vista de index.blade.php
Route::get('/ganadero', function () {
    return view('ganadero.index');
});

//Routa que me dirige hacia la vista de create.blade.php
Route::get('/ganadero', function () {
    return view('ganadero.create');
});

//Routa que me dirige hacia la vista de edit.blade.php
Route::get('/ganadero', function () {
    return view('ganadero.edit');
});

//Routa que me dirige hacia la vista de form.blade.php
Route::get('/ganadero', function () {
    return view('ganadero.form');
});
*/
//---------------------------------------------------------------\\
//OPCIÓN DE RUTAS 2
/*
//accede a la función create del controlador de Ganadero
Route::get('/ganadero/create',[GanaderoController::class,'create']);
*/
//---------------------------------------------------------------\\
//OPCIÓN DE RUTAS 3
//Route::resource('ganadero',GanaderoController::class);  //Para acceder a las direcciones 
                                                        //que se crearon en el controlador de Ganadero
                                                        //php artisan route:list
//---------------------------------------------------------------\\

//el middleware evita que una persona que conoce la url pueda introducir datos
//con el "auth" se obliga a cualquier usuario a loguearse
//Route::resource('ganadero',GanaderoController::class)->middleware('auth');. .//Seguridad
Route::resource('home',HomeController::class);
Route::resource('explotacion',ExplotacionController::class);
Route::resource('camara',CamaraController::class);
Route::resource('especie',EspecieController::class);
Route::resource('ganadero',GanaderoController::class);
Route::resource('ganado',GanadoController::class);
Route::resource('administrador',AdministradorController::class);
Route::resource('veterinario',VeterinarioController::class);
Route::resource('matarife',MatarifeController::class);


Auth::routes();
//Auth::routes(['register'=>false,'reset'=>false]);. . . . . . . . . . . . . . //Seguridad

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home',[GanaderoController::class,'index'])->name('home');
/*
Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [GanaderoController::class, 'index'])->name('home');
});
*/

//Obtén la ruta, concatena /xxxxx con la función index del controlador xxxxx
Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/explotacion',[ExplotacionController::class,'index'])->name('explotacion');
Route::get('/camara',[CamaraController::class,'index'])->name('camara');
Route::get('/especie',[EspecieController::class,'index'])->name('especie');
Route::get('/ganadero',[GanaderoController::class,'index'])->name('ganadero');
Route::get('/ganado',[GanadoController::class,'index'])->name('ganado');
Route::get('/administrador',[AdministradorController::class,'index'])->name('administrador');
Route::get('/veterinario',[VeterinarioController::class,'index'])->name('veterinario');
Route::get('/matarife',[MatarifeController::class,'index'])->name('matarife');

