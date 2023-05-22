<?php

namespace App\Http\Controllers;

use App\Models\Familia;
use Illuminate\Http\Request;

class FamiliaController extends Controller
{
    public function index()
    {
        $datos['families'] =Familia::paginate(10);
        return view('familia.index', $datos);
    }

    public function create()
    {
        return view('familia.create');
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

        $datosFamilia =request()->except('_token');
        Familia::insert($datosFamilia);
        return redirect('familia')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Familia $familia)
    {
        //
    }

    public function edit($id)
    {
        $familia =Familia::findOrFail($id);
        return view('familia.edit', compact('familia'));
    }

    public function update(Request $request, $id)
    {
    
        $campos =
        [
            'ID_Empleado'=>'required|string|max:9',
            'DNI'=>'required|string|max:9',
            'Nombre'=>'required|string|max:20',
            'Apellido1'=>'required|string|max:20',
            'Apellido2'=>'required|string|max:20',
            'Telefono'=>'required|string|max:9',
            'Correo_Electronico'=>'required|string|max:30',
            'Direccion'=>'required|string|max:50',
            'Provincia'=>'required|string|max:20',
        ];
        
        $mensaje =
        [
            'ID_Empleado.required'=>'Debe introducir el identificador del animal',
            'DNI.required'=>'Debe introducir el número del crotal',
            'Nombre.required'=>'Debe introducir el lugar de engorde',
            'Apellido1.required'=>'Debe introducir el lugar de nacimiento',
            'Apellido2.required'=>'Debe introducir la fecha de nacimiento',
            'Telefono.required'=>'Debe introducir el lugar de nacimiento',
            'Correo_Electronico.required'=>'Debe introducir la fecha de sacrificio',
            'Direccion.required'=>'Debe introducir el identificador del matarife',
            'Provincia.required'=>'Debe introducir el identificador de la especie'
        ];

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosFamilia =request()->except(['_token','_method']); 
        Familia::where('id','=',$id)->update($datosFamilia);
        $familia =Familia::findOrFail($id);
        return redirect('familia')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Familia::destroy($id);
        return redirect('familia')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
