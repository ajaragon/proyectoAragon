<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use PDF;

class AnimalController extends Controller
{
    public function index()
    {
        $datos['animals'] =Animal::paginate(10);
        return view('animal.index', $datos);
    }

    public function create()
    {
        return view('animal.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            'ID_Animal'=>'required|string|max:9',
            'NUM_Crotal'=>'required|string|max:5',
            'L_Engorde'=>'required|string|max:50',
            'L_Nacimiento'=>'required|string|max:50',
            'F_Nacimiento'=>'required|string|max:10',
            'L_Slaughter'=>'required|string|max:50',
            'F_Slaughter'=>'required|string|max:10',
            'ID_Especie'=>'required|string|max:1',
            'CIF'=>'required|string|max:9',
        ];
        
        $mensaje =
        [
            'ID_Animal.required'=>'Debe introducir el identificador del animal',
            'NUM_Crotal.required'=>'Debe introducir el número del crotal',
            'L_Engorde.required'=>'Debe introducir el lugar de engorde',
            'L_Nacimiento.required'=>'Debe introducir el lugar de nacimiento',
            'F_Nacimiento.required'=>'Debe introducir la fecha de nacimiento',
            'L_Slaughter.required'=>'Debe introducir el lugar de nacimiento',
            'F_Slaughter.required'=>'Debe introducir la fecha de slaughter',
            'ID_Especie.required'=>'Debe introducir el identificador de la especie',
            'CIF.required'=>'Debe introducir el CIF'
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosAnimal =request()->except('_token');
        Animal::insert($datosAnimal);
        return redirect('animal')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Animal $animal)
    {
        //
    }

    public function edit($id)
    {
        $animal =Animal::findOrFail($id);
        return view('animal.edit', compact('animal'));
    }

    public function update(Request $request, $id)
    {
    
        $campos =
        [
            'ID_Animal'=>'required|string|max:9',
            'NUM_Crotal'=>'required|string|max:5',
            'L_Engorde'=>'required|string|max:50',
            'L_Nacimiento'=>'required|string|max:50',
            'F_Nacimiento'=>'required|string|max:10',
            'L_Slaughter'=>'required|string|max:50',
            'F_Slaughter'=>'required|string|max:10',
            'ID_Especie'=>'required|string|max:1',
            'CIF'=>'required|string|max:9',
        ];
        
        $mensaje =
        [
            'ID_Animal.required'=>'Debe introducir el identificador del animal',
            'NUM_Crotal.required'=>'Debe introducir el número del crotal',
            'L_Engorde.required'=>'Debe introducir el lugar de engorde',
            'L_Nacimiento.required'=>'Debe introducir el lugar de nacimiento',
            'F_Nacimiento.required'=>'Debe introducir la fecha de nacimiento',
            'L_Slaughter.required'=>'Debe introducir el lugar de nacimiento',
            'F_Slaughter.required'=>'Debe introducir la fecha de slaughter',
            'ID_Especie.required'=>'Debe introducir el identificador de la especie',
            'CIF.required'=>'Debe introducir el CIF'
        ];

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosAnimal =request()->except(['_token','_method']); 
        Animal::where('id','=',$id)->update($datosAnimal);
        $animal =Animal::findOrFail($id);
        return redirect('animal')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    public function search(Request $request){

        $busqueda =$request['search'] ?? " ";
        if($busqueda != " "){
            $animals =Animal::where('ID_Animal', 'LIKE', "%$busqueda%")->get();
        }//fin del if
        else{
            $animals =Animal::all();
        }//fin del else

        //$datosAnimal =compact('animals');
        //return view('animal.index', $datosAnimal, compact('busqueda'));

        return view('animal.index', compact('animals', 'busqueda'));
    }

    public function destroy($id)
    {
        Animal::destroy($id);
        return redirect('animal')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }

    //Función para exportar tablas en .pdf
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function export()
    {
        $animals = Animal::get();
  
        $data =
        [
            'title' =>'REGISTROS DE LOS ANIMALES',
            'date' =>date('m/d/Y'),
            'animals' =>$animals, 
        ];
 
        $pdf = PDF::loadView('export', $data);
     
        return $pdf->download('animales.pdf');
    }
}
