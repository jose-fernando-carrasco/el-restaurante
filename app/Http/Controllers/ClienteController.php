<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\persona;
use App\Models\bitacora;
use App\Models\cliente;
use Illuminate\Support\Facades\Storage;
class clientecontroller extends Controller
{
    public function index()
    {

          //////////bitacora////////
          $id=auth()->user()->persona_id;
          $persona=persona::findOrFail($id);
          $bitacora=new bitacora();
          $bitacora->usuario=$persona->nombre;
          $bitacora->tabla='index de cliente';
          $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
          $bitacora->user_id=auth()->user()->id;
          $bitacora->save();
        ////////////////
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
            'contraseña'=>'required'
           ]);
  //////////bitacora////////
  $id=auth()->user()->persona_id;
  $persona=persona::findOrFail($id);
  $bitacora=new bitacora();
  $bitacora->usuario=$persona->nombre;
  $bitacora->tabla='crear de cliente';
  $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
  $bitacora->user_id=auth()->user()->id;
  $bitacora->save();
////////////////
        $persona=new Persona();
        $persona->nombre=$request->input('nombre');
        $persona->apellido=$request->input('Apellido');
        $persona->fecha_nacimiento=$request->input('fecha_nacimiento');
        $persona->save();

        $cliente=new cliente();
        $cliente->carnet_identidad=$request->input('carnet_identidad');
        $cliente->persona_id=$persona->id;
        $cliente->save();

        $user=new User();
        $user->name=$persona->nombre;
        $user->email=$request->input('Correo');
        $user->password=bcrypt($request->input('contraseña'));
        if($request->hasFile('imagen')) {
            $imagen=$request->file('imagen')->store('public/img');
            $url=Storage::url($imagen);
            $user->imagen=$url;
            }
            else{
                $user->imagen='/storage/img/usuario.png';
               }
        $user->persona_id=$persona->id;
        $user->save();
        $user->assignRole('cliente');

        return redirect()->back()->with('status','cliente cuenta ya creada');
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
          $bitacora->tabla='show de cliente';
          $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
          $bitacora->user_id=auth()->user()->id;
          $bitacora->save();
        ////////////////
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
  //////////bitacora////////
  $id=auth()->user()->persona_id;
  $persona=persona::findOrFail($id);
  $bitacora=new bitacora();
  $bitacora->usuario=$persona->nombre;
  $bitacora->tabla='edit de cliente';
  $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
  $bitacora->user_id=auth()->user()->id;
  $bitacora->save();
////////////////
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
