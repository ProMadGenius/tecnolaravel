<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email',60)->unique();
            $table->string('password');
            $table->string('apellido')->nullable();
            $table->string('ci')->nullable();
            $table->integer('idtipousuario')->nullable()->unsigned();
            $table->integer('idfacultad')->nullable()->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('idtipousuario')
                ->references('id')->on('tipo_usuarios')
                ->onDelete('cascade');
            $table->foreign('idfacultad')
                ->references('id')->on('facultads')
                ->onDelete('cascade');
        });
        $user = new App\User();
        $user->name='Administrador';
        $user->email='adm@gmail.com';
        $user->password=bcrypt('123456');
        $user->apellido='Terminator';
        $user->ci=1216456;
        $user->idtipousuario=1;
        $user->idfacultad=1;
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
