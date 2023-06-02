<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use PDF;

class FarmController extends Controller
{
    public function index()
    {
        $datos['farms'] =Farm::paginate(10);
        return view('farm.index', $datos);
    }

    public function create()
    {
        return view('farm.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            'CIF'=>'required|string|max:9',
            'Nombre_Farm'=>'required|string|max:20',
            'Titular'=>'required|string|max:50',
            'Telefono'=>'required|string|max:9',
            'Correo_Electronico'=>'required|string|max:30',
            'Direccion'=>'required|string|max:50',
            'Comarca'=>'required|string|max:20',
            'Provincia'=>'required|string|max:20',
            'CP'=>'required|string|max:5',
        ];
        
        $mensaje =
        [
            'CIF.required'=>'Debe introducir el CIF',
            'Nombre_Farm.required'=>'Debe introducir el nombre de la explotación',
            'Titular.required'=>'Debe introducir el titular de la explotación',
            'Telefono.required'=>'Debe introducir el teléfono',
            'Correo_Electronico.required'=>'Debe introducir el correo electrónico',
            'Direccion.required'=>'Debe introducir la dirección',
            'Comarca.required'=>'Debe introducir la comarca',
            'Provincia.required'=>'Debe introducir la provincia',
            'CP.required'=>'Debe introducir el código postal',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosFarm =request()->except('_token');
        Farm::insert($datosFarm);
        return redirect('farm')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Farm $farm)
    {
        //
    }

    public function edit($id)
    {
        $farm =Farm::findOrFail($id);
        return view('farm.edit', compact('farm'));
    }

    public function update(Request $request, $id)
    {
    
        $campos =
        [
            'CIF'=>'required|string|max:9',
            'Nombre_Farm'=>'required|string|max:20',
            'Titular'=>'required|string|max:50',
            'Telefono'=>'required|string|max:9',
            'Correo_Electronico'=>'required|string|max:30',
            'Direccion'=>'required|string|max:50',
            'Comarca'=>'required|string|max:20',
            'Provincia'=>'required|string|max:20',
            'CP'=>'required|string|max:5',
        ];
        
        $mensaje =
        [
            'CIF.required'=>'Debe introducir el CIF',
            'Nombre_Farm.required'=>'Debe introducir el nombre de la explotación',
            'Titular.required'=>'Debe introducir el titular de la explotación',
            'Telefono.required'=>'Debe introducir el teléfono',
            'Correo_Electronico.required'=>'Debe introducir el correo electrónico',
            'Direccion.required'=>'Debe introducir la dirección',
            'Comarca.required'=>'Debe introducir la comarca',
            'Provincia.required'=>'Debe introducir la provincia',
            'CP.required'=>'Debe introducir el código postal',
        ];
        
        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosFarm =request()->except(['_token','_method']); 
        Farm::where('id','=',$id)->update($datosFarm);
        $farm =Farm::findOrFail($id);
        return redirect('farm')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    public function search(Request $request){

        $busqueda =$request['search'] ?? " ";
        if($busqueda != " "){
            $farms =Farm::where('CIF', 'LIKE', "%$busqueda%")->get();
        }//fin del if
        else{
            $farms =Farm::all();
        }//fin del else

        $datosFarm =compact('farms');
        return view('farm.index', compact('farms', 'busqueda'));
    }

    public function destroy($id)
    {
        Farm::destroy($id);
        return redirect('farm')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }

    public function export()
    {
        //Mete todos los registros de la tabla en la variable $animals
        $farms = Farm::get();
        
        //Agrupa el título que se ve en el documento, la fecha de impresión
        //y todos los registros de la tabla
        $data =
        [
            'title' =>'REGISTROS DE LAS EXPLOTACIONES GANADERAS',
            'date' =>date('m/d/Y'),
            'farms' =>$farms, 
        ];
 
        //Carga la vista export junto con todos los datos de los registros de la tabla
        $pdf = PDF::loadView('farm.export', $data);
     
        //devuelve la descarga de la vista junto con los registros en un .pdf
        return $pdf->download('explotaciones.pdf');
    }
}
