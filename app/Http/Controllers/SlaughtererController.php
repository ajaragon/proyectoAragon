<?php

namespace App\Http\Controllers;

use App\Models\Slaughterer;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use PDF;

class SlaughtererController extends Controller
{
    public function index()
    {
        $datos['slaughterers'] =Slaughterer::paginate(10);
        return view('slaughterer.index', $datos);
    }

    public function create()
    {
        return view('slaughterer.create');
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
            'Correo_Electronico'=>'required|string|max:30',
            'Provincia'=>'required|string|max:20',
        ];
        
        $mensaje =
        [
            'DNI.required'=>'Debe introducir el DNI',
            'Nombre.required'=>'Debe introducir el nombre',
            'Apellido1.required'=>'Debe introducir el primer apellido',
            'Apellido2.required'=>'Debe introducir el segundo apellido',
            'Telefono.required'=>'Debe introducir el teléfono',
            'Correo_Electronico.required'=>'Debe introducir el correo electrónico',
            'Provincia.required'=>'Debe introducir la provincia',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosSlaughterer =request()->except('_token');
        Slaughterer::insert($datosSlaughterer);
        return redirect('slaughterer')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Slaughterer $slaughterer)
    {
        //
    }

    public function edit($id)
    {
        $slaughterer =Slaughterer::findOrFail($id);
        return view('slaughterer.edit', compact('slaughterer'));
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
            'Correo_Electronico'=>'required|string|max:30',
            'Provincia'=>'required|string|max:20',
        ];
        
        $mensaje =
        [
            'DNI.required'=>'Debe introducir el DNI',
            'Nombre.required'=>'Debe introducir el nombre',
            'Apellido1.required'=>'Debe introducir el primer apellido',
            'Apellido2.required'=>'Debe introducir el segundo apellido',
            'Telefono.required'=>'Debe introducir el teléfono',
            'Correo_Electronico.required'=>'Debe introducir el correo electrónico',
            'Provincia.required'=>'Debe introducir la provincia',
        ];
        
        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosSlaughterer =request()->except(['_token','_method']); 
        Slaughterer::where('id','=',$id)->update($datosSlaughterer);
        $slaughterer =Slaughterer::findOrFail($id);
        return redirect('slaughterer')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    public function search(Request $request){

        $busqueda =$request['search'] ?? " ";
        if($busqueda != " "){
            $slaughterers =Slaughterer::where('DNI', 'LIKE', "%$busqueda%")->get();
        }//fin del if
        else{
            $slaughterers =Slaughterer::all();
        }//fin del else

        $datosSlaughterer =compact('slaughterers');
        return view('slaughterer.index', compact('slaughterers', 'busqueda'));
    }

    public function destroy($id)
    {
        Slaughterer::destroy($id);
        return redirect('slaughterer')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }

    public function export()
    {
       
        $slaughterers = Slaughterer::get();
        
        $data =
        [
            'title' =>'REGISTROS DE LOS MATARIFES',
            'date' =>date('m/d/Y'),
            'slaughterers' =>$slaughterers, 
        ];
 
        $pdf = PDF::loadView('slaughterer.export', $data);
     
        return $pdf->download('matarifes.pdf');
    }
}
