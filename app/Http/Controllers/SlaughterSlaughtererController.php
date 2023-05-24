<?php

namespace App\Http\Controllers;

use App\Models\SlaughterSlaughterer;
use Illuminate\Http\Request;

class SlaughterSlaughtererController extends Controller
{
    public function index()
    {
        $datos['slaughter_slaughterers'] =Slaughter_Slaughterer::paginate(10);
        return view('slaughter_slaughterer.index', $datos);
    }

    public function create()
    {
        return view('slaughter_slaughterer.create');
    }

    public function store(Request $request)
    {

        $campos =
        [
            'DNI'=>'required|string|max:9',
            'COD_Slaughter'=>'required|string|max:9',
        ];
        
        $mensaje =
        [
            'DNI.required'=>'Debe introducir el DNI',
            'COD_Slaughter.required'=>'Debe introducir el código del slaughter',
        ];
        
        $this->validate($request, $campos, $mensaje);

        $datosSlaughter_Slaughterer =request()->except('_token');
        Slaughter_Slaughterer::insert($datosSlaughter_Slaughterer);
        return redirect('slaughter_slaughterer_part')->with('mensaje','Se añadió un registro a la base de datos.');
        
    }

    public function show(Slaughter_Slaughterer $slaughter_slaughterer)
    {
        //
    }

    public function edit($id)
    {
        $slaughter_slaughterer =Slaughter_Slaughterer::findOrFail($id);
        return view('slaughter_slaughterer.edit', compact('slaughter_slaughterer'));
    }

    public function update(Request $request, $id)
    {
        $campos =
        [
            'DNI'=>'required|string|max:9',
            'COD_Slaughter'=>'required|string|max:9',
        ];
        
        $mensaje =
        [
            'DNI.required'=>'Debe introducir el DNI',
            'COD_Slaughter.required'=>'Debe introducir el código del slaughter',
        ];

        $this->validate($request, $campos, $mensaje);

        //----------------------------------------------------------------------------------------------------\\

        $datosSlaughter_Slaughterer =request()->except(['_token','_method']); 
        Slaughter_Slaughterer::where('id','=',$id)->update($datosSlaughter_Slaughterer);
        $slaughter_slaughterer =Slaughter_Slaughterer::findOrFail($id);
        return redirect('slaughter_slaughterer')->with('mensaje','Se actualizó el registro de la base de datos.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Slaughter_Slaughterer::destroy($id);
        return redirect('slaughter_slaughterer')->with('mensaje','Se eliminó el registro de la base de datos.');  
    }
}
