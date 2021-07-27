<?php

namespace App\Http\Controllers;


use App\Models\Persona;
use App\Models\User;
use App\Models\bitacora;
use Spatie\Permission\Models\Role;
use App\Models\cajero;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

              //////////bitacora////////
              $id=auth()->user()->persona_id;
              $persona=persona::findOrFail($id);
              $bitacora=new bitacora();
              $bitacora->usuario=$persona->nombre;
              $bitacora->tabla='index de user';
              $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
              $bitacora->user_id=auth()->user()->id;
              $bitacora->save();
              ////////////////
        $users_id=User::all('persona_id');
        $user=User::all('id');
        $personas=Persona::with('user')->whereIn('id',$users_id)->get();

        $roles=Role::with('users')->whereIn('id',$user)->get();


        return view('usuario.index',['personas'=>$personas],['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::pluck('name', 'id');
        $user=User::all('persona_id');
        $cajeros=cajero::all('persona_id');
        $cajeros_id=persona::whereIn('id',$cajeros)->whereNotIn('id',$user)->get();
         return view('usuario.create',['roles'=>$roles],['cajeros'=>$cajeros_id]);
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

            'Correo'=>'required',
            'nombre'=>'required',
            'contraseña'=>'required'

           ]);
   //////////bitacora////////
   $id=auth()->user()->persona_id;
   $persona=persona::findOrFail($id);
   $bitacora=new bitacora();
   $bitacora->usuario=$persona->nombre;
   $bitacora->tabla='crear de user';
   $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
   $bitacora->user_id=auth()->user()->id;
   $bitacora->save();
   ////////////////
           $user=new User();
           $user->name=$request->nombre;
           $user->email=$request->Correo;
           $user->password=bcrypt($request->input('contraseña'));
           if($request->hasFile('imagen')) {
            $imagen=$request->file('imagen')->store('public/img');
            $url=Storage::url($imagen);
            $user->imagen=$url;
            }
           $user->imagen='/storage/img/usuario.png';
           $user->persona_id=$request->cajeros;
           $user->save();
           $role=Role::findOrFail($request->role_id);
           $user->assignRole($role->name);
           return redirect()->back()->with('usuario ya creado');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
           //////////bitacora////////
           $id=auth()->user()->persona_id;
           $persona=persona::findOrFail($id);
           $bitacora=new bitacora();
           $bitacora->usuario=$persona->nombre;
           $bitacora->tabla='show de user';
           $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
           $bitacora->user_id=auth()->user()->id;
           $bitacora->save();
           ////////////////
        $persona=Persona::findOrFail($id);

        return view('usuario.show',['persona'=>$persona]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona=Persona::findOrFail($id);
        return view('usuario.edit',['persona'=>$persona]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           //////////bitacora////////
           $id=auth()->user()->persona_id;
           $persona=persona::findOrFail($id);
           $bitacora=new bitacora();
           $bitacora->usuario=$persona->nombre;
           $bitacora->tabla='edit de user';
           $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
           $bitacora->user_id=auth()->user()->id;
           $bitacora->save();
           ////////////////
        $persona=Persona::findOrFail($id);
        $user=$persona->user;
        $user->name=$request->input('nombre');
        $user->email=$request->input('correo');
        if($request->hasFile('imagen')) {
            if($user->imagen!='/storage/img/usuario.png'){
                $url=str_replace('/storage','/public',$user->imagen);
                Storage::delete($url);
            }

            $imagen=$request->file('imagen')->store('public/img');
            $url=Storage::url($imagen);
            $user->imagen=$url;
        }
        $user->password=bcrypt($request->input('contraseña'));
        $user->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona=Persona::findOrFail($id);
        $persona->delete();
        return redirect()->route('usuarios.index');
    }
}
