<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCajerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajeros', function (Blueprint $table) {
            $table->id();
            $table->string('profesion');
            $table->string('carnet_identidad');
            $table->timestamps();
            $table->unsignedBigInteger('persona_id');

            $table->foreign('persona_id')->on('personas')->references('id')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cajeros');
    }
}
