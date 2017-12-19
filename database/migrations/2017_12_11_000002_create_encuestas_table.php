<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idfacultad')->unsigned();
            $table->date('fechainicio');
            $table->date('fechafin');
            $table->integer('idusuario1')->nullable()->unsigned();
            $table->integer('idusuario2')->nullable()->unsigned();
            $table->integer('idusuario3')->nullable()->unsigned();
            $table->integer('idusuario4')->nullable()->unsigned();
            $table->integer('idusuario5')->nullable()->unsigned();
            $table->integer('idusuario6')->nullable()->unsigned();
            $table->integer('idusuario7')->nullable()->unsigned();
            $table->integer('idusuario8')->nullable()->unsigned();
            $table->integer('idusuario9')->nullable()->unsigned();
            $table->integer('idusuario10')->nullable()->unsigned();
            $table->timestamps();
            $table->foreign('idusuario1')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('idusuario2')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('idusuario3')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('idusuario4')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('idusuario5')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('idusuario6')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('idusuario7')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('idusuario8')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('idusuario9')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('idusuario10')
                ->references('id')->on('users')
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
        Schema::dropIfExists('encuestas');
    }
}
