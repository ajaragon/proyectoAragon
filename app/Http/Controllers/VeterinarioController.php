<?php

namespace App\Http\Controllers;

use App\Models\Veterinario;
use Illuminate\Http\Request;

class VeterinarioController extends Controller
{
    public function index()
    {
        $datos['veterinarios'] =Veterinario::paginate(10);
        return view('veterinario.index', $datos);
    }

    public function create()
    {
        return view('veterinario.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            'DNI'=>'required|string|max:9',
            'Nombre'=>'required|string|max:20',
            'Apellido1'=>'required|string|max:20',
            'Apellido2'=>'required|string|max:20',
            'Telefono'=>'required|string|max:9',
            'Calle'=>'required|string|max:30',
            'Localidad'=>'required|string|max:20',
            'Comarca'=>'required|string|max:20',
            'Provincia'=>'required|string|max:20',
        ];
        
        $mensaje =
        [
            'DNI.required'=>'Debe introducir el DNI',
            'Nombre.required'=>'Debe introducir el nombre',
            'Apellido1.required'=>'Debe introducir el primer apellido',
            'Apellido2.required'=>'Debe introducir el segundo apellido',
            'Telefono.required'=>'Debe introducir el teléfono',
            'Calle.required'=>'Debe introducir la calle',
            'Localidad.required'=>'Debe introducir la localidad',
            'Comarca.required'=>'Debe introducir la comarca',
            'Provincia.required'=>'Debe introducir la provincia',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosVeterinario =request()->except('_token');
        Veterinario::insert($datosVeterinario);
        return redirect('veterinario')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Veterinario $veterinario)
    {
        //
    }

    public function edit($id)
    {
        $veterinario =Veterinario::findOrFail($id);
        return view('veterinario.edit', compact('veterinario'));
    }

    public function update(Request $request, $id)
    {
    
        $campos =
        [
            'DNI'=>'required|string|max:9',
            'Nombre'=>'required|string|max:20',
            'Apellido1'=>'required|string|max:20',
            'Apellido2'=>'required|string|max:20',
            'Telefono'=>'required|string|max:9',
            'Calle'=>'required|string|max:30',
            'Localidad'=>'required|string|max:20',
            'Comarca'=>'required|string|max:20',
            'Provincia'=>'required|string|max:20',
        ];

        $mensaje =
        [
            'DNI.required'=>'Debe introducir el DNI',
            'Nombre.required'=>'Debe introducir el nombre',
            'Apellido1.required'=>'Debe introducir el primer apellido',
            'Apellido2.required'=>'Debe introducir el segundo apellido',
            'Telefono.required'=>'Debe introducir el teléfono',
            'Calle.required'=>'Debe introducir la calle',
            'Localidad.required'=>'Debe introducir la localidad',
            'Comarca.required'=>'Debe introducir la comarca',
            'Provincia.required'=>'Debe introducir la provincia',
        ];
        

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosVeterinario =request()->except(['_token','_method']); 
        Veterinario::where('id','=',$id)->update($datosVeterinario);
        $veterinario =Veterinario::findOrFail($id);
        return redirect('veterinario')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Veterinario::destroy($id);
        return redirect('veterinario')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
