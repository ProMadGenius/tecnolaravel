<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNivelmadurezTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nivel_madurezs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encuesta_id');
            $table->integer('nivel_id');
            $table->integer('cuantificacion');
            $table->string('nivel_madurez_aprobado');
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
        Schema::dropIfExists('nivelmadurezs');
    }
}
