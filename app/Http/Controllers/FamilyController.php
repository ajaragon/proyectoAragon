<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use PDF;


class FamilyController extends Controller
{
    public function index()
    {
        $datos['families'] =Family::paginate(10);
        return view('family.index', $datos);
    }

    public function create()
    {
        return view('family.create');
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

        $datosFamily =request()->except('_token');
        Family::insert($datosFamily);
        return redirect('family')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Family $family)
    {
        //
    }

    public function edit($id)
    {
        $family =Family::findOrFail($id);
        return view('family.edit', compact('family'));
    }

    public function update(Request $request, $id)
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

        //----------------------------------------------------------------------------------------------------\\

        $datosFamily =request()->except(['_token','_method']); 
        Family::where('id','=',$id)->update($datosFamily);
        $family =Family::findOrFail($id);
        return redirect('family')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    public function search(Request $request){

        $busqueda =$request['search'] ?? " ";
        if($busqueda != " "){
            $families =Family::where('ID_Especie', 'LIKE', "%$busqueda%")->get();
        }//fin del if
        else{
            $families =Family::all();
        }//fin del else

        $datosFamily =compact('families');
        return view('family.index', compact('families', 'busqueda'));
    }

    public function destroy($id)
    {
        Family::destroy($id);
        return redirect('family')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }

    public function export()
    {
        //Mete todos los registros de la tabla en la variable $animals
        $families = Family::get();
        
        //Agrupa el título que se ve en el documento, la fecha de impresión
        //y todos los registros de la tabla
        $data =
        [
            'title' =>'REGISTROS DE LOS ANIMALES',
            'date' =>date('m/d/Y'),
            'families' =>$families, 
        ];
 
        //Carga la vista export junto con todos los datos de los registros de la tabla
        $pdf = PDF::loadView('family.export', $data);
     
        //devuelve la descarga de la vista junto con los registros en un .pdf
        return $pdf->download('familias.pdf');
    }
}
