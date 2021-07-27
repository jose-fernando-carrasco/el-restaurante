<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alimento;
use App\Models\persona;
use App\Models\bitacora;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
class alimentocontroller extends Controller
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
           $bitacora->tabla='index de alimento';
           $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
           $bitacora->user_id=auth()->user()->id;
           $bitacora->save();
         ////////////////

        $alimento=alimento::all();
        return view('alimento.index',['alimentos'=>$alimento]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('alimento.create');
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
          $bitacora->tabla='crear de alimento';
          $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
          $bitacora->user_id=auth()->user()->id;
          $bitacora->save();
        ////////////////

        $request->validate([
            'nombre'=>'required',
            'precio'=>'required',
            'cantidad'=>'required',
            'imagen'=>'required',
            'descripcion'=>'required'
        ]);
        $productos=new alimento();
        $productos->nombre=$request->input('nombre');
        $productos->precio=$request->input('precio');
        $productos->cantidad=$request->input('cantidad');
        $imagen=$request->file('imagen')->store('public/alimento');


        $url=Storage::url($imagen);
        $productos->imagen=$url;
        $productos->descripcion=$request->input('descripcion');
        $productos->save();

        return Redirect()->back()->with('status','ya creado');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
          //////////bitacora////////
          $id=auth()->user()->persona_id;
          $persona=persona::findOrFail($id);
          $bitacora=new bitacora();
          $bitacora->usuario=$persona->nombre;
          $bitacora->tabla='show de alimento';
          $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
          $bitacora->user_id=auth()->user()->id;
          $bitacora->save();
        ////////////////
        $alimento=alimento::findOrFail($id);


        return view('alimento.show',['alimento'=>$alimento]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $alimento=alimento::findOrFail($id);


        return view('alimento.edit',['alimento'=>$alimento]);
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
        //
          //////////bitacora////////
          $id=auth()->user()->persona_id;
          $persona=persona::findOrFail($id);
          $bitacora=new bitacora();
          $bitacora->usuario=$persona->nombre;
          $bitacora->tabla='edit de alimento';
          $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
          $bitacora->user_id=auth()->user()->id;
          $bitacora->save();
        ////////////////
        $request->validate([
            'nombre'=>'required',
            'precio'=>'required',
            'cantidad'=>'required',

            'descripcion'=>'required'
        ]);

        $alimento=alimento::findOrFail($id);
        $alimento->nombre=$request->input('nombre');
        $alimento->precio=$request->input('precio');
        $alimento->cantidad=$request->input('cantidad');
        $alimento->descripcion=$request->input('descripcion');
        if($request->hasFile('imagen')) {
            $url=str_replace('/storage','/public',$alimento->imagen);

            Storage::delete($url);
            $imagen=$request->file('imagen')->store('public/alimento');
            $url=Storage::url($imagen);
            $alimento->imagen=$url;
        }

        $alimento->save();
        return redirect()->back()->with('status','ya actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $alimento=alimento::findOrFail($id);
        $alimento=alimento::all();
        $url=str_replace('/storage','/public',$alimento->imagen);
        Storage::delete($url);
        $alimento->delete();

    }
}
