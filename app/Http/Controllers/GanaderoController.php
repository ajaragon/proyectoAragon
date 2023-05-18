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
        //$datosGanadero =request()->all();             //todos los datos recibidos desde el formulario
        $datosGanadero =request()->except('_token');    //recibe todos los datos del registro excepto el token
        Ganadero::insert($datosGanadero);               //a la base de datos le inserta todos los datos que recibe
        return response()->json($datosGanadero);        //y los va a enviar en un archivo json                                 
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
    public function update(Request $request, Ganadero $ganadero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Ganadero::destroy($id);         //le paso el id del elemento que quiero que elimine
        return redirect('ganadero');    //vuelve a mostrar los registros de todos los ganaderos    
    }
}
