<?php

namespace App\Http\Controllers;

use App\Models\cajero;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Models\User;
class cajeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cajeros_id=cajero::all('persona_id');
        $personas=Persona::with('cajero')->whereIn('id',$cajeros_id)->get();

        return view('cajero.index',['personas'=>$personas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cajero.create');
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
            'nombre'=>'required',
            'Apellido'=>'required',
            'Correo'=>'required',
            'fecha_nacimiento'=>'required',
            'carnet_identidad'=>'required',
            'profesion'=>'required',
           ]);
        $persona=new Persona();
        $persona->nombre=$request->input('nombre');
        $persona->apellido=$request->input('Apellido');
        $persona->correo=$request->input('Correo');
        $persona->fecha_nacimiento=$request->input('fecha_nacimiento');
        $persona->direccion=$request->input('direccion');
        $persona->save();


        $cajero=new cajero();
        $cajero->profesion=$request->input('profesion');
        $cajero->carnet_identidad=$request->input('carnet_identidad');
        $cajero->persona_id=$persona->id;
        $cajero->save();

        $user=new User();
        $user->name=$persona->nombre;
        $user->email=$persona->correo;
        $user->password=bcrypt(12345678);
        $user->persona_id=$persona->id;
        $user->save();

        return redirect()->route('cajeros.index');
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
        return view('cajero.show',['persona'=>$persona]);
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
        return view('cajero.edit',['persona'=>$persona]);
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
        $request->validate([
            'nombre'=>'required',
            'Apellido'=>'required',
            'Correo'=>'required',
            'fecha_nacimiento'=>'required',
            'carnet_identidad'=>'required',
            'profesion'=>'required',
           ]);
        $persona=Persona::findOrFail($id);
        $persona->nombre=$request->input('nombre');
        $persona->apellido=$request->input('Apellido');

        $persona->correo=$request->input('Correo');
        $persona->fecha_nacimiento=$request->input('fecha_nacimiento');

        $persona->direccion=$request->input('direccion');
        $persona->save();

        $cajero=$persona->cajero;
        $cajero->profesion=$request->input('profesion');
        $cajero->carnet_identidad=$request->input('carnet_identidad');
        return redirect()->route('cajeros.index');
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
        return redirect()->route('cajeros.index');
    }
}
