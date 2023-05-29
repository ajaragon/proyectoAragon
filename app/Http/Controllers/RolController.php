<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;


class RolController extends Controller
{

    function __construct(){
        //Se crean los permisos
        $this->middleware('permission:lectura-rol|crear-rol|editar-rol|borrar-rol', ['only'=>['index']]);
        $this->middleware('permission:crear-rol', ['only'=>['create','store']]);
        $this->middleware('permission:editar-rol', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-rol', ['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles =Role::paginate(5);
        return view('rol.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission =Permission::get();
        return view('rol.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name'=>'required', 'permission'=>'required']);
        $rol =Role::create(['name'=>$request->input('name')]);
        $rol->syncPermissions($request->input('permission'));

        return redirect()->route('rol.index');
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
        $rol =Role::find($id);
        $permission =Permission::get();
        //Para recuperar los roles teniendo en cuenta el id
        $rolePermissions =DB::table('roles_has_permissions')
            ->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('rol.edit', compact('rol', 'permission', 'rolePermissions'));    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, ['name'=>'required', 'permission'=>'required']);

        $rol =Role::find($id);
        $rol->name =$request->input('name');
        $rol->save();

        $rol->syncPermissions($request->input('permission'));
        return redirect()->route('rol.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('roles')->where('id', $id)->delete();
        return redirect()->route('rol.index');
    }
}
