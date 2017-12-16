<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string("descripcion");
            $table->timestamps();
        });
        $tipousuario = new \App\TipoUsuario();
        $tipousuario->descripcion="Administrador";
        $tipousuario->save();
        $tipousuario = new \App\TipoUsuario();
        $tipousuario->descripcion="Estudiante";
        $tipousuario->save();
        $tipousuario = new \App\TipoUsuario();
        $tipousuario->descripcion="Decano";
        $tipousuario->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_usuarios');
    }
}
