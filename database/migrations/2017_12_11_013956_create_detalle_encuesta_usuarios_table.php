<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleEncuestaUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_encuesta_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idencuesta')->unsigned();
            $table->integer('idusuario')->unsigned();
            $table->integer('idindicador')->unsigned();
            $table->string('respuesta');
            $table->timestamps();

            $table->foreign('idencuesta')
                ->references('id')->on('encuestas')
                ->onDelete('cascade');
            $table->foreign('idusuario')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('idindicador')
                ->references('id')->on('indicadors')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_encuesta_usuarios');
    }
}
