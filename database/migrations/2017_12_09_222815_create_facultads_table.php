<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Facultad;
class CreateFacultadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facultads', function (Blueprint $table) {
            $table->increments('id');
            $table->string("descripcion");
            $table->timestamps();
        });
        $facu = new Facultad();
        $facu->descripcion="Cs. Juridicas Politicas y Sociales";
        $facu->save();
        $facu = new Facultad();
        $facu->descripcion="Cs. Economicas, Administrativas y Financieras";
        $facu->save();
        $facu = new Facultad();
        $facu->descripcion="Ciencias Agricolas";
        $facu->save();
        $facu = new Facultad();
        $facu->descripcion="Cs. Exactas y Tecnología";
        $facu->save();
        $facu = new Facultad();
        $facu->descripcion="Ciencias Veterinarias";
        $facu->save();
        $facu = new Facultad();
        $facu->descripcion="Auditoria Financiera o Contaduria Pública";
        $facu->save();
        $facu = new Facultad();
        $facu->descripcion="Politecnica";
        $facu->save();
        $facu = new Facultad();
        $facu->descripcion="Humanidades";
        $facu->save();
        $facu = new Facultad();
        $facu->descripcion="Ingenieria en Cs. de la Computacion y Telecomunicaciones";
        $facu->save();
        $facu = new Facultad();
        $facu->descripcion="Integral del Norte";
        $facu->save();
        $facu = new Facultad();
        $facu->descripcion="Integral de los Valles Crucenios";
        $facu->save();
        $facu = new Facultad();
        $facu->descripcion="Cs. del Habitat, Disenio y Arte";
        $facu->save();
        $facu = new Facultad();
        $facu->descripcion="Cs. de la Salud Humana";
        $facu->save();
        $facu = new Facultad();
        $facu->descripcion="Integral del Chaco";
        $facu->save();
        $facu = new Facultad();
        $facu->descripcion="Integral de Ichilo";
        $facu->save();
        $facu = new Facultad();
        $facu->descripcion="Integral Chiquitana";
        $facu->save();
        $facu = new Facultad();
        $facu->descripcion="Ciencias Farmaceuticas y Bioquimicas";
        $facu->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facultads');
    }
}
