<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $datos['inventories'] =Inventario::paginate(10);
        return view('inventario.index', $datos);
    }

    public function create()
    {
        return view('inventario.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            'COD_Inventario'=>'required|string|max:5',
            'COD_Pieza'=>'required|string|max:2',
            'NUM_Camara'=>'required|string|max:2',
            'COD_Sacrificio'=>'required|string|max:9',
            'ID_Empleado'=>'required|string|max:9',
        ];
        
        $mensaje =
        [
            'COD_Inventario.required'=>'Debe introducir el código del inventario',
            'COD_Pieza.required'=>'Debe introducir el código de pieza',
            'NUM_Camara.required'=>'Debe introducir el número de cámara',
            'COD_Sacrificio.required'=>'Debe introducir el sódigo de sacrificio',
            'ID_Empleado.required'=>'Debe introducir el identificador de empleado',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosInventario =request()->except('_token');
        Inventario::insert($datosInventario);
        return redirect('inventario')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Inventario $inventario)
    {
        //
    }

    public function edit($id)
    {
        $inventario =Inventario::findOrFail($id);
        return view('inventario.edit', compact('inventario'));
    }

    public function update(Request $request, $id)
    {
        $campos =
        [
            'COD_Inventario'=>'required|string|max:5',
            'Descripcion'=>'required|string|max:50',
            'NUM_Camara'=>'required|string|max:2',
            'COD_Sacrificio'=>'required|string|max:9',
            'COD_Pieza'=>'required|string|max:1',
            'ID_Empleado'=>'required|string|max:9',
        ];
        
        $mensaje =
        [
            'COD_Inventario.required'=>'Debe introducir el código del inventario',
            'Descripcion.required'=>'Debe introducir la descripción',
            'NUM_Camara.required'=>'Debe introducir el número de cámara',
            'COD_Sacrificio.required'=>'Debe introducir el sódigo de sacrificio',
            'COD_Pieza.required'=>'Debe introducir el código de pieza',
            'ID_Empleado.required'=>'Debe introducir el identificador de empleado',
        ];

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosInventario =request()->except(['_token','_method']); 
        Inventario::where('id','=',$id)->update($datosInventario);
        $inventario =Inventario::findOrFail($id);
        return redirect('inventario')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Inventario::destroy($id);
        return redirect('inventario')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
