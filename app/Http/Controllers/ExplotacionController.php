<?php

namespace App\Http\Controllers;

use App\Models\Explotacion;
use Illuminate\Http\Request;

class ExplotacionController extends Controller
{
    public function index()
    {
        $datos['farms'] =Explotacion::paginate(10);
        return view('explotacion.index', $datos);
    }

    public function create()
    {
        return view('explotacion.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            'CIF'=>'required|string|max:9',
            'Nombre_Explotacion'=>'required|string|max:20',
            'Titular'=>'required|string|max:50',
            'Telefono'=>'required|string|max:9',
            'Correo_Electronico'=>'required|string|max:30',
            'Direccion'=>'required|string|max:50',
            'Comarca'=>'required|string|max:20',
            'Provincia'=>'required|string|max:20',
            'CP'=>'required|string|max:5',
            'DNI'=>'required|string|max:9',
            'ID_Animal'=>'required|string|max:9',
        ];
        
        $mensaje =
        [
            'CIF.required'=>'Debe introducir el CIF',
            'Nombre_Explotacion.required'=>'Debe introducir el nombre de la explotación',
            'Titular.required'=>'Debe introducir el titular de la explotación',
            'Telefono.required'=>'Debe introducir el teléfono',
            'Correo_Electronico.required'=>'Debe introducir el correo electrónico',
            'Direccion.required'=>'Debe introducir la dirección',
            'Comarca.required'=>'Debe introducir la comarca',
            'Provincia.required'=>'Debe introducir la provincia',
            'CP.required'=>'Debe introducir el código postal',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosExplotacion =request()->except('_token');
        Explotacion::insert($datosExplotacion);
        return redirect('explotacion')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Explotacion $explotacion)
    {
        //
    }

    public function edit($id)
    {
        $explotacion =Explotacion::findOrFail($id);
        return view('explotacion.edit', compact('explotacion'));
    }

    public function update(Request $request, $id)
    {
    
        $campos =
        [
            'CIF'=>'required|string|max:9',
            'Nombre_Explotacion'=>'required|string|max:20',
            'Titular'=>'required|string|max:50',
            'Telefono'=>'required|string|max:9',
            'Correo_Electronico'=>'required|string|max:30',
            'Direccion'=>'required|string|max:50',
            'Comarca'=>'required|string|max:20',
            'Provincia'=>'required|string|max:20',
            'CP'=>'required|string|max:5',
        ];
        
        $mensaje =
        [
            'CIF.required'=>'Debe introducir el CIF',
            'Nombre_Explotacion.required'=>'Debe introducir el nombre de la explotación',
            'Titular.required'=>'Debe introducir el titular de la explotación',
            'Telefono.required'=>'Debe introducir el teléfono',
            'Correo_Electronico.required'=>'Debe introducir el correo electrónico',
            'Direccion.required'=>'Debe introducir la dirección',
            'Comarca.required'=>'Debe introducir la comarca',
            'Provincia.required'=>'Debe introducir la provincia',
            'CP.required'=>'Debe introducir el código postal',
        ];
        
        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosExplotacion =request()->except(['_token','_method']); 
        Explotacion::where('id','=',$id)->update($datosExplotacion);
        $explotacion =Explotacion::findOrFail($id);
        return redirect('explotacion')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Explotacion::destroy($id);
        return redirect('explotacion')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
