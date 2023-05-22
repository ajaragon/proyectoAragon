<?php

namespace App\Http\Controllers;

use App\Models\Sacrificio;
use Illuminate\Http\Request;

class SacrificioController extends Controller
{
    public function index()
    {
        $datos['slaughters'] =Sacrificio::paginate(10);
        return view('sacrificio.index', $datos);
    }

    public function create()
    {
        return view('sacrificio.create');
    }

    public function store(Request $request)
    {
        $campos =
        [
            'COD_Sacrificio'=>'required|string|max:9',
            'Descripcion'=>'required|string|max:50',
            'ID_Veterinario'=>'required|string|max:9',
            'ID_Matarife'=>'required|string|max:9',
            'ID_Animal'=>'required|string|max:9',
        ];
        
        $mensaje =
        [
            'COD_Sacrificio.required'=>'Debe introducir el código del sacrificio',
            'Descripcion.required'=>'Debe introducir la descripción',
            'ID_Veterinario.required'=>'Debe introducir el identificador del veterinario',
            'ID_Matarife.required'=>'Debe introducir el identificador del matarife',
            'ID_Animal.required'=>'Debe introducir el identificador del animal',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosSacrificio =request()->except('_token');
        Sacrificio::insert($datosSacrificio);
        return redirect('sacrificio')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Sacrificio $sacrificio)
    {
        //
    }

    public function edit($id)
    {
        $sacrificio =Sacrificio::findOrFail($id);
        return view('sacrificio.edit', compact('sacrificio'));
    }

    public function update(Request $request, $id)
    {
        $campos =
        [
            'COD_Sacrificio'=>'required|string|max:9',
            'Descripcion'=>'required|string|max:50',
            'ID_Veterinario'=>'required|string|max:9',
            'ID_Matarife'=>'required|string|max:9',
            'ID_Animal'=>'required|string|max:9',
        ];
        
        $mensaje =
        [
            'COD_Sacrificio.required'=>'Debe introducir el código del sacrificio',
            'Descripcion.required'=>'Debe introducir la descripción',
            'ID_Veterinario.required'=>'Debe introducir el identificador del veterinario',
            'ID_Matarife.required'=>'Debe introducir el identificador del matarife',
            'ID_Animal.required'=>'Debe introducir el identificador del animal',
        ];

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosSacrificio =request()->except(['_token','_method']); 
        Sacrificio::where('id','=',$id)->update($datosSacrificio);
        $sacrificio =Sacrificio::findOrFail($id);
        return redirect('sacrificio')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Sacrificio::destroy($id);
        return redirect('sacrificio')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
