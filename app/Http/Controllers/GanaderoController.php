<?php

namespace App\Http\Controllers;

use App\Models\Ganadero;
use Illuminate\Http\Request;

class GanaderoController extends Controller
{
    /**
     * En este archivo se le da información al controlador, en este
     * caso de Ganadero, de las vistas creadas
     */

     //Accede a la vista index
    public function index()
    {
        $datos['ganaderos'] =Ganadero::paginate(10); //en la pantalla se mostrarán los datos de 10 ganaderos
        return view('ganadero.index', $datos);
    }

    /**
     * Muestra la vista de la interfaz del formulario de creación de un ganadero
     */
    public function create()
    {
        return view('ganadero.create');
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
            'DNI'=>'required|string|max:9',
            'Nombre'=>'required|string|max:20',
            'Apellido1'=>'required|string|max:20',
            'Apellido2'=>'required|string|max:20',
            'Telefono'=>'required|string|max:9',
            'Calle'=>'required|string|max:30',
            'Localidad'=>'required|string|max:20',
            'Comarca'=>'required|string|max:20',
            'Provincia'=>'required|string|max:20',
        ];

        //$mensaje =['required'=>'El :attribute es obligatorio'];

        
        $mensaje =
        [
            'DNI.required'=>'Debe introducir el DNI',
            'Nombre.required'=>'Debe introducir el nombre',
            'Apellido1.required'=>'Debe introducir el primer apellido',
            'Apellido2.required'=>'Debe introducir el segundo apellido',
            'Telefono.required'=>'Debe introducir el teléfono',
            'Calle.required'=>'Debe introducir la calle',
            'Localidad.required'=>'Debe introducir la localidad',
            'Comarca.required'=>'Debe introducir la comarca',
            'Provincia.required'=>'Debe introducir la provincia',
        ];
        

        $this->validate($request, $campos, $mensaje);

        //$datosGanadero =request()->all();             //todos los datos recibidos desde el formulario
        $datosGanadero =request()->except('_token');    //recibe todos los datos del registro excepto el token
        Ganadero::insert($datosGanadero);               //a la base de datos le inserta todos los datos que recibe
        //return response()->json($datosGanadero);        //y los va a enviar en un archivo json
        //Se dice que redireccione hacia la vista ganadero una vez introducidos los datos,
        //además, consecuentemente, se mostrará en pantalla la información 
        //de que se guardó un nuevo registro
        return redirect('ganadero')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Ganadero $ganadero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ganadero =Ganadero::findOrFail($id);               //guardamos en la variable ganadero
                                                            //los datos del id que recibimos
        return view('ganadero.edit', compact('ganadero'));  //muestra la interfaz donde se pueden actualizar los campos de un registro
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
            'DNI'=>'required|string|max:9',
            'Nombre'=>'required|string|max:20',
            'Apellido1'=>'required|string|max:20',
            'Apellido2'=>'required|string|max:20',
            'Telefono'=>'required|string|max:9',
            'Calle'=>'required|string|max:30',
            'Localidad'=>'required|string|max:20',
            'Comarca'=>'required|string|max:20',
            'Provincia'=>'required|string|max:20',
        ];

        //$mensaje =['required'=>'El :attribute es obligatorio'];

        
        $mensaje =
        [
            'DNI.required'=>'Debe introducir el DNI',
            'Nombre.required'=>'Debe introducir el nombre',
            'Apellido1.required'=>'Debe introducir el primer apellido',
            'Apellido2.required'=>'Debe introducir el segundo apellido',
            'Telefono.required'=>'Debe introducir el teléfono',
            'Calle.required'=>'Debe introducir la calle',
            'Localidad.required'=>'Debe introducir la localidad',
            'Comarca.required'=>'Debe introducir la comarca',
            'Provincia.required'=>'Debe introducir la provincia',
        ];
        

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosGanadero =request()->except(['_token','_method']);    //Recibe todos los datos 
                                                                    //exceptuando el token y el método
        Ganadero::where('id','=',$id)->update($datosGanadero);      //La actualización se llevará a cabo
                                                                    //en el elemento donde coincidan los id
        //Vuelve a recuperar los datos y mostrar los campos del registro con la información actualizada
        $ganadero =Ganadero::findOrFail($id);
        //return view('ganadero.edit', compact('ganadero'));
        return redirect('ganadero')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Ganadero::destroy($id);         //le paso el id del elemento que quiero que elimine
        //return redirect('ganadero');  //vuelve a mostrar los registros de todos los ganaderos
        return redirect('ganadero')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
