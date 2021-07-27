<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->text('nombre_cajero');
            $table->text('nombre_cliente');
            $table->date('fecha');
            $table->smallInteger('monto');
            $table->text('nit')->nullable();
            $table->unsignedBigInteger('cajero_id');
            $table->foreign('cajero_id')->references('id')->on('cajeros')->onDelete('cascade');
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
        Schema::dropIfExists('facturas');
    }
}
