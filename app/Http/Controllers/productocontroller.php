<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use Session;
use Illuminate\Support\Facades\Storage;
class productocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos=producto::all();
        return view('producto.index',['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $productos=new producto();
        $productos->nombre=$request->input('nombre');
        $productos->cantidad=$request->input('cantidad');
        $imagen=$request->file('imagen')->store('public/img');


        $url=Storage::url($imagen);
        $productos->imagen=$url;
        $productos->descripcion=$request->input('descripcion');
        $productos->save();
        return redirect()->route('productos.index');


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
        $producto=producto::findOrFail($id);


        return view('producto.show',['producto'=>$producto]);
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
        $producto=producto::findOrFail($id);


        return view('producto.edit',['producto'=>$producto]);
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

        $producto=producto::findOrFail($id);


        $producto->nombre=$request->input('nombre');
        $producto->cantidad=$request->input('cantidad');

        $producto->descripcion=$request->input('descripcion');

        if($request->hasFile('imagen')) {
            $url=str_replace('/storage','/public',$producto->imagen);

            Storage::delete($url);
            $imagen=$request->file('imagen')->store('public/img');
            $url=Storage::url($imagen);
            $producto->imagen=$url;
        }

        $producto->save();
        return redirect()->route('productos.index');
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
        $producto=producto::findOrFail($id);
        $url=str_replace('/storage','/public',$producto->imagen);
        Storage::delete($url);
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
