<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasoDeUsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caso_de_usos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->timestamps();
        });

        $cdu = new \App\CasoDeUso();
        $cdu->descripcion='gestionar usuarios';
        $cdu->save();

        $cdu = new \App\CasoDeUso();
        $cdu->descripcion='gestionar indicadores';
        $cdu->save();

        $cdu = new \App\CasoDeUso();
        $cdu->descripcion='gestionar modelo';
        $cdu->save();

        $cdu = new \App\CasoDeUso();
        $cdu->descripcion='gestionar facultad';
        $cdu->save();

        $cdu = new \App\CasoDeUso();
        $cdu->descripcion='gestionar tipo usuario';
        $cdu->save();

        $cdu = new \App\CasoDeUso();
        $cdu->descripcion='gestionar encuesta';
        $cdu->save();

        $cdu = new \App\CasoDeUso();
        $cdu->descripcion='resultados';
        $cdu->save();

        $cdu = new \App\CasoDeUso();
        $cdu->descripcion='reportes';
        $cdu->save();

        $cdu = new \App\CasoDeUso();
        $cdu->descripcion='estadisticas';
        $cdu->save();

        $cdu = new \App\CasoDeUso();
        $cdu->descripcion='privilegios';
        $cdu->save();

        $cdu = new \App\CasoDeUso();
        $cdu->descripcion='misEncuestas';
        $cdu->save();


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_tipousuario_cdus');
        Schema::dropIfExists('caso_de_usos');
    }
}
