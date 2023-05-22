<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $datos['animals'] =Animal::paginate(10);
        return view('animal.index', $datos);
    }

    public function create()
    {
        return view('animal.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            'ID_Animal'=>'required|string|max:9',
            'NUM_Crotal'=>'required|string|max:5',
            'L_Engorde'=>'required|string|max:50',
            'L_Nacimiento'=>'required|string|max:50',
            'F_Nacimiento'=>'required|string|max:10',
            'L_Sacrificio'=>'required|string|max:50',
            'F_Sacrificio'=>'required|string|max:10',
            'ID_Matarife'=>'required|string|max:9',
            'ID_Especie'=>'required|string|max:1',
        ];
        
        $mensaje =
        [
            'ID_Animal.required'=>'Debe introducir el identificador del animal',
            'NUM_Crotal.required'=>'Debe introducir el número del crotal',
            'L_Engorde.required'=>'Debe introducir el lugar de engorde',
            'L_Nacimiento.required'=>'Debe introducir el lugar de nacimiento',
            'F_Nacimiento.required'=>'Debe introducir la fecha de nacimiento',
            'L_Sacrificio.required'=>'Debe introducir el lugar de nacimiento',
            'F_Sacrificio.required'=>'Debe introducir la fecha de sacrificio',
            'ID_Matarife.required'=>'Debe introducir el identificador del matarife',
            'ID_Especie.required'=>'Debe introducir el identificador de la especie'
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosAnimal =request()->except('_token');
        Animal::insert($datosAnimal);
        return redirect('animal')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Animal $animal)
    {
        //
    }

    public function edit($id)
    {
        $animal =Animal::findOrFail($id);
        return view('animal.edit', compact('animal'));
    }

    public function update(Request $request, $id)
    {
    
        $campos =
        [
            'ID_Animal'=>'required|string|max:9',
            'NUM_Crotal'=>'required|string|max:5',
            'L_Engorde'=>'required|string|max:50',
            'L_Nacimiento'=>'required|string|max:50',
            'F_Nacimiento'=>'required|string|max:10',
            'L_Sacrificio'=>'required|string|max:50',
            'F_Sacrificio'=>'required|string|max:10',
            'ID_Matarife'=>'required|string|max:9',
            'ID_Especie'=>'required|string|max:1',
        ];
        
        $mensaje =
        [
            'ID_Animal.required'=>'Debe introducir el identificador del animal',
            'NUM_Crotal.required'=>'Debe introducir el número del crotal',
            'L_Engorde.required'=>'Debe introducir el lugar de engorde',
            'L_Nacimiento.required'=>'Debe introducir el lugar de nacimiento',
            'F_Nacimiento.required'=>'Debe introducir la fecha de nacimiento',
            'L_Sacrificio.required'=>'Debe introducir el lugar de nacimiento',
            'F_Sacrificio.required'=>'Debe introducir la fecha de sacrificio',
            'ID_Matarife.required'=>'Debe introducir el identificador del matarife',
            'ID_Especie.required'=>'Debe introducir el identificador de la especie'
        ];

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosAnimal =request()->except(['_token','_method']); 
        Animal::where('id','=',$id)->update($datosAnimal);
        $animal =Animal::findOrFail($id);
        return redirect('animal')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Animal::destroy($id);
        return redirect('animal')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
