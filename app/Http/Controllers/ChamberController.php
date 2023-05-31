<?php

namespace App\Http\Controllers;

use App\Models\chamber;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use PDF;

class chamberController extends Controller
{
    public function index()
    {
        $datos['chambers'] =Chamber::paginate(10);
        return view('chamber.index', $datos);
    }

    public function create()
    {
        return view('chamber.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            'NUM_Chamber'=>'required|string|max:2',
            'Capacidad'=>'required|string|max:3',
            'COD_Slaughter'=>'required|string|max:2',
        ];
        
        $mensaje =
        [
            'NUM_chamber.required'=>'Debe introducir el número de la cámara frigorífica',
            'Capacidad.required'=>'Debe introducir la capacidad de la cámara',
            'COD_Slaughter.required'=>'Debe introducir el código del sacrificio',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosChamber =request()->except('_token');
        Chamber::insert($datosChamber);
        return redirect('chamber')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Chamber $chamber)
    {
        //
    }

    public function edit($id)
    {
        $chamber =Chamber::findOrFail($id);
        return view('chamber.edit', compact('chamber'));
    }

    public function update(Request $request, $id)
    {
    
        $campos =
        [
            'NUM_Chamber'=>'required|string|max:2',
            'Capacidad'=>'required|string|max:3',
            'COD_Slaughter'=>'required|string|max:2',
        ];
        
        $mensaje =
        [
            'NUM_Chamber.required'=>'Debe introducir el número de la cámara frigorífica',
            'Capacidad.required'=>'Debe introducir la capacidad de la cámara',
            'COD_Slaughter.required'=>'Debe introducir el código del sacrificio',
        ];
        

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosChamber =request()->except(['_token','_method']); 
        Chamber::where('id','=',$id)->update($datosChamber);
        $chamber =Chamber::findOrFail($id);
        return redirect('chamber')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    public function search(Request $request){

        $busqueda =$request['search'] ?? " ";
        if($busqueda != " "){
            $chambers =Chamber::where('NUM_chamber', 'LIKE', "%$busqueda%")->get();
        }//fin del if
        else{
            $chambers =Chamber::all();
        }//fin del else

        $datosChamber =compact('chambers');
        return view('chamber.index', compact('chambers', 'busqueda'));
    }

    public function destroy($id)
    {
        Chamber::destroy($id);
        return redirect('chamber')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }

    public function export()
    {
        //Mete todos los registros de la tabla en la variable $animals
        $chambers = Chamber::get();
        
        //Agrupa el título que se ve en el documento, la fecha de impresión
        //y todos los registros de la tabla
        $data =
        [
            'title' =>'REGISTROS DE LOS ANIMALES',
            'date' =>date('m/d/Y'),
            'chambers' =>$chambers, 
        ];
 
        //Carga la vista export junto con todos los datos de los registros de la tabla
        $pdf = PDF::loadView('chamber.export', $data);
     
        //devuelve la descarga de la vista junto con los registros en un .pdf
        return $pdf->download('camaras.pdf');
    }
}
