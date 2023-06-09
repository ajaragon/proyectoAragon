<?php

namespace App\Http\Controllers;

use App\Models\Slaughter;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use PDF;

class SlaughterController extends Controller
{
    public function index()
    {
        $datos['slaughters'] =Slaughter::paginate(10);
        return view('slaughter.index', $datos);
    }

    public function create()
    {
        return view('slaughter.create');
    }

    public function store(Request $request)
    {
        $campos =
        [
            'COD_Slaughter'=>'required|string|max:9',
            'NUM_Colegiado'=>'required|string|max:9',
            'ID_Animal'=>'required|string|max:9',
            'ID_Employee'=>'required|string|max:9',
        ];
        
        $mensaje =
        [
            'COD_Slaughter.required'=>'Debe introducir el código del slaughter',
            'NUM_Colegiado.required'=>'Debe introducir el identificador del vet',
            'ID_Animal.required'=>'Debe introducir el identificador del animal',
            'ID_Employee.required'=>'Debe introducir el identificador del empleado',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosSlaughter =request()->except('_token');
        Slaughter::insert($datosSlaughter);
        return redirect('slaughter')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Slaughter $slaughter)
    {
        //
    }

    public function edit($id)
    {
        $slaughter =Slaughter::findOrFail($id);
        return view('slaughter.edit', compact('slaughter'));
    }

    public function update(Request $request, $id)
    {
        $campos =
        [
            'COD_Slaughter'=>'required|string|max:9',
            'NUM_Colegiado'=>'required|string|max:9',
            'ID_Animal'=>'required|string|max:9',
            'ID_Employee'=>'required|string|max:9',
        ];
        
        $mensaje =
        [
            'COD_Slaughter.required'=>'Debe introducir el código del slaughter',
            'NUM_Colegiado.required'=>'Debe introducir el identificador del vet',
            'ID_Animal.required'=>'Debe introducir el identificador del animal',
            'ID_Employee.required'=>'Debe introducir el identificador del empleado',
        ];

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosSlaughter =request()->except(['_token','_method']); 
        Slaughter::where('id','=',$id)->update($datosSlaughter);
        $slaughter =Slaughter::findOrFail($id);
        return redirect('slaughter')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    public function search(Request $request){

        $busqueda =$request['search'] ?? " ";
        if($busqueda != " "){
            $slaughters =Slaughter::where('COD_Slaughter', 'LIKE', "%$busqueda%")->get();
        }//fin del if
        else{
            $slaughters =Slaughter::all();
        }//fin del else

        $datosSlaughter =compact('slaughters');
        return view('slaughter.index', compact('slaughters', 'busqueda'));
    }

    public function destroy($id)
    {
        Slaughter::destroy($id);
        return redirect('slaughter')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }

    public function export()
    {
        //Mete todos los registros de la tabla en la variable $animals
        $slaughters = Slaughter::get();
        
        //Agrupa el título que se ve en el documento, la fecha de impresión
        //y todos los registros de la tabla
        $data =
        [
            'title' =>'REGISTROS DE LOS SACRIFICIOS',
            'date' =>date('m/d/Y'),
            'slaughters' =>$slaughters, 
        ];
 
        //Carga la vista export junto con todos los datos de los registros de la tabla
        $pdf = PDF::loadView('slaughter.export', $data);
     
        //devuelve la descarga de la vista junto con los registros en un .pdf
        return $pdf->download('sacrificios.pdf');
    }
}
