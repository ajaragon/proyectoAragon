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
            'Numero_Camara'=>'required|string|max:2',
            'Capacidad'=>'required|string|max:3',
            'Temperatura_Media'=>'required|string|max:2'
        ];
        
        $mensaje =
        [
            'Numero_Camara.required'=>'Debe introducir el número de la cámara frigorífica',
            'Capacidad.required'=>'Debe introducir la capacidad de la cámara',
            'Temperatura_Media.required'=>'Debe introducir la temperatura media',

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
            'Numero_Camara'=>'required|string|max:2',
            'Capacidad'=>'required|string|max:3',
            'Temperatura_Media'=>'required|string|max:2'
        ];
        
        $mensaje =
        [
            'Numero_Camara.required'=>'Debe introducir el número de la cámara frigorífica',
            'Capacidad.required'=>'Debe introducir la capacidad de la cámara',
            'Temperatura_Media.required'=>'Debe introducir la temperatura media',

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
