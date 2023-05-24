<?php

namespace App\Http\Controllers;

use App\Models\chamber;
use Illuminate\Http\Request;

class chamberController extends Controller
{
    public function index()
    {
        $datos['chambers'] =Chamber::paginate(10);
        return view('chamber.index', $datos);
    }

    public function create()
    {
        return view('chamber.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            'NUM_chamber'=>'required|string|max:2',
            'Capacidad'=>'required|string|max:3',
            'COD_Slaughter'=>'required|string|max:2',
        ];
        
        $mensaje =
        [
            'NUM_chamber.required'=>'Debe introducir el número de la cámara frigorífica',
            'Capacidad.required'=>'Debe introducir la capacidad de la cámara',
            'COD_Slaughter.required'=>'Debe introducir el código del sacrificio',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosChamber =request()->except('_token');
        Chamber::insert($datosChamber);
        return redirect('chamber')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Chamber $chamber)
    {
        //
    }

    public function edit($id)
    {
        $chamber =Chamber::findOrFail($id);
        return view('chamber.edit', compact('chamber'));
    }

    public function update(Request $request, $id)
    {
    
        $campos =
        [
            'NUM_chamber'=>'required|string|max:2',
            'Capacidad'=>'required|string|max:3',
            'COD_Slaughter'=>'required|string|max:2',
        ];
        
        $mensaje =
        [
            'NUM_chamber.required'=>'Debe introducir el número de la cámara frigorífica',
            'Capacidad.required'=>'Debe introducir la capacidad de la cámara',
            'COD_Slaughter.required'=>'Debe introducir el código del sacrificio',
        ];
        

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosChamber =request()->except(['_token','_method']); 
        Chamber::where('id','=',$id)->update($datosChamber);
        $chamber =Chamber::findOrFail($id);
        return redirect('chamber')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Chamber::destroy($id);
        return redirect('chamber')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
