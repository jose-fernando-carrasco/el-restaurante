<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Models\User;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes_id=cliente::all('persona_id');
        $personas=Persona::with('cliente')->whereIn('id',$clientes_id)->get();

        return view('cliente.index',['personas'=>$personas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          ////request->validator();
          $request->validate([
            'nombre'=>'required',
            'Apellido'=>'required',
            'Correo'=>'required',
            'fecha_nacimiento'=>'required',
            'carnet_identidad'=>'required',
           ]);

        $persona=new Persona();
        $persona->nombre=$request->input('nombre');
        $persona->apellido=$request->input('Apellido');
        $persona->correo=$request->input('Correo');
        $persona->fecha_nacimiento=$request->input('fecha_nacimiento');

        $persona->save();

        $cliente=new cliente();
        $cliente->carnet_identidad=$request->input('carnet_identidad');

        $cliente->persona_id=$persona->id;
        $cliente->save();

        $user=new User();
        $user->name=$persona->nombre;
        $user->email=$persona->correo;
        $user->password=bcrypt(12345678);
        $user->persona_id=$persona->id;
        $user->save();

        return redirect()->route('clientes.index');
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
        return view('cliente.show',['persona'=>$persona]);
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
        return view('cliente.edit',['persona'=>$persona]);


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
           ]);
         
        $persona=Persona::findOrFail($id);
        $persona->nombre=$request->input('nombre');
        $persona->apellido=$request->input('Apellido');

        $persona->correo=$request->input('Correo');
        $persona->fecha_nacimiento=$request->input('fecha_nacimiento');


        $persona->save();

        $cliente=$persona->cliente;
        $cliente->carnet_identidad=$request->input('carnet_identidad');

        $cliente->save();

        return redirect()->route('clientes.index');
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
        return redirect()->route('clientes.index');
    }
}
