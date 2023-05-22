<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $datos['employees'] =Empleado::paginate(10);
        return view('empleado.index', $datos);
    }

    public function create()
    {
        return view('empleado.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            //'ID_Empleado'=>'required|string|max:9',
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
            //'ID_Empleado.required'=>'Debe introducir el identificador del empleado',
            'DNI.required'=>'Debe introducir el DNI',
            'Nombre.required'=>'Debe introducir el nombre',
            'Apellido1.required'=>'Debe introducir el primer apellido',
            'Apellido2.required'=>'Debe introducir el segundo apellido',
            'Telefono.required'=>'Debe introducir el teléfono',
            'Correo_Electronico.required'=>'Debe introducir el correo electrónico',
            'Direccion.required'=>'Debe introducir la dirección',
            'Provincia.required'=>'Debe introducir la provincia'
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosEmpleado =request()->except('_token');
        Empleado::insert($datosEmpleado);
        return redirect('empleado')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Empleado $empleado)
    {
        //
    }

    public function edit($id)
    {
        $empleado =Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    public function update(Request $request, $id)
    {
    
        $campos =
        [
            //'ID_Empleado'=>'required|string|max:9',
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
            //'ID_Empleado.required'=>'Debe introducir el identificador del empleado',
            'DNI.required'=>'Debe introducir el DNI',
            'Nombre.required'=>'Debe introducir el nombre',
            'Apellido1.required'=>'Debe introducir el primer apellido',
            'Apellido2.required'=>'Debe introducir el segundo apellido',
            'Telefono.required'=>'Debe introducir el teléfono',
            'Correo_Electronico.required'=>'Debe introducir el correo electrónico',
            'Direccion.required'=>'Debe introducir la dirección',
            'Provincia.required'=>'Debe introducir la provincia'
        ];

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosEmpleado =request()->except(['_token','_method']); 
        Empleado::where('id','=',$id)->update($datosEmpleado);
        $empleado =Empleado::findOrFail($id);
        return redirect('empleado')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Empleado::destroy($id);
        return redirect('empleado')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
