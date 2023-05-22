<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use Illuminate\Http\Request;

class PiezaController extends Controller
{
    public function index()
    {
        $datos['parts'] =Pieza::paginate(10);
        return view('pieza.index', $datos);
    }

    public function create()
    {
        return view('pieza.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            'COD_Pieza'=>'required|string|max:2',
            'Descripcion'=>'required|string|max:50',
            'NUM_Camara'=>'required|string|max:2',
            'COD_Sacrificio'=>'required|string|max:9',
            'ID_Animal'=>'required|string|max:9',
        ];
        
        $mensaje =
        [
            'COD_Pieza.required'=>'Debe introducir el código de la pieza',
            'Descripcion.required'=>'Debe introducir la descripción',
            'NUM_Camara.required'=>'Debe introducir el número de cámara',
            'COD_Sacrificio.required'=>'Debe introducir el sódigo de sacrificio',
            'ID_Animal.required'=>'Debe introducir el identificador del animal',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosPieza =request()->except('_token');
        Pieza::insert($datosPieza);
        return redirect('pieza')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Pieza $pieza)
    {
        //
    }

    public function edit($id)
    {
        $pieza =Pieza::findOrFail($id);
        return view('pieza.edit', compact('pieza'));
    }

    public function update(Request $request, $id)
    {
        $campos =
        [
            'COD_Pieza'=>'required|string|max:2',
            'Descripcion'=>'required|string|max:50',
            'NUM_Camara'=>'required|string|max:2',
            'COD_Sacrificio'=>'required|string|max:9',
            'ID_Animal'=>'required|string|max:9',
        ];
        
        $mensaje =
        [
            'COD_Pieza.required'=>'Debe introducir el código de la pieza',
            'Descripcion.required'=>'Debe introducir la descripción',
            'NUM_Camara.required'=>'Debe introducir el número de cámara',
            'COD_Sacrificio.required'=>'Debe introducir el sódigo de sacrificio',
            'ID_Animal.required'=>'Debe introducir el identificador del animal',
        ];

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosPieza =request()->except(['_token','_method']); 
        Pieza::where('id','=',$id)->update($datosPieza);
        $pieza =Pieza::findOrFail($id);
        return redirect('pieza')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pieza::destroy($id);
        return redirect('pieza')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
