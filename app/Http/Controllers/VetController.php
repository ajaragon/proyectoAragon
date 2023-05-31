<?php

namespace App\Http\Controllers;

use App\Models\Vet;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use PDF;

class VetController extends Controller
{
    public function index()
    {
        $datos['vets'] =Vet::paginate(10);
        return view('vet.index', $datos);
    }

    public function create()
    {
        return view('vet.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            'NUM_Colegiado'=>'required|string|max:9',
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
            'NUM_Colegiado.required'=>'Debe introducir el número de colegiado',
            'DNI.required'=>'Debe introducir el DNI',
            'Nombre.required'=>'Debe introducir el nombre',
            'Apellido1.required'=>'Debe introducir el primer apellido',
            'Apellido2.required'=>'Debe introducir el segundo apellido',
            'Telefono.required'=>'Debe introducir el teléfono',
            'Correo_Electronico.required'=>'Debe introducir el correo electrónico',
            'Provincia.required'=>'Debe introducir la provincia',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosVet =request()->except('_token');
        Vet::insert($datosVet);
        return redirect('vet')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Vet $vet)
    {
        //
    }

    public function edit($id)
    {
        $vet =Vet::findOrFail($id);
        return view('vet.edit', compact('vet'));
    }

    public function update(Request $request, $id)
    {
    
        $campos =
        [
            'NUM_Colegiado'=>'required|string|max:9',
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
            'NUM_Colegiado.required'=>'Debe introducir el número de colegiado',
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

        $datosVet =request()->except(['_token','_method']); 
        Vet::where('id','=',$id)->update($datosVet);
        $vet =Vet::findOrFail($id);
        return redirect('vet')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    public function search(Request $request){

        $busqueda =$request['search'] ?? " ";
        if($busqueda != " "){
            $vets =Vet::where('NUM_Colegiado', 'LIKE', "%$busqueda%")->get();
        }//fin del if
        else{
            $vets =Vet::all();
        }//fin del else

        $datosVet =compact('vets');
        return view('vet.index', compact('vets', 'busqueda'));
    }

    public function destroy($id)
    {
        Vet::destroy($id);
        return redirect('vet')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }

    public function export()
    {
       
        $vets = Vet::get();
        
        $data =
        [
            'title' =>'REGISTROS DE LOS ANIMALES',
            'date' =>date('m/d/Y'),
            'vets' =>$vets, 
        ];
 
        $pdf = PDF::loadView('vet.export', $data);
     
        return $pdf->download('veterinarios.pdf');
    }
}
