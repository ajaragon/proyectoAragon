<?php

namespace App\Http\Controllers;

use App\Models\Especie;
use Illuminate\Http\Request;

class EspecieController extends Controller
{
    public function index()
    {
        $datos['especies'] =Especie::paginate(10);
        return view('especie.index', $datos);
    }

    public function create()
    {
        return view('especie.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            'ID_Especie'=>'required|string|max:1',
            'Descripcion'=>'required|string|max:10',
        ];

        $mensaje =
        [
            'ID_Especie.required'=>'Debe introducir el identificador de la especie',
            'Descripcion.required'=>'Debe introducir la descripción',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosEspecie =request()->except('_token');
        Especie::insert($datosEspecie);
        return redirect('especie')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Especie $especie)
    {
        //
    }

    public function edit($id)
    {
        $camara =Especie::findOrFail($id);
        return view('especie.edit', compact('especie'));
    }

    public function update(Request $request, $id)
    {
    
        $campos =
        [
            'ID_Especie'=>'required|string|max:1',
            'Descripcion'=>'required|string|max:10',
        ];

        $mensaje =
        [
            'ID_Especie.required'=>'Debe introducir el identificador de la especie',
            'Descripcion.required'=>'Debe introducir la descripción',
        ];
        

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosEspecie =request()->except(['_token','_method']); 
        Especie::where('id','=',$id)->update($datosEspecie);
        $especie =Especie::findOrFail($id);
        return redirect('especie')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Especie::destroy($id);
        return redirect('especie')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
