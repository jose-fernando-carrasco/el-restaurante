<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\persona;
use App\Models\cajero;
use App\Models\bitacora;
class cajerocontroller extends Controller
{
    public function index()
    {
          //////////bitacora////////
          $id=auth()->user()->persona_id;
          $persona=persona::findOrFail($id);
          $bitacora=new bitacora();
          $bitacora->usuario=$persona->nombre;
          $bitacora->tabla='index de cajero';
          $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
          $bitacora->user_id=auth()->user()->id;
          $bitacora->save();
        ////////////////
        $cajeros_id=cajero::all('persona_id');
        $personas=persona::with('cajero')->whereIn('id',$cajeros_id)->get();

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

             //////////bitacora////////
             $id=auth()->user()->persona_id;
             $persona=persona::findOrFail($id);
             $bitacora=new bitacora();
             $bitacora->usuario=$persona->nombre;
             $bitacora->tabla='crear de cajero';
             $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
             $bitacora->user_id=auth()->user()->id;
             $bitacora->save();
           ////////////////
        $request->validate([
            'nombre'=>'required',
            'Apellido'=>'required',

            'fecha_nacimiento'=>'required',
            'carnet_identidad'=>'required',
            'profesion'=>'required',
           ]);
        $persona=new persona();
        $persona->nombre=$request->input('nombre');
        $persona->apellido=$request->input('Apellido');

        $persona->fecha_nacimiento=$request->input('fecha_nacimiento');

        $persona->save();


        $cajero=new cajero();
        $cajero->profesion=$request->input('profesion');
        $cajero->carnet_identidad=$request->input('carnet_identidad');
        $cajero->persona_id=$persona->id;
        $cajero->save();
        return redirect()->back()->with('status','cajero ya creado');


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
          $bitacora->tabla='show de cajero';
          $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
          $bitacora->user_id=auth()->user()->id;
          $bitacora->save();
        ////////////////
        $persona=persona::findOrFail($id);
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
        $persona=persona::findOrFail($id);
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
          //////////bitacora////////
          $id=auth()->user()->persona_id;
          $persona=persona::findOrFail($id);
          $bitacora=new bitacora();
          $bitacora->usuario=$persona->nombre;
          $bitacora->tabla='edit de cajero';
          $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
          $bitacora->user_id=auth()->user()->id;
          $bitacora->save();
        ////////////////
        $request->validate([
            'nombre'=>'required',
            'Apellido'=>'required',
            'fecha_nacimiento'=>'required',
            'carnet_identidad'=>'required',
            'profesion'=>'required',
           ]);
        $persona=persona::findOrFail($id);
        $persona->nombre=$request->input('nombre');
        $persona->apellido=$request->input('Apellido');
        $persona->fecha_nacimiento=$request->input('fecha_nacimiento');
        $persona->save();

        $cajero=$persona->cajero;
        $cajero->profesion=$request->input('profesion');
        $cajero->carnet_identidad=$request->input('carnet_identidad');
        return redirect()->back()->with('status','cajero ya actualizado');
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
        return redirect()->route('cajeros.index');
    }
}
