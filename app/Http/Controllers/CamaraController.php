<?php

namespace App\Http\Controllers;

use App\Models\Camara;
use Illuminate\Http\Request;

class CamaraController extends Controller
{
    public function index()
    {
        $datos['camaras'] =Camara::paginate(10);
        return view('camara.index', $datos);
    }

    public function create()
    {
        return view('camara.create');
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

        $datosCamara =request()->except('_token');
        Camara::insert($datosCamara);
        return redirect('camara')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Camara $camara)
    {
        //
    }

    public function edit($id)
    {
        $camara =Camara::findOrFail($id);
        return view('camara.edit', compact('camara'));
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

        $datosCamara =request()->except(['_token','_method']); 
        Camara::where('id','=',$id)->update($datosCamara);
        $camara =Camara::findOrFail($id);
        return redirect('camara')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Camara::destroy($id);
        return redirect('camara')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
