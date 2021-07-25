<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Models\User;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas_id=Administrador::all('persona_id');
        $personas=Persona::with('administrador')->whereIn('id',$personas_id)->get();
        return view('administrador.index',['personas'=>$personas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona=new Persona();
        $persona->nombre=$request->input('nombre');
        $persona->apellido=$request->input('apellido');
        $persona->correo=$request->input('correo');
        $persona->fecha_nacimiento=$request->input('fecha_nacimiento');

        $persona->direccion=$request->input('direccion');
        $persona->save();

        $administrador=new Administrador();
        $administrador->profesion=$request->input('profesion');
        $administrador->persona_id=$persona->id;
        $administrador->save();


        $user=new User();
        $user->name=$persona->nombre;
        $user->email=$persona->correo;
        $user->password=bcrypt(12345678);
        $user->persona_id=$persona->id;
        $user->save();


        return redirect()->route('administradores.index');
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
        return view('administrador.show',['persona'=>$persona]);
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
        return view('administrador.edit',['persona'=>$persona]);
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
        $persona->apellido=$request->input('apellido');

        $persona->correo=$request->input('correo');
        $persona->fecha_nacimiento=$request->input('fecha_nacimiento');

        $persona->direccion=$request->input('direccion');
        $persona->save();

        $administrador=$persona->administrador;
        $administrador->profesion=$request->input('profesion');
        $administrador->save();

        return redirect()->route('administradores.index');
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
        return redirect()->route('administradores.index');
    }
}
