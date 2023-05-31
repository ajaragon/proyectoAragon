<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use PDF;


class EmployeeController extends Controller
{
    public function index()
    {
        $datos['employees'] =Employee::paginate(10);
        return view('employee.index', $datos);
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            'ID_Employee'=>'required|string|max:9',
            'DNI'=>'required|string|max:9',
            'Nombre'=>'required|string|max:20',
            'Apellido1'=>'required|string|max:20',
            'Apellido2'=>'required|string|max:20',
            'Telefono'=>'required|string|max:9',
            'Correo_Electronico'=>'required|string|max:30',
            'Direccion'=>'required|string|max:50',
            'Provincia'=>'required|string|max:20',
        ];
        
        $mensaje =
        [
            'ID_Employee.required'=>'Debe introducir el identificador del employee',
            'DNI.required'=>'Debe introducir el DNI',
            'Nombre.required'=>'Debe introducir el nombre',
            'Apellido1.required'=>'Debe introducir el primer apellido',
            'Apellido2.required'=>'Debe introducir el segundo apellido',
            'Telefono.required'=>'Debe introducir el teléfono',
            'Correo_Electronico.required'=>'Debe introducir el correo electrónico',
            'Direccion.required'=>'Debe introducir la dirección',
            'Provincia.required'=>'Debe introducir la provincia',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosEmployee =request()->except('_token');
        Employee::insert($datosEmployee);
        return redirect('employee')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Employee $employee)
    {
        //
    }

    public function edit($id)
    {
        $employee =Employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
    
        $campos =
        [
            'ID_Employee'=>'required|string|max:9',
            'DNI'=>'required|string|max:9',
            'Nombre'=>'required|string|max:20',
            'Apellido1'=>'required|string|max:20',
            'Apellido2'=>'required|string|max:20',
            'Telefono'=>'required|string|max:9',
            'Correo_Electronico'=>'required|string|max:30',
            'Direccion'=>'required|string|max:50',
            'Provincia'=>'required|string|max:20',
        ];
        
        $mensaje =
        [
            'ID_Employee.required'=>'Debe introducir el identificador del employee',
            'DNI.required'=>'Debe introducir el DNI',
            'Nombre.required'=>'Debe introducir el nombre',
            'Apellido1.required'=>'Debe introducir el primer apellido',
            'Apellido2.required'=>'Debe introducir el segundo apellido',
            'Telefono.required'=>'Debe introducir el teléfono',
            'Correo_Electronico.required'=>'Debe introducir el correo electrónico',
            'Direccion.required'=>'Debe introducir la dirección',
            'Provincia.required'=>'Debe introducir la provincia',
        ];

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosEmployee =request()->except(['_token','_method']); 
        Employee::where('id','=',$id)->update($datosEmployee);
        $employee =Employee::findOrFail($id);
        return redirect('employee')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    public function search(Request $request){

        $busqueda =$request['search'] ?? " ";
        if($busqueda != " "){
            $employees =Employee::where('ID_Employee', 'LIKE', "%$busqueda%")->get();
        }//fin del if
        else{
            $employees =Employee::all();
        }//fin del else

        $datosEmployee =compact('employees');
        return view('employee.index', compact('employees', 'busqueda'));
    }
    
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect('employee')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }

    public function export()
    {
        //Mete todos los registros de la tabla en la variable $animals
        $employees = Employee::get();
        
        //Agrupa el título que se ve en el documento, la fecha de impresión
        //y todos los registros de la tabla
        $data =
        [
            'title' =>'REGISTROS DE LOS ANIMALES',
            'date' =>date('m/d/Y'),
            'employees' =>$employees, 
        ];
 
        //Carga la vista export junto con todos los datos de los registros de la tabla
        $pdf = PDF::loadView('employee.export', $data);
     
        //devuelve la descarga de la vista junto con los registros en un .pdf
        return $pdf->download('empleados.pdf');
    }
}
