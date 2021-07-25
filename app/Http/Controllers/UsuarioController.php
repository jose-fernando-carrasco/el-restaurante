<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Persona;
use App\Models\User;

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


        $users_id=User::all('persona_id');
        $personas=Persona::with('user')->whereIn('id',$users_id)->get();

        return view('usuario.index',['personas'=>$personas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        $persona=new Persona();
        $persona->nombre=$request->input('nombre');
        $persona->paterno=$request->input('paterno');
        $persona->materno=$request->input('materno');
        $persona->telefono=$request->input('telefono');
        $persona->correo=$request->input('correo');
        $persona->fecha_nacimiento=$request->input('fecha_nacimiento');
        $persona->estado_civil=$request->input('estado_civil');
        $persona->sexo=$request->input('sexo');
        $persona->carnet_identidad=$request->input('carnet_identidad');
        $persona->direccion=$request->input('direccion');
        $persona->save();

        $user=new User();
        $user->name=$request->input('nombre');
        $user->email=$request->input('correo');
        $user->password=bcrypt($request->input('contraseña'));
        $user->persona_id=$persona->id;
        $user->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $persona=Persona::findOrFail($id);
        $persona->nombre=$request->input('nombre');
        $persona->paterno=$request->input('paterno');
        $persona->materno=$request->input('materno');
        $persona->telefono=$request->input('telefono');
        $persona->correo=$request->input('correo');
        $persona->fecha_nacimiento=$request->input('fecha_nacimietno');
        $persona->estado_civil=$request->input('estado_civil');
        $persona->sexo=$request->input('sexo');
        $persona->carnet_identidad=$request->input('carnet_identidad');
        $persona->direccion=$request->input('direccion');
        $persona->save();

        $user=$persona->user;
        $user->name=$request->input('nombre');
        $user->email=$request->input('correo');
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
