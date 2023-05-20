<?php

namespace App\Http\Controllers;

use App\Models\Matarife;
use Illuminate\Http\Request;

class MatarifeController extends Controller
{
    public function index()
    {
        $datos['matarifes'] =Matarife::paginate(10);
        return view('matarife.index', $datos);
    }

    public function create()
    {
        return view('matarife.create');
    }

    public function store(Request $request)
    {

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

        $datosMatarife =request()->except('_token');
        Matarife::insert($datosMatarife);
        return redirect('matarife')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Matarife $matarife)
    {
        //
    }

    public function edit($id)
    {
        $matarife =Matarife::findOrFail($id);
        return view('matarife.edit', compact('matarife'));
    }

    public function update(Request $request, $id)
    {
    
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

        $datosMatarife =request()->except(['_token','_method']); 
        Matarife::where('id','=',$id)->update($datosMatarife);
        $matarife =Matarife::findOrFail($id);
        return redirect('matarife')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Matarife::destroy($id);
        return redirect('matarife')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
