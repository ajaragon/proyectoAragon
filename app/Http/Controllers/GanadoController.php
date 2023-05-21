<?php

namespace App\Http\Controllers;

use App\Models\Ganado;
use Illuminate\Http\Request;

class GanadoController extends Controller
{
    public function index()
    {
        $datos['ganados'] =Ganado::paginate(10);
        return view('ganado.index', $datos);
    }

    public function create()
    {
        return view('ganado.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            'ID_ANIMAL'=>'required|string|max:9',
            'NUM_Crotal'=>'required|string|max:20',
            'L_Engorde'=>'required|string|max:50',
            'L_Nacimiento'=>'required|string|max:50',
            'F_Nacimiento'=>'required|string|max:10',
            'L_Sacrificio'=>'required|string|max:50',
            'F_Sacrificio'=>'required|string|max:10',
        ];

        $mensaje =
        [
            'ID_ANIMAL.required'=>'Debe introducir el identificador del animal',
            'NUM_Crotal.required'=>'Debe introducir el número del crotal',
            'L_Engorde.required'=>'Debe introducir el lugar de engorde',
            'L_Nacimiento.required'=>'Debe introducir el lugar de nacimiento',
            'F_Nacimiento.required'=>'Debe introducir la fecha de nacimiento',
            'L_Sacrificio.required'=>'Debe introducir el lugar de sacrificio',
            'F_Sacrificio.required'=>'Debe introducir la fecha de sacrifio',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosGanado =request()->except('_token');
        Ganado::insert($datosGanado);
        return redirect('ganado')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Ganado $ganado)
    {
        //
    }

    public function edit($id)
    {
        $ganado =Ganado::findOrFail($id);
        return view('ganado.edit', compact('ganado'));
    }

    public function update(Request $request, $id)
    {
    
        $campos =
        [
            'ID_ANIMAL'=>'required|string|max:9',
            'NUM_Crotal'=>'required|string|max:20',
            'L_Engorde'=>'required|string|max:50',
            'L_Nacimiento'=>'required|string|max:50',
            'F_Nacimiento'=>'required|string|max:10',
            'L_Sacrificio'=>'required|string|max:50',
            'F_Sacrificio'=>'required|string|max:10',
        ];

        $mensaje =
        [
            'ID_ANIMAL.required'=>'Debe introducir el identificador del animal',
            'NUM_Crotal.required'=>'Debe introducir el número del crotal',
            'L_Engorde.required'=>'Debe introducir el lugar de engorde',
            'L_Nacimiento.required'=>'Debe introducir el lugar de nacimiento',
            'F_Nacimiento.required'=>'Debe introducir la fecha de nacimiento',
            'L_Sacrificio.required'=>'Debe introducir el lugar de sacrificio',
            'F_Sacrificio.required'=>'Debe introducir la fecha de sacrifio',
        ];
        
        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosGanado =request()->except(['_token','_method']); 
        Ganado::where('id','=',$id)->update($datosGanado);
        $ganado =Ganado::findOrFail($id);
        return redirect('ganado')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Ganado::destroy($id);
        return redirect('ganado')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
