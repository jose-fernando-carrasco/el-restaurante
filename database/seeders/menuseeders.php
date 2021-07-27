<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\menu;

class menuseeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $menu=new menu();
        $menu->nombre='feliz lunes';
        $menu->dia='lunes';
        $menu->admin_id=1;
        $menu->save();

        $menu1=new menu();
        $menu1->nombre='feliz martes';
        $menu1->dia='martes';
        $menu1->admin_id=1;
        $menu1->save();

        $menu2=new menu();
        $menu2->nombre='feliz miercoles';
        $menu2->dia='miercoles';
        $menu2->admin_id=1;
        $menu2->save();

        $menu4=new menu();
        $menu4->nombre='feliz jueves';
        $menu4->dia='jueves';
        $menu4->admin_id=1;
        $menu4->save();

        $menu5=new menu();
        $menu5->nombre='feliz viernes';
        $menu5->dia='viernes';
        $menu5->admin_id=1;
        $menu5->save();

        $menu6=new menu();
        $menu6->nombre='feliz sabado';
        $menu6->dia='sabado';
        $menu6->admin_id=1;
        $menu6->save();

        $menu3=new menu();
        $menu3->nombre='feliz domingo';
        $menu3->dia='domingo';
        $menu3->admin_id=1;
        $menu3->save();


    }
}
