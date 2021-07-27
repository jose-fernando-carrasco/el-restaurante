<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\pedido;
use App\Models\persona;
use App\Models\alimento;
use App\Models\cuenta;
class pedidos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pedidos=new pedido();
        $pedidos->fecha='2021-07-26';
        $pedidos->cantidad=2;
        $pedidos->persona_id=3;
        $pedidos->save();
        $alimentos=["1","2","3","4"];
        $pedidos->alimentos()->sync($alimentos);




    }
}
