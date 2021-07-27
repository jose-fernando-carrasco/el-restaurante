<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use App\Models\Persona;
use App\Models\Administrador;
use App\Models\cliente;
use App\Models\cajero;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ///////admin////////
        $persona=new persona();
        $persona->nombre='admin';
        $persona->apellido='admin';
        $persona->fecha_nacimiento='1901/01/01';
        $persona->direccion='admin';
        $persona->save();

        $user=new User();
        $user->name='admin';
        $user->email='admin@correo.com';
        $user->imagen='/storage/img/usuario.png';
        $user->password=bcrypt('12345');
        $user->persona_id=$persona->id;
        $user->save();

        $administrador=new administrador();
        $administrador->profesion='profesion';
        $administrador->persona_id=$persona->id;
        $administrador->save();

        $user->assignRole('administrador');
        ///////cliente////////
        $persona=new persona();
        $persona->nombre='cliente';
        $persona->apellido='cliente';
        $persona->fecha_nacimiento='1901/01/01';
        $persona->direccion='cliente';
        $persona->save();

        $user=new User();
        $user->name='cliente';
        $user->email='cliente@correo.com';
        $user->imagen='/storage/img/usuario.png';
        $user->password=bcrypt('12345');
        $user->persona_id=$persona->id;
        $user->save();

        $user->assignRole('cliente');

        $cliente=new cliente();
        $cliente->carnet_identidad='123456789';
        $cliente->persona_id=$persona->id;
        $cliente->save();

        ////////cajero///////
        $persona=new persona();
        $persona->nombre='cajero';
        $persona->apellido='cajero';
        $persona->fecha_nacimiento='1901/01/01';
        $persona->direccion='cajero';
        $persona->save();

        $user=new User();
        $user->name='cajero';
        $user->email='cajero@correo.com';
        $user->imagen='/storage/img/usuario.png';
        $user->password=bcrypt('12345');
        $user->persona_id=$persona->id;
        $user->save();

        $user->assignRole('cajero');

        $cajero=new cajero();
        $cajero->carnet_identidad='123456789';
        $cajero->profesion='profesion';
        $cajero->persona_id=$persona->id;
        $cajero->save();
    }
}
