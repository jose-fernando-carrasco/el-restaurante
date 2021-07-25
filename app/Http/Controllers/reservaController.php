<?php

namespace App\Http\Controllers;
use App\Models\restaurant;
use App\Models\regreserva;
use Illuminate\Http\Request;
use App\Models\reserva;
use App\Models\Persona;
use DateTime;
use RealRashid\SweetAlert\Facades\Alert;




class reservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente=auth()->user()->id;

       $persona=persona::findOrFail($cliente);
       $persona->cliente;
      
        $reserva=reserva::all();
        return view('reserva.index',['reservas'=>$reserva]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('reserva.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_day = date("N");
$days_to_friday = 5 - $current_day;
$days_from_monday = $current_day - 1;
$monday = date("Y-m-d", strtotime("- {$days_from_monday} Days"));
$friday = date("Y-m-d", strtotime("+ {$days_to_friday} Days"));


        ////request->validator();
         $request->validate([
          'fecha'=>'required',
          'hora'=>'required',
          'cantidad'=>'required',
         ]);
        ///verificacion
         $veri=$this->verificar_espacio($request->input('fecha'),$request->input('cantidad'));
         $espacio=$this->espacio_disponible($request->input('fecha'));

        if($veri>=0){
        $reserva=new reserva();
        $reserva->fecha=$request->input('fecha');
        $reserva->hora=$request->input('hora');
         $reserva->cantidad=$request->input('cantidad');
         $reserva->save();
         return redirect()->route('reservas.index');
         }
         if($espacio>0){
            return redirect()->back()->with('status','no hay espacio suficientes, solo hay '. $espacio .' espacios disponible');
         }
         return redirect()->back()->with('status','no hay espacio disponible');



    }



   /**
    *verificacion de espacio
    */
    public function verificar_espacio($fecha,$cantidad){
        $capacidad=restaurant::findOrFail(1);
        $disponible=$this->cantidad_de_personas( $fecha);
        $disponible=$disponible+$cantidad;
        $espacio=$capacidad->cantidad-$disponible;
        return $espacio;
    }

    public function espacio_disponible($fecha){
        $capacidad=restaurant::findOrFail(1);
        $disponible=$this->cantidad_de_personas( $fecha);
        $espacio=$capacidad->cantidad-$disponible;
        return $espacio;
    }

/**
*--------------------------------
*/
/**
*------------cantidad de personas--------------------
*/
       public function cantidad_de_personas($fecha){

            $reservas=reserva::all()->whereIn('fecha',$fecha);
            $contador=0;
            foreach($reservas as $reserva){
               $contador=$contador+$reserva->cantidad;
            }
            return $contador;
       }



/**
*--------------------------------
*/
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //



        $reserva=reserva::findOrFail($id);


        return view('reserva.show',['reserva'=>$reserva]);
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
        $reserva=reserva::findOrFail($id);
        return view('reserva.edit',['reserva'=>$reserva]);
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
        //requered=>validator
           ////request->validator();
           $request->validate([
            'fecha'=>'required',
            'hora'=>'required',
            'cantidad'=>'required',
           ]);
           //////////////
        $reserva=reserva::findOrFail($id);

        $reserva->fecha=$request->input('fecha');
        $reserva->hora=$request->input('hora');
        $reserva->cantidad=$request->input('cantidad');

        $reserva->save();

        return redirect()->route('reservas.index');
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
        $reserva=reserva::findOrFail($id);
        $reserva->delete();
        return redirect()->route('reservas.index');
    }
}
