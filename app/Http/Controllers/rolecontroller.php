<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bitacora;
use App\Models\persona;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class rolecontroller extends Controller
{
    //
    public function index()
    {

                //////////bitacora////////
$id=auth()->user()->persona_id;
$persona=persona::findOrFail($id);
$bitacora=new bitacora();
$bitacora->usuario=$persona->nombre;
$bitacora->tabla='index de roles';
$bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
$bitacora->user_id=auth()->user()->id;
$bitacora->save();
////////////////
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
              //////////bitacora////////
$id=auth()->user()->persona_id;
$persona=persona::findOrFail($id);
$bitacora=new bitacora();
$bitacora->usuario=$persona->nombre;
$bitacora->tabla='crear de roles';
$bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
$bitacora->user_id=auth()->user()->id;
$bitacora->save();
////////////////
        //1) Crear el rol
        $role = Role::create($request->all());
        //2) Asignarle los permisos correspondientes
        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.edit',$role)->with('info','El rol '.$role->name.' ha sido creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
                      //////////bitacora////////
$id=auth()->user()->persona_id;
$persona=persona::findOrFail($id);
$bitacora=new bitacora();
$bitacora->usuario=$persona->nombre;
$bitacora->tabla='show de roles';
$bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
$bitacora->user_id=auth()->user()->id;
$bitacora->save();
////////////////
        return view('roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();


        return view('roles.edit',['role'=>$role],['permissions'=>$permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>'required'
        ]);
              //////////bitacora////////
              $id=auth()->user()->persona_id;
              $persona=persona::findOrFail($id);
              $bitacora=new bitacora();
              $bitacora->usuario=$persona->nombre;
              $bitacora->tabla='edit de roles';
              $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
              $bitacora->user_id=auth()->user()->id;
              $bitacora->save();
              ////////////////
        $role->update($request->all());

        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.edit',$role)->with('info','El rol '.$role->name.' ha sido actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $name=$role->name;
        $role->delete();

        return redirect()->route('roles.index')->with('info','El role '.$name.' ha sido eliminado');
    }
}
