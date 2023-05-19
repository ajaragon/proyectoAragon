<?php

namespace App\Http\Controllers;

use App\Models\Explotacion;
use Illuminate\Http\Request;

class ExplotacionController extends Controller
{
    /**
     * En este archivo se le da información al controlador, en este
     * caso de Ganadero, de las vistas creadas
     */

     //Accede a la vista index
     public function index()
     {
         $datos['explotaciones'] =Explotacion::paginate(10); //en la pantalla se mostrarán los datos de 10 ganaderos
         return view('explotacion.index', $datos);
     }
 
     /**
      * Muestra la vista de la interfaz del formulario de creación de un ganadero
      */
     public function create()
     {
         return view('explotacion.create');
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
             'CIF'=>'required|string|max:9',
             'NOM_Explotacion'=>'required|string|max:20',
             'Telefono'=>'required|string|max:9',
             'Calle'=>'required|string|max:30',
             'Localidad'=>'required|string|max:20',
             'Comarca'=>'required|string|max:20',
             'Provincia'=>'required|string|max:20',
         ];
 
         //$mensaje =['required'=>'El :attribute es obligatorio'];
 
         
         $mensaje =
         [
             'CIF.required'=>'Debe introducir el CIF',
             'NOM_Explotacion.required'=>'Debe introducir el nombre de la explotación',
             'Telefono.required'=>'Debe introducir el teléfono',
             'Calle.required'=>'Debe introducir la calle',
             'Localidad.required'=>'Debe introducir la localidad',
             'Comarca.required'=>'Debe introducir la comarca',
             'Provincia.required'=>'Debe introducir la provincia',
         ];
         
 
         $this->validate($request, $campos, $mensaje);
 
         //$datosGanadero =request()->all();             //todos los datos recibidos desde el formulario
         $datosExplotacion =request()->except('_token');    //recibe todos los datos del registro excepto el token
         Explotacion::insert($datosExplotacion);               //a la base de datos le inserta todos los datos que recibe
         //return response()->json($datosGanadero);        //y los va a enviar en un archivo json
         //Se dice que redireccione hacia la vista ganadero una vez introducidos los datos,
         //además, consecuentemente, se mostrará en pantalla la información 
         //de que se guardó un nuevo registro
         return redirect('explotacion')->with('mensaje','Se añadió una explotación a la base de datos.');
         
     }
 
     /**
      * Display the specified resource.
      */
     public function show(Explotacion $explotacion)
     {
         //
     }
 
     /**
      * Show the form for editing the specified resource.
      */
     public function edit($id)
     {
         $explotacion =Explotacion::findOrFail($id);               //guardamos en la variable ganadero
                                                             //los datos del id que recibimos
         return view('explotacion.edit', compact('explotacion'));  //muestra la interfaz donde se pueden actualizar los campos de un registro
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
             'CIF'=>'required|string|max:9',
             'NOM_Explotacion'=>'required|string|max:20',
             'Telefono'=>'required|string|max:9',
             'Calle'=>'required|string|max:30',
             'Localidad'=>'required|string|max:20',
             'Comarca'=>'required|string|max:20',
             'Provincia'=>'required|string|max:20',
         ];
 
         //$mensaje =['required'=>'El :attribute es obligatorio'];
 
         
         $mensaje =
         [
             'CIF.required'=>'Debe introducir el CIF',
             'NOM_Explotacion.required'=>'Debe introducir el nombre de la explotación',
             'Telefono.required'=>'Debe introducir el teléfono',
             'Calle.required'=>'Debe introducir la calle',
             'Localidad.required'=>'Debe introducir la localidad',
             'Comarca.required'=>'Debe introducir la comarca',
             'Provincia.required'=>'Debe introducir la provincia',
         ];
         
 
         $this->validate($request, $campos, $mensaje);
 
         //----------------------------------------------------------------------------------------------------\\
 
         $datosExplotacion =request()->except(['_token','_method']);    //Recibe todos los datos 
                                                                     //exceptuando el token y el método
         Explotacion::where('id','=',$id)->update($datosExplotacion);      //La actualización se llevará a cabo
                                                                     //en el elemento donde coincidan los id
         //Vuelve a recuperar los datos y mostrar los campos del registro con la información actualizada
         $explotacion =Explotacion::findOrFail($id);
         //return view('ganadero.edit', compact('ganadero'));
         return redirect('explotacion')->with('mensaje','Se actualizó el registro de la base de datos.');
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy($id)
     {
         Explotacion::destroy($id);         //le paso el id del elemento que quiero que elimine
         //return redirect('ganadero');  //vuelve a mostrar los registros de todos los ganaderos
         return redirect('explotacion')->with('mensaje','Se eliminó el registro de la base de datos.');  
     }
}
