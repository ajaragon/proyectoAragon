<?php

namespace App\Http\Controllers;

use App\Models\Ganado;
use Illuminate\Http\Request;

class GanadoController extends Controller
{
     /**
     * En este archivo se le da información al controlador, en este
     * caso de Ganadero, de las vistas creadas
     */

     //Accede a la vista index
     public function index()
     {
         $datos['ganados'] =Ganado::paginate(10); //en la pantalla se mostrarán los datos de 10 ganaderos
         return view('ganado.index', $datos);
     }
 
     /**
      * Muestra la vista de la interfaz del formulario de creación de un ganadero
      */
     public function create()
     {
         return view('ganado.create');
     }
 
     /**
      * Se encarga de recibir y almacenar la información de los formularios
      */
     public function store(Request $request)
     {
 
         //con el objetivo de evitar que de error a la hora de agregar un nuevo registro con algún campo en blanco
         //obligamos al usuario a introducir datos en ellos mediante el "required"
         $campos =
         [
             'ID_Animal'=>'required|string|max:9',
             'NUM_Crotal'=>'required|string|max:9',
             'Lugar_Engorde'=>'required|string|max:20',
             'Fecha_NAC'=>'required|string|max:8',
             'Lugar_NAC'=>'required|string|max:20',
             'Fecha_SAC'=>'required|string|max:8',
             'Lugar_SAC'=>'required|string|max:8',
         ];
 
         //$mensaje =['required'=>'El :attribute es obligatorio'];
 
         
         $mensaje =
         [
             'ID_Animal.required'=>'Debe introducir el número del identificador',
             'NUM_Crotal.required'=>'Debe introducir el número del crotal',
             'Lugar_Engorde.required'=>'Debe introducir el lugar de engorde',
             'Fecha_NAC.required'=>'Debe introducir la fecha de nacimiento',
             'Lugar_NAC.required'=>'Debe introducir el lugar de nacimiento',
             'Fecha_SAC.required'=>'Debe introducir la fecha de sacrificio',
             'Lugar_SAC.required'=>'Debe introducir el lugar de sacrificio',
         ];
         
 
         $this->validate($request, $campos, $mensaje);
 
         //$datosGanadero =request()->all();             //todos los datos recibidos desde el formulario
         $datosGanado =request()->except('_token');    //recibe todos los datos del registro excepto el token
         Ganado::insert($datosGanado);               //a la base de datos le inserta todos los datos que recibe
         //return response()->json($datosGanadero);        //y los va a enviar en un archivo json
         //Se dice que redireccione hacia la vista ganadero una vez introducidos los datos,
         //además, consecuentemente, se mostrará en pantalla la información 
         //de que se guardó un nuevo registro
         return redirect('ganado')->with('mensaje','Se añadió un animal a la base de datos.');
         
     }
 
     /**
      * Display the specified resource.
      */
     public function show(Ganado $ganado)
     {
         //
     }
 
     /**
      * Show the form for editing the specified resource.
      */
     public function edit($id)
     {
         $ganado =Ganado::findOrFail($id);               //guardamos en la variable ganadero
                                                             //los datos del id que recibimos
         return view('ganado.edit', compact('ganado'));  //muestra la interfaz donde se pueden actualizar los campos de un registro
                                                             //y además la información obtenida anteriormente
     }
 
     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, $id)
     {
 
         //Validar la introducción de datos del formulario
         $campos =
         [
             'ID_Animal'=>'required|string|max:9',
             'NUM_Crotal'=>'required|string|max:9',
             'Lugar_Engorde'=>'required|string|max:20',
             'Fecha_NAC'=>'required|string|max:8',
             'Lugar_NAC'=>'required|string|max:20',
             'Fecha_SAC'=>'required|string|max:8',
             'Lugar_SAC'=>'required|string|max:8',
         ];
 
         //$mensaje =['required'=>'El :attribute es obligatorio'];
 
         
         $mensaje =
         [
             'ID_Animal.required'=>'Debe introducir el número del identificador',
             'NUM_Crotal.required'=>'Debe introducir el número del crotal',
             'Lugar_Engorde.required'=>'Debe introducir el lugar de engorde',
             'Fecha_NAC.required'=>'Debe introducir la fecha de nacimiento',
             'Lugar_NAC.required'=>'Debe introducir el lugar de nacimiento',
             'Fecha_SAC.required'=>'Debe introducir la fecha de sacrificio',
             'Lugar_SAC.required'=>'Debe introducir el lugar de sacrificio',
         ];
         
 
         $this->validate($request, $campos, $mensaje);
 
         //----------------------------------------------------------------------------------------------------\\
 
         $datosGanado =request()->except(['_token','_method']);    //Recibe todos los datos 
                                                                     //exceptuando el token y el método
         Ganado::where('id','=',$id)->update($datosGanado);      //La actualización se llevará a cabo
                                                                     //en el elemento donde coincidan los id
         //Vuelve a recuperar los datos y mostrar los campos del registro con la información actualizada
         $ganado =Ganado::findOrFail($id);
         //return view('ganadero.edit', compact('ganadero'));
         return redirect('ganado')->with('mensaje','Se actualizó el registro de la base de datos.');
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy($id)
     {
         Ganado::destroy($id);         //le paso el id del elemento que quiero que elimine
         //return redirect('ganadero');  //vuelve a mostrar los registros de todos los ganaderos
         return redirect('ganado')->with('mensaje','Se eliminó el registro de la base de datos.');  
     }
}
