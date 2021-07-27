<?php

namespace App\Http\Controllers;

use App\Models\administrador;
use Illuminate\Http\Request;
use App\Models\bitacora;
use App\Models\persona;
use App\Models\pedido;
use App\Models\alimento;
use App\Models\cuenta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
class pedidocontroller extends Controller
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
$bitacora->tabla='index de pedido';
$bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
$bitacora->user_id=auth()->user()->id;
$bitacora->save();
////////////////

              ///////////
              if (Auth::user()->hasRole('cliente')){
                $cliente=auth()->user()->id;
                $persona=persona::findOrFail($cliente);
                $pedidos=pedido::all()->where('persona_id','=',$cliente);

                return view('pedido.index',['alimentos'=>$pedidos],['personas'=>$persona]);
                }
                $pedido=pedido::all();
                return view('pedido.index',['alimentos'=>$pedido]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $alimentos=alimento::all();
        return view('pedido.create',['alimentos'=>$alimentos]);

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

        //////////bitacora////////
$id=auth()->user()->persona_id;
$persona=persona::findOrFail($id);
$bitacora=new bitacora();
$bitacora->usuario=$persona->nombre;
$bitacora->tabla='crear de pedido';
$bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
$bitacora->user_id=auth()->user()->id;
$bitacora->save();
////////////////
        $persona_id=auth()->user()->persona_id;
        $pedido=new pedido();
        $pedido->fecha=date("Y-m-d");
        $pedido->cantidad=count($request->alimento);
        $pedido->persona_id=$persona_id;
        $verif=$this->verificar($request->alimento,$request->cantidad);
        if($verif>20){
        $pedido->save();
        $pedido->alimentos()->sync($request->alimento);

        ////////cuenta///////////
        $cuenta=new cuenta();
        $cuenta->fecha=date("Y-m-d");
        $cuenta->descripcion='el dia'.date("Y-m-d").'hizo el pedido de '.count($request->alimento).'productos';
        $cuenta->total=$verif;
        $cuenta->pedido_id=$pedido->id;
        $cuenta->save();
        return Redirect()->back()->with('status', 'creacion con exito');


           }
           $alimentos=alimento::findOrFail($verif);
          return  Redirect()->back()->with('status', 'para el plato '. $alimentos->nombre.'no hay stock suficiente');



    }
//////////////////////
       public function verificar($alimento,$cantidad){
       $numero=0;
       $total=0;
            foreach($alimento as $aliment){
                $alimentos=alimento::findOrFail($aliment);
                if($alimentos->cantidad>$cantidad[$numero]){
                     $total=$total+($alimentos->precio*$cantidad[$numero]);
                    $alimentos->cantidad=$alimentos->cantidad-$cantidad[$numero];
                    $alimentos->save();
                }
                else{
                  return $aliment;
                }
                $numero++;

            }
            return $total;
       }

////////////
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
$bitacora->tabla='show de pedido';
$bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
$bitacora->user_id=auth()->user()->id;
$bitacora->save();
////////////////

       $pedido=pedido::findOrFail($id);
       return view('pedido.show',['pedido'=>$pedido]);
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
        //////////bitacora////////
            $id=auth()->user()->persona_id;
            $persona=persona::findOrFail($id);
            $bitacora=new bitacora();
            $bitacora->usuario=$persona->nombre;
            $bitacora->tabla='edit de pedido';
            $bitacora->descripcion='el usuario'. $persona->nombre.'ingreso a las '.date("Y-m-d H:i:s");;
            $bitacora->user_id=auth()->user()->id;
            $bitacora->save();
            ////////////////

            $pedido=pedido::findOrFail($id);
            return view('pedido.edit',['pedido'=>$pedido]);
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
