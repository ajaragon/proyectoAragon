<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index()
    {
        $datos['administradores'] =Administrador::paginate(10);
        return view('administrador.index', $datos);
    }

    public function create()
    {
        return view('administrador.create');
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

        $datosAdministrador =request()->except('_token');
        Administrador::insert($datosAdministrador);
        return redirect('administrador')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Administrador $administrador)
    {
        //
    }

    public function edit($id)
    {
        $administrador =Administrador::findOrFail($id);
        return view('administrador.edit', compact('administrador'));
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

        $datosAdministrador =request()->except(['_token','_method']); 
        Administrador::where('id','=',$id)->update($datosAdministrador);
        $administrador =Administrador::findOrFail($id);
        return redirect('administrador')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Administrador::destroy($id);
        return redirect('administrador')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
