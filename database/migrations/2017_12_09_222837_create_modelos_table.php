<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("descripcion");
            $table->timestamps();
        });
        $modelo = new \App\Modelo();
        $modelo->descripcion="0 BASICA";
        $modelo->save();
        $modelo = new \App\Modelo();
        $modelo->descripcion="1 INICIAL";
        $modelo->save();
        $modelo = new \App\Modelo();
        $modelo->descripcion="2 REPETIBLE";
        $modelo->save();
        $modelo = new \App\Modelo();
        $modelo->descripcion="3 DEFINIDO";
        $modelo->save();
        $modelo = new \App\Modelo();
        $modelo->descripcion="4 MEDIBLE";
        $modelo->save();
        $modelo = new \App\Modelo();
        $modelo->descripcion="5 OPTIMIZADO";
        $modelo->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modelos');
    }
}
