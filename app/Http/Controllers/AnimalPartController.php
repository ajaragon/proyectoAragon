<?php

namespace App\Http\Controllers;

use App\Models\AnimalPart;
use Illuminate\Http\Request;

class AnimalPartController extends Controller
{
    public function index()
    {
        $datos['animal_parts'] =Animal_Part::paginate(10);
        return view('animal_part.index', $datos);
    }

    public function create()
    {
        return view('animal_part.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            'ID_Animal'=>'required|string|max:9',
            'COD_Part'=>'required|string|max:2',
        ];
        
        $mensaje =
        [
            'ID_Animal.required'=>'Debe introducir el identificador del animal_part',
            'COD_Part.required'=>'Debe introducir el código de la part',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosAnimal_Part =request()->except('_token');
        Animal_Part::insert($datosAnimal_Part);
        return redirect('animal_part_part')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Animal_Part $animal_part)
    {
        //
    }

    public function edit($id)
    {
        $animal_part =Animal_Part::findOrFail($id);
        return view('animal_part.edit', compact('animal_part'));
    }

    public function update(Request $request, $id)
    {
        $campos =
        [
            'ID_Animal'=>'required|string|max:9',
            'COD_Part'=>'required|string|max:2',
        ];
        
        $mensaje =
        [
            'ID_Animal.required'=>'Debe introducir el identificador del animal_part',
            'COD_Part.required'=>'Debe introducir el código de la part',
        ];

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosAnimal_Part =request()->except(['_token','_method']); 
        Animal_Part::where('id','=',$id)->update($datosAnimal_Part);
        $animal_part =Animal_Part::findOrFail($id);
        return redirect('animal_part')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Animal_Part::destroy($id);
        return redirect('animal_part')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
