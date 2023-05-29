<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios =User::paginate(5);
        return view('usuario.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles =Role::pluck('name', 'name')->all();
        return view('usuario.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
            'roles'=>'required'
        ]);

        $input =$request->all();
        $input['password'] =Hash::make($input['password']);

        $usuario =User::create($input);
        $usuario ->assignRole($request->input('roles'));

        return redirect()->route('usuario.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario =User::find($id);
        $roles =Role::pluck('name', 'name')->all();

        $userRole =$usuario->roles->pluck('name', 'name')->all();

        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email|unique:users,email'.$id,
            'password'=>'same:confirm-password',
            'roles'=>'required'
        ]);

        $input =$request->all();
        if(!empty($input['password'])){
            $input['password'] =Hash::make($input['password']);
        }//fin del if
        else{
            $input =Arr::except($input, array('password'));
        }//fin del else

        $usuario =User::find($id);
        $usuario->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $usuario->assignRole($request->input('roles'));
        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('usuario.index');
    }
}
