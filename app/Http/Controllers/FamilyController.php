<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index()
    {
        $datos['families'] =Family::paginate(10);
        return view('family.index', $datos);
    }

    public function create()
    {
        return view('family.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            'ID_Especie'=>'required|string|max:1',
            'Descripcion'=>'required|string|max:20',
        ];
        
        $mensaje =
        [
            'ID_Especie.required'=>'Debe introducir el identificador de la especie',
            'Descripcion.required'=>'Debe introducir la descripción',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosFamily =request()->except('_token');
        Family::insert($datosFamily);
        return redirect('family')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Family $family)
    {
        //
    }

    public function edit($id)
    {
        $family =Family::findOrFail($id);
        return view('family.edit', compact('family'));
    }

    public function update(Request $request, $id)
    {
    
        $campos =
        [
            'ID_Especie'=>'required|string|max:1',
            'Descripcion'=>'required|string|max:20',
        ];
        
        $mensaje =
        [
            'ID_Especie.required'=>'Debe introducir el identificador de la especie',
            'Descripcion.required'=>'Debe introducir la descripción',
        ];

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosFamily =request()->except(['_token','_method']); 
        Family::where('id','=',$id)->update($datosFamily);
        $family =Family::findOrFail($id);
        return redirect('family')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Family::destroy($id);
        return redirect('family')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
