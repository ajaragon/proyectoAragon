<?php
//---------------------------------------------------------------------------------\\
//---------------------------------------------------------------------------------\\
//BACKEND
//---------------------------------------------------------------------------------\\
//---------------------------------------------------------------------------------\\

/*
localhost/proyectoAragon
*/

//Import punteros hacie los controladores
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; //enlace creado con el controlador de home
use App\Http\Controllers\AnimalController; //enlace creado con el controlador de animal
//use App\Http\Controllers\AnimalPartController; //enlace creado con el controlador de animal/part
use App\Http\Controllers\ChamberController; //enlace creado con el controlador de chamber
use App\Http\Controllers\EmployeeController; //enlace creado con el controlador de employee
use App\Http\Controllers\FarmController; //enlace creado con el controlador de farm
use App\Http\Controllers\FamilyController; //enlace creado con el controlador de family
use App\Http\Controllers\Livestock_farmerController; //enlace creado con el controlador de livestock_farmer
use App\Http\Controllers\PartController; //enlace creado con el controlador de part
use App\Http\Controllers\SlaughterController; //enlace creado con el controlador de slaughter
use App\Http\Controllers\SlaughtererController; //enlace creado con el controlador de slaughterer
//use App\Http\Controllers\SlaughterSlaughtererController; //enlace creado con el controlador de slaughter/slaughterer
use App\Http\Controllers\VetController; //enlace creado con el controlador de vet
use App\Http\Controllers\PDFController; //enlace creado con el controlador de vet

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

//CAMBIAR RUTA "/"; añadir "/home": Lo que se encuentra un internauta nada más acceder al sitio web
/*
Route::get('/home', function () {
    return view('auth.login');  //aparece la vista donde el usuario se loguea
});
*/

Route::get('/', function () {
    return view('auth.login');  //aparece la vista donde el usuario se loguea
});

//enla url localhost/proyectoAragon/public/
//ordeno que muestre la vista de welcome
/*
Route::get('/', function(){
    return view('welcome');
});
*/

//RUTAS GANADEROS
/*
RUTAS NECESARIAS:
    Ruta para mostrar la lista con todos los livestock_farmers
        (
            Podré añadir un nuevo livestock_farmer,
            borrar un livestock_farmer,
            abrir una interfaz donde actualizar los datos del livestock_farmer
        )
    Ruta para mostrar una interfaz donde pueda actualizar los datos de un livestock_farmer
*/

//---------------------------------------------------------------\\
//OPCIÓN DE RUTAS 1
/*
Ejemplo de ruta:
Route::get('/', function () {
    return view('Livestock_farmer.');   //el punto permite acceder 
                                //a cualquiera de las vistas de 
                                // la carpeta livestock_farmer
});
*/
/*
//Routa que me dirige hacia la vista de index.blade.php
Route::get('/livestock_farmer', function () {
    return view('livestock_farmer.index');
});

//Routa que me dirige hacia la vista de create.blade.php
Route::get('/livestock_farmer', function () {
    return view('livestock_farmer.create');
});

//Routa que me dirige hacia la vista de edit.blade.php
Route::get('/livestock_farmer', function () {
    return view('livestock_farmer.edit');
});

//Routa que me dirige hacia la vista de form.blade.php
Route::get('/livestock_farmer', function () {
    return view('livestock_farmer.form');
});
*/
//---------------------------------------------------------------\\
//OPCIÓN DE RUTAS 2
/*
//accede a la función create del controlador de Livestock_farmer
Route::get('/livestock_farmer/create',[Livestock_farmerController::class,'create']);
*/
//---------------------------------------------------------------\\
//OPCIÓN DE RUTAS 3
//Route::resource('livestock_farmer',Livestock_farmerController::class);  //Para acceder a las direcciones 
                                                        //que se crearon en el controlador de Livestock_farmer
                                                        //php artisan route:list
//---------------------------------------------------------------\\



//el middleware evita que una persona que conoce la url pueda introducir datos
//con el "auth" se obliga a cualquier usuario a loguearse


//SEGURIDAD
//Route::resource('livestock_farmer',Livestock_farmerController::class)->middleware('auth');

