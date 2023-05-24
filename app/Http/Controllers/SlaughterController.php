<?php

namespace App\Http\Controllers;

use App\Models\Slaughter;
use Illuminate\Http\Request;

class SlaughterController extends Controller
{
    public function index()
    {
        $datos['slaughters'] =Slaughter::paginate(10);
        return view('slaughter.index', $datos);
    }

    public function create()
    {
        return view('slaughter.create');
    }

    public function store(Request $request)
    {
        $campos =
        [
            'COD_Slaughter'=>'required|string|max:9',
            'Descripcion'=>'required|string|max:50',
            'NUM_Colegiado'=>'required|string|max:9',
            'ID_Animal'=>'required|string|max:9',
            'ID_Employee'=>'required|string|max:9',
        ];
        
        $mensaje =
        [
            'COD_Slaughter.required'=>'Debe introducir el código del slaughter',
            'Descripcion.required'=>'Debe introducir la descripción',
            'NUM_Colegiado.required'=>'Debe introducir el identificador del vet',
            'ID_Animal.required'=>'Debe introducir el identificador del animal',
            'ID_Employee.required'=>'Debe introducir el identificador del empleado',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosSlaughter =request()->except('_token');
        Slaughter::insert($datosSlaughter);
        return redirect('slaughter')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Slaughter $slaughter)
    {
        //
    }

    public function edit($id)
    {
        $slaughter =Slaughter::findOrFail($id);
        return view('slaughter.edit', compact('slaughter'));
    }

    public function update(Request $request, $id)
    {
        $campos =
        [
            'COD_Slaughter'=>'required|string|max:9',
            'Descripcion'=>'required|string|max:50',
            'NUM_Colegiado'=>'required|string|max:9',
            'ID_Animal'=>'required|string|max:9',
            'ID_Employee'=>'required|string|max:9',
        ];
        
        $mensaje =
        [
            'COD_Slaughter.required'=>'Debe introducir el código del slaughter',
            'Descripcion.required'=>'Debe introducir la descripción',
            'NUM_Colegiado.required'=>'Debe introducir el identificador del vet',
            'ID_Animal.required'=>'Debe introducir el identificador del animal',
            'ID_Employee.required'=>'Debe introducir el identificador del empleado',
        ];

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosSlaughter =request()->except(['_token','_method']); 
        Slaughter::where('id','=',$id)->update($datosSlaughter);
        $slaughter =Slaughter::findOrFail($id);
        return redirect('slaughter')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Slaughter::destroy($id);
        return redirect('slaughter')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
