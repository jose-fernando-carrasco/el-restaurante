<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\administrador;
use App\Models\menu;
use App\Models\bitacora;
use App\Models\persona;
use App\Models\alimento;
use Illuminate\Support\Facades\Redirect;

class menucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          //////////bitacora////////
          $id=auth()->user()->persona_id;
          $persona=persona::findOrFail($id);
          $bitacora=new bitacora();
          $bitacora->usuario=$persona->nombre;
          $bitacora->tabla='index de menu';
          $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
          $bitacora->user_id=auth()->user()->id;
          $bitacora->save();
        ////////////////
        $gerente=administrador::all('id');
        $menu=menu::all();
        return view('menu.index',['menus'=>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $gerente=administrador::all('persona_id');
        $administrador=persona::with('administrador')->whereIn('id',$gerente)->get();
        $alimento=alimento::all();

        return view('menu.create',['administradors'=>$administrador],['alimentos'=>$alimento]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $request->validate([
            'nombre'=>'required',
            'dia'=>'required',


           ]);
           //////////bitacora////////
          $id=auth()->user()->persona_id;
          $persona=persona::findOrFail($id);
          $bitacora=new bitacora();
          $bitacora->usuario=$persona->nombre;
          $bitacora->tabla='crear de menu';
          $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
          $bitacora->user_id=auth()->user()->id;
          $bitacora->save();
        ////////////////
           $menu=new menu();
           $menu->nombre=$request->input('nombre');
           $menu->dia=$request->input('dia');
           $menu->admin_id=auth()->user()->persona_id;
           $menu->save();

          $menu->alimentos()->sync($request->alimento);


         return  Redirect()->back()->with('status','menu ya creado');


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
        $bitacora->tabla='show de menu';
        $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
        $bitacora->user_id=auth()->user()->id;
        $bitacora->save();
      ////////////////
        $menu=menu::findOrFail($id);
        return view('menu.show',['menu'=>$menu]);
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
        $menu=menu::findOrFail($id);
        $alimento=alimento::all();

        return view('menu.edit',['menu'=>$menu],['alimentos'=>$alimento]);

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
        $request->validate([
            'nombre'=>'required',
            'dia'=>'required',
            'admin_id'=>'required'

           ]);
           //////////bitacora////////
          $id=auth()->user()->persona_id;
          $persona=persona::findOrFail($id);
          $bitacora=new bitacora();
          $bitacora->usuario=$persona->nombre;
          $bitacora->tabla='edit de menu';
          $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
          $bitacora->user_id=auth()->user()->id;
          $bitacora->save();
        ////////////////
        $menu=menu::findOrFail($id);
        $menu->nombre=$request->input('nombre');
        $menu->dia=$request->input('dia');
        $menu->admin_id=auth()->user()->persona_id;
        $menu->save();
        $menu->alimentos()->sync($request->alimento);

        return Redirect()->back()->with('status','menu ya actualizado');
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

    }
}
