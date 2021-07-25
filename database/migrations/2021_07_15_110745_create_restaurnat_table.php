<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\restaurant;
class CreateRestaurnatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurnat', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->text('ubicacion');
            $table->timestamps();
        });
        
       $rest=new restaurant();
       $rest->cantidad=40;
       $rest->ubicacion='calle2';
       $rest->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurnat');
    }
}
