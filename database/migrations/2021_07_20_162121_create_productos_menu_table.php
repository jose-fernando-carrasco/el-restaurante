<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_menu', function (Blueprint $table) {
            $table->integer('cantidad');
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('productos_id');
           $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade');
           $table->foreign('productos_id')->references('id')->on('productos')->onDelete('cascade');
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
        Schema::dropIfExists('productos_menu');
    }
}
