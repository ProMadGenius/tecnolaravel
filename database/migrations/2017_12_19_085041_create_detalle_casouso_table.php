<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleCasousoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_tipousuario_cdus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idtipousuario')->nullable()->unsigned();
            $table->integer('idcdu')->nullable()->unsigned();
            $table->integer('habilitado')->nullable()->unsigned(); //si el caso de uso esta habilitado
            $table->integer('buscar')->nullable()->unsigned();
            $table->integer('insertar')->nullable()->unsigned();
            $table->integer('modificar')->nullable()->unsigned();
            $table->integer('eliminar')->nullable()->unsigned();
            $table->timestamps();


            $table->foreign('idtipousuario')
                ->references('id')->on('tipo_usuarios')
                ->onDelete('cascade');
            $table->foreign('idcdu')
                ->references('id')->on('caso_de_usos')
                ->onDelete('cascade');

        });

            $cdus = \App\CasoDeUso::all();
            $tipousuarios = \App\TipoUsuario::all();
            foreach ($tipousuarios as $tipousuario){


                foreach ($cdus as $cdu){
                    $detalle_tipousuario_cdu = new \App\DetalleTipoUsuarioCDU();
                    $detalle_tipousuario_cdu->idtipousuario=$tipousuario->id;
                    $detalle_tipousuario_cdu->idcdu=$cdu->id;
                    $detalle_tipousuario_cdu->habilitado=1;
                    $detalle_tipousuario_cdu->buscar=1;
                    $detalle_tipousuario_cdu->insertar=1;
                    $detalle_tipousuario_cdu->modificar=1;
                    $detalle_tipousuario_cdu->eliminar=1;
                    $detalle_tipousuario_cdu->save();
                }
            }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_tipousuario_cdus');

    }
}
