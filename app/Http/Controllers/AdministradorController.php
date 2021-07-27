<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\administrador;
use App\Models\persona;
use App\Models\bitacora;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class administradorcontroller extends Controller
{
    //
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
          $bitacora->tabla='index de administrador';
          $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
          $bitacora->user_id=auth()->user()->id;
          $bitacora->save();
        ////////////////


        $personas_id=administrador::all('persona_id');
        $personas=persona::with('administrador')->whereIn('id',$personas_id)->get();
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
           //////////bitacora////////
           $id=auth()->user()->persona_id;
           $persona=persona::findOrFail($id);
           $bitacora=new bitacora();
           $bitacora->usuario=$persona->nombre;
           $bitacora->tabla='crear de administrador';
           $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
           $bitacora->user_id=auth()->user()->id;
           $bitacora->save();
         ////////////////
        $request->validate([
            'nombre'=>'required',
            'Apellido'=>'required',
            'fecha_nacimiento'=>'required',
            'profesion'=>'required',
            'Correo'=>'required'
           ]);
        $persona=new persona();
        $persona->nombre=$request->input('nombre');
        $persona->apellido=$request->input('Apellido');
        $persona->fecha_nacimiento=$request->input('fecha_nacimiento');
        $persona->direccion=$request->input('direccion');
        $persona->save();

        $administrador=new administrador();
        $administrador->profesion=$request->input('profesion');
        $administrador->persona_id=$persona->id;
        $administrador->save();

        $user=new User();
        $user->name=$persona->nombre;
        $user->email=$request->input('Correo');
        $user->password=bcrypt(12345678);
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
        $user->assignRole('administrador');


        return redirect()->back()->with('status','administrador ya creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona=persona::findOrFail($id);
        return view('administrador.show',['persona'=>$persona]);

           //////////bitacora////////
           $id=auth()->user()->persona_id;
           $persona=persona::findOrFail($id);
           $bitacora=new bitacora();
           $bitacora->usuario=$persona->nombre;
           $bitacora->tabla='show de administrador';
           $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
           $bitacora->user_id=auth()->user()->id;
           $bitacora->save();
         ////////////////
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona=persona::findOrFail($id);
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
        $request->validate([
            'nombre'=>'required',
            'Apellido'=>'required',

            'fecha_nacimiento'=>'required',

            'profesion'=>'required',
           ]);
        $persona=persona::findOrFail($id);
        $persona->nombre=$request->input('nombre');
        $persona->apellido=$request->input('Apellido');
        $persona->fecha_nacimiento=$request->input('fecha_nacimiento');
        $persona->save();

        $administrador=$persona->administrador;
        $administrador->profesion=$request->input('profesion');
        $administrador->save();

           //////////bitacora////////
           $id=auth()->user()->persona_id;
           $persona=persona::findOrFail($id);
           $bitacora=new bitacora();
           $bitacora->usuario=$persona->nombre;
           $bitacora->tabla='edit de administrador';
           $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
           $bitacora->user_id=auth()->user()->id;
           $bitacora->save();
         ////////////////



        return redirect()->back()->with('status','administrador ya  actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona=persona::findOrFail($id);
        $persona->delete();
        return redirect()->route('administradores.index');
    }

}
