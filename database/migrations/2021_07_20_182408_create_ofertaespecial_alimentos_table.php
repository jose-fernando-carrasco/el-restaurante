<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertaespecialAlimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertaespecial_alimentos', function (Blueprint $table) {
            $table->id();
             $table->date('fecha_inicio');
             $table->date('fecha_final');
             $table->unsignedBigInteger('ofertaespecial_id');
            $table->unsignedBigInteger('alimento_id');
            $table->foreign('ofertaespecial_id')->references('id')->on('ofertaespecial')->onDelete('cascade');
            $table->foreign('alimento_id')->references('id')->on('alimentos')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ofertaespecial_alimentos');
    }
}