Route::resource('home',HomeController::class);
Route::resource('animal',AnimalController::class);
//Route::resource('animal',AnimalPartController::class);
Route::resource('chamber',ChamberController::class);
Route::resource('employee',EmployeeController::class);
Route::resource('farm',FarmController::class);
Route::resource('family',FamilyController::class);
Route::resource('livestock_farmer',Livestock_farmerController::class);
Route::resource('part',PartController::class);
Route::resource('slaughter',SlaughterController::class);
Route::resource('slaughterer',SlaughtererController::class);
//Route::resource('animal',SlaughterSlaughtererController::class);
Route::resource('vet',VetController::class);


Auth::routes();
Auth::routes(['register'=>false,'reset'=>false]);//. . . . . . . . . . . . . . Seguridad

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home',[Livestock_farmerController::class,'index'])->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [Livestock_farmerController::class, 'index'])->name('home');
});


//Obtiene la ruta, concatena /xxxxx con la función index del controlador xxxxx 
Route::get('/home',[HomeController::class,'index'])->name('home');  //lleva a la interfaz principal de la base de datos una vez que el usuario se registra
Route::get('/animal',[AnimalController::class,'index'])->name('animal');
//Route::get('/animal_part',[AnimalPartController::class,'index'])->name('animal_part');
Route::get('/chamber',[ChamberController::class,'index'])->name('chamber');
Route::get('/employee',[EmployeeController::class,'index'])->name('employee');
Route::get('/farm',[FarmController::class,'index'])->name('farm');
Route::get('/family',[FamilyController::class,'index'])->name('family');
Route::get('/livestock_farmer',[Livestock_farmerController::class,'index'])->name('livestock_farmer');
Route::get('/part',[PartController::class,'index'])->name('part');
Route::get('/slaughter',[SlaughterController::class,'index'])->name('slaughter');
Route::get('/slaughterer',[SlaughtererController::class,'index'])->name('slaughterer');
//Route::get('/slaughter_slaughterer',[SlaughterSlaughtererController::class,'index'])->name('slaughter_slaughterer');
Route::get('/vet',[VetController::class,'index'])->name('vet');



Route::get('/animal',[AnimalController::class,'search']);
//Route::get('/animal_part',[AnimalPartController::class,'search']);
Route::get('/chamber',[ChamberController::class,'search']);
Route::get('/employee',[EmployeeController::class,'search']);
Route::get('/family',[FamilyController::class,'search']);
Route::get('/farm',[FarmController::class,'search']);
Route::get('/livestock_farmer',[Livestock_farmerController::class,'search']);
Route::get('/part',[PartController::class,'search']);
Route::get('/slaughter',[SlaughterController::class,'search']);
Route::get('/slaughterer',[SlaughtererController::class,'search']);
//Route::get('/slaughter_slaughterer',[SlaughterSlaughtererController::class,'search']);
Route::get('/vet',[VetController::class,'search']);


//Ruta para exportar tablas en .pdf
//Route::get('animal.export', [AnimalController::class, 'export'])->name('export');
Route::get('export', [AnimalController::class, 'export']);























//---------------------------------------------------------------------------------\\
//---------------------------------------------------------------------------------\\
//FRONTEND
//---------------------------------------------------------------------------------\\
//---------------------------------------------------------------------------------\\

//Para que nos muestre la vista "Sobre nosotros"
Route::get('/about', function(){
    return view('layouts/about');
});

//Para que nos muestre la vista "Blog"
Route::get('/blog', function(){
    return view('layouts/blog');
});

//Para que nos muestre la vista "Contacta con nosotros"
Route::get('/contact', function(){
    return view('layouts/contact');
});

//Para que muestre las entradas del blog
Route::get('/entrada1', function(){
    return view('layouts/entrada1');
});

Route::get('/entrada12', function(){
    return view('layouts/entrada2');
});

Route::get('/entrada3', function(){
    return view('layouts/entrada3');
});

Route::get('/entrada4', function(){
    return view('layouts/entrada4');
});

Route::get('/entrada5', function(){
    return view('layouts/entrada5');
});

Route::get('/entrada6', function(){
    return view('layouts/entrada6');
});

