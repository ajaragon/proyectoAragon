<?php

namespace App\Http\Controllers;

use App\Models\Livestock_farmer;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use PDF;

class Livestock_farmerController extends Controller
{
    /**
     * En este archivo se le da información al controlador, en este
     * caso de Livestock_farmer, de las vistas creadas
     */

     //Accede a la vista index
    public function index()
    {
        $datos['livestock_farmers'] =Livestock_farmer::paginate(10); //en la pantalla se mostrarán los datos de 10 livestock_farmers
        return view('livestock_farmer.index', $datos);
    }

    /**
     * Muestra la vista de la interfaz del formulario de creación de un livestock_farmer
     */
    public function create()
    {
        return view('livestock_farmer.create');
    }

    /**
     * Se encarga de recibir y almacenar la información de los formularios
     */
    public function store(Request $request)
    {

        //con el objetivo de evitar que de error a la hora de agregar un nuevo registro con algún campo en blanco
        //obligamos al usuario a introducir datos en ellos mediante el "required"
        $campos =
        [
            //'ID_Livestock_farmer'=>'required|string|max:9',
            'DNI'=>'required|string|max:9',
            'Nombre'=>'required|string|max:20',
            'Apellido1'=>'required|string|max:20',
            'Apellido2'=>'required|string|max:20',
            'Telefono'=>'required|string|max:9',
            'Correo_Electronico'=>'required|string|max:30',
            'Provincia'=>'required|string|max:20',
            'CIF'=>'required|string|max:9',
        ];

        //$mensaje =['required'=>'El :attribute es obligatorio'];

        
        $mensaje =
        [
            //'ID_Livestock_farmer.required'=>'Debe introducir el identificador',
            'DNI.required'=>'Debe introducir el DNI',
            'Nombre.required'=>'Debe introducir el nombre',
            'Apellido1.required'=>'Debe introducir el primer apellido',
            'Apellido2.required'=>'Debe introducir el segundo apellido',
            'Telefono.required'=>'Debe introducir el teléfono',
            'Correo_Electronico.required'=>'Debe introducir la calle',
            'Provincia.required'=>'Debe introducir la provincia',
            'CIF.required'=>'Debe introducir el CIF',
        ];
        
        $this->validate($request, $campos, $mensaje);

        //$datosLivestock_farmer =request()->all();             //todos los datos recibidos desde el formulario
        $datosLivestock_farmer =request()->except('_token');    //recibe todos los datos del registro excepto el token
        Livestock_farmer::insert($datosLivestock_farmer);               //a la base de datos le inserta todos los datos que recibe
        //return response()->json($datosLivestock_farmer);      //y los va a enviar en un archivo json
        //Se dice que redireccione hacia la vista livestock_farmer una vez introducidos los datos,
        //además, consecuentemente, se mostrará en pantalla la información 
        //de que se guardó un nuevo registro
        return redirect('livestock_farmer')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Livestock_farmer $livestock_farmer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $livestock_farmer =Livestock_farmer::findOrFail($id);               //guardamos en la variable livestock_farmer
                                                            //los datos del id que recibimos
        return view('livestock_farmer.edit', compact('livestock_farmer'));  //muestra la interfaz donde se pueden actualizar los campos de un registro
                                                            //y además la información obtenida anteriormente
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        //Validar la introducción de datos del formulario
        $campos =
        [
            //'ID_Livestock_farmer'=>'required|string|max:9',
            'DNI'=>'required|string|max:9',
            'Nombre'=>'required|string|max:20',
            'Apellido1'=>'required|string|max:20',
            'Apellido2'=>'required|string|max:20',
            'Telefono'=>'required|string|max:9',
            'Correo_Electronico'=>'required|string|max:30',
            'Provincia'=>'required|string|max:20',
            'CIF'=>'required|string|max:9',
        ];

        //$mensaje =['required'=>'El :attribute es obligatorio'];

        $mensaje =
        [
            //'ID_Livestock_farmer.required'=>'Debe introducir el identificador',
            'DNI.required'=>'Debe introducir el DNI',
            'Nombre.required'=>'Debe introducir el nombre',
            'Apellido1.required'=>'Debe introducir el primer apellido',
            'Apellido2.required'=>'Debe introducir el segundo apellido',
            'Telefono.required'=>'Debe introducir el teléfono',
            'Correo_Electronico.required'=>'Debe introducir la calle',
            'Provincia.required'=>'Debe introducir la provincia',
            'CIF.required'=>'Debe introducir el CIF',
        ];

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosLivestock_farmer =request()->except(['_token','_method']);    //Recibe todos los datos 
                                                                    //exceptuando el token y el método
        Livestock_farmer::where('id','=',$id)->update($datosLivestock_farmer);      //La actualización se llevará a cabo
                                                                    //en el elemento donde coincidan los id
        //Vuelve a recuperar los datos y mostrar los campos del registro con la información actualizada
        $livestock_farmer =Livestock_farmer::findOrFail($id);
        //return view('livestock_farmer.edit', compact('livestock_farmer'));
        return redirect('livestock_farmer')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    public function search(Request $request){

        $busqueda =$request['search'] ?? " ";
        if($busqueda != " "){
            $livestock_farmers =Livestock_farmer::where('DNI', 'LIKE', "%$busqueda%")->get();
        }//fin del if
        else{
            $livestock_farmers =Livestock_farmer::all();
        }//fin del else

        $datosLivestock_farmer =compact('livestock_farmers');
        return view('livestock_farmer.index', compact('livestock_farmers', 'busqueda'));
    }

    public function destroy($id)
    {
        Livestock_farmer::destroy($id);         //le paso el id del elemento que quiero que elimine
        //return redirect('livestock_farmer');  //vuelve a mostrar los registros de todos los livestock_farmers
        return redirect('livestock_farmer')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }

    public function export()
    {
        //Mete todos los registros de la tabla en la variable $animals
        $livestock_farmers = Livestock_farmer::get();
        
        //Agrupa el título que se ve en el documento, la fecha de impresión
        //y todos los registros de la tabla
        $data =
        [
            'title' =>'REGISTROS DE LOS GANADEROS',
            'date' =>date('m/d/Y'),
            'livestock_farmers' =>$livestock_farmers, 
        ];
 
        //Carga la vista export junto con todos los datos de los registros de la tabla
        $pdf = PDF::loadView('livestock_farmer.export', $data);
     
        //devuelve la descarga de la vista junto con los registros en un .pdf
        return $pdf->download('ganaderos.pdf');
    }
}
