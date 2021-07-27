<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\alimento;
class alimentoseedes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $alimentos=new alimento();
       $alimentos->nombre='albondiga';
       $alimentos->precio=15;
       $alimentos->cantidad=15;
       $alimentos->imagen='/storage/alimento/albondiga.jpg';
       $alimentos->descripcion='albondiga';
       $alimentos->save();

       $alimentos1=new alimento();
       $alimentos1->nombre='bife';
       $alimentos1->precio=10;
       $alimentos1->cantidad=15;
       $alimentos1->imagen='/storage/alimento/bife.jpg';
       $alimentos1->descripcion='bife';
       $alimentos1->save();

       $alimentos2=new alimento();
       $alimentos2->nombre='buñuelo';
       $alimentos2->precio=8;
       $alimentos2->cantidad=15;
       $alimentos2->imagen='/storage/alimento/buñuelo.jpg';
       $alimentos2->descripcion='buñuelo';
       $alimentos2->save();

       $alimentos3=new alimento();
       $alimentos3->nombre='guiso_fideo';
       $alimentos3->precio=10;
       $alimentos3->cantidad=15;
       $alimentos3->imagen='/storage/alimento/guiso_fideo.jpg';
       $alimentos3->descripcion='guiso_fideo';
       $alimentos3->save();

       $alimentos4=new alimento();
       $alimentos4->nombre='hamburguesa';
       $alimentos4->precio=8;
       $alimentos4->cantidad=15;
       $alimentos4->imagen='/storage/alimento/hamburguesa.jpg';
       $alimentos4->descripcion='hamburguesa';
       $alimentos4->save();

       $alimentos5=new alimento();
       $alimentos5->nombre='keperi';
       $alimentos5->precio=10;
       $alimentos5->cantidad=15;
       $alimentos5->imagen='/storage/alimento/keperi.jpg';
       $alimentos5->descripcion='keperi';
       $alimentos5->save();

       $alimentos6=new alimento();
       $alimentos6->nombre='majadito';
       $alimentos6->precio=10;
       $alimentos6->cantidad=15;
       $alimentos6->imagen='/storage/alimento/majadito.jpg';
       $alimentos6->descripcion='majadito';
       $alimentos6->save();

       $alimentos7=new alimento();
       $alimentos7->nombre='picante_pollo';
       $alimentos7->precio=10;
       $alimentos7->cantidad=15;
       $alimentos7->imagen='/storage/alimento/picante_pollo.jpg';
       $alimentos7->descripcion='picante_pollo';
       $alimentos7->save();

       $alimentos8=new alimento();
       $alimentos8->nombre='sopa_fideo';
       $alimentos8->precio=7;
       $alimentos8->cantidad=15;
       $alimentos8->imagen='/storage/alimento/sopa_fideo.jpg';
       $alimentos8->descripcion='sopa_fideo';
       $alimentos8->save();

       $alimentos9=new alimento();
       $alimentos9->nombre='sopa_mani';
       $alimentos9->precio=7;
       $alimentos9->cantidad=15;
       $alimentos9->imagen='/storage/alimento/sopa_mani.jpg';
       $alimentos9->descripcion='sopa_mani';
       $alimentos9->save();
      }
}
