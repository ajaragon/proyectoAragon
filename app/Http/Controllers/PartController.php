<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use PDF;

class PartController extends Controller
{
    public function index()
    {
        $datos['parts'] =Part::paginate(10);
        return view('part.index', $datos);
    }

    public function create()
    {
        return view('part.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            'COD_Part'=>'required|string|max:2',
            'Descripcion'=>'required|string|max:50',
        ];
        
        $mensaje =
        [
            'COD_Part.required'=>'Debe introducir el código de la part',
            'Descripcion.required'=>'Debe introducir la descripción',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosPart =request()->except('_token');
        Part::insert($datosPart);
        return redirect('part')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Part $part)
    {
        //
    }

    public function edit($id)
    {
        $part =Part::findOrFail($id);
        return view('part.edit', compact('part'));
    }

    public function update(Request $request, $id)
    {
        $campos =
        [
            'COD_Part'=>'required|string|max:2',
            'Descripcion'=>'required|string|max:50',
        ];
        
        $mensaje =
        [
            'COD_Part.required'=>'Debe introducir el código de la part',
            'Descripcion.required'=>'Debe introducir la descripción',
        ];

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosPart =request()->except(['_token','_method']); 
        Part::where('id','=',$id)->update($datosPart);
        $part =Part::findOrFail($id);
        return redirect('part')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    public function search(Request $request){

        $busqueda =$request['search'] ?? " ";
        if($busqueda != " "){
            $parts =Part::where('COD_Part', 'LIKE', "%$busqueda%")->get();
        }//fin del if
        else{
            $parts =Part::all();
        }//fin del else

        $datosPart =compact('parts');
        return view('part.index', compact('parts', 'busqueda'));
    }

    public function destroy($id)
    {
        Part::destroy($id);
        return redirect('part')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }

    public function export()
    {
        //Mete todos los registros de la tabla en la variable $animals
        $parts =Part::get();
        
        //Agrupa el título que se ve en el documento, la fecha de impresión
        //y todos los registros de la tabla
        $data =
        [
            'title' =>'REGISTROS DE LOS ANIMALES',
            'date' =>date('m/d/Y'),
            'parts' =>$parts, 
        ];
 
        //Carga la vista export junto con todos los datos de los registros de la tabla
        $pdf = PDF::loadView('part.export', $data);
     
        //devuelve la descarga de la vista junto con los registros en un .pdf
        return $pdf->download('piezas.pdf');
    }
}
