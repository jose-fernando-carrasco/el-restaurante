<?php

use App\Models\Persona;
use App\Models\User;
use App\Models\Administrador;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administradores', function (Blueprint $table) {
            $table->id();
            $table->text('profesion');
            $table->unsignedBigInteger('persona_id');

            $table->foreign('persona_id')->on('personas')->references('id')->onDelete('cascade');
            $table->timestamps();

        });
        $persona=new Persona();
        $persona->nombre='root';
        $persona->apellido='root';


        $persona->correo='root@correo.com';
        $persona->fecha_nacimiento='1901/01/01';

        $persona->direccion='root';
        $persona->save();

        $user=new User();
        $user->name='root';
        $user->email='root@correo.com';
        $user->password=bcrypt('12345');
        $user->persona_id=$persona->id;
        $user->save();

        $administrador=new Administrador();
        $administrador->profesion='profesion';
        $administrador->persona_id=$persona->id;
        $administrador->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administradores');
    }
}
