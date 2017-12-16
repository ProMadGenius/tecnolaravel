<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->text('metrica');
            $table->integer('idmodelo')->unsigned();
            $table->timestamps();
            $table->foreign('idmodelo')
                ->references('id')->on('modelos')
                ->onDelete('cascade');
        });

        $this->loadIndicadors();

    }

    public function loadIndicadors(){
        $i = new \App\Indicador();
        $i->descripcion="IMF-0-1. Inventario de Activos";
        $i->metrica="Tiene un listado de los equipos de computacion de la facultad, y su asignacion.";
        $i->idmodelo=1;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-0-2. Configuración por defecto de S.O. Instalados";
        $i->metrica="Los Sistemas Operativos y Software con ofimaticos y de gestion se instalan con la configuracion basica";
        $i->idmodelo=1;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-0-3. Redes con configuración básica o por defecto";
        $i->metrica="Las Redes Cableadas o inalambricas con permiten conectarse de manera automatica y acceso a la red LAN";
        $i->idmodelo=1;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-0-4. Compartir información por defecto";
        $i->metrica="Se comparten carpetas de manera generica osea lo que se desea compartir";
        $i->idmodelo=1;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-0-5.Cuentas de usuarios genéricos o varios usuarios por computador";
        $i->metrica="Los usuarios no se autentican para ingresar al computador";
        $i->idmodelo=1;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-1-1. Responsable o Unidad  de GSI";
        $i->metrica="Existe un Responsable o Departamento de Seguridad Informatica ";
        $i->idmodelo=2;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-1-2. Medidas Básicas de Seguridad";
        $i->metrica="Las Medidas Basicas de Seguridad esta dada por el reconocimiento en la especialidad de seguridad de la informacion, personal de hardware y software y procedimiento";
        $i->idmodelo=2;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-1-3. Herramientas de Software y Hardware";
        $i->metrica="Se realiza la instalacion y actualización de software como ser antivirus, antispyware, Firewall y otros";
        $i->idmodelo=2;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-1-4. Respaldo y Recuperación de Datos";
        $i->metrica="Se realiza Respaldo y Recuperacion de datos, y la guarda adecuada de los datos en otro lugar";
        $i->idmodelo=2;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-1-5. Responsable del Soporte Tecnico ";
        $i->metrica="Administran herramientas de Hardware y Software para el soporte tecnico";
        $i->idmodelo=2;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-2-1. Documentos de Seguridad Informatica";
        $i->metrica="Existen documentos donde se especifiquen las procedimientos, funciones, medidas, normas, politicas y obligaciones de los usuario";
        $i->idmodelo=3;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-2-2. Funciones y obligaciones del personal";
        $i->metrica="Existen documentos que expliquen como llevar procesos, hardware y software; asi como las responsabilidades del personal y de los usuario";
        $i->idmodelo=3;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-2-3. Difusion de Politicas de Seguridad Informatica";
        $i->metrica="Existen informacion sobre confidencialidad, integridad, disponibilidad, autenticacion, autorizacion, firmas electronicas, etc.";
        $i->idmodelo=3;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-2-4. Registro de Eventos que afectan la seguridad informatica";
        $i->metrica="Existe la bitacora sobre acciones que realizan los usuarios cuando acceden a datos u  informacion, sobre incidentes de seguridad y eventos para mejor la seguridad";
        $i->idmodelo=3;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-2-5. Valores y Conductas Eticas";
        $i->metrica="Existen Cursos, Charlas, Seminarios y Reuniones sobre Etica y cultura de seguridad informatica";
        $i->idmodelo=3;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-3-1. Auditorias Informaticas";
        $i->metrica="Se realizan Auditoria externas como internas en el marco de la seguridad informatica";
        $i->idmodelo=4;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-3-2. Plan Estrategico";
        $i->metrica="Se tiene planificado Desarrollar un plan Estrategico donde su vision, mision y politicas incluyan la seguridad informatica";
        $i->idmodelo=4;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-3-3. Medidas de Seguridad Avanzadas";
        $i->metrica="Se tiene planificado la capacitacion al personal administrativo, docentes y estudiantes sobre seguridad informatica, Control de acceso a Fisico y Logico";
        $i->idmodelo=4;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-3-4. Adopcion y cumplimiento de las politicas de seguridad informatica";
        $i->metrica="Se adopta y cumple las politicas relativas a confidencialidad, integridad, disponibilidad, autenticacion , autorizacion y cualquier medida de seguridad que se considere necesaria";
        $i->idmodelo=4;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-3-5. Evaluacion de Valores y Conductas";
        $i->metrica="Se identifica en el personal y los usuarios las conductas relacionadas cono los valores y ética de seguridad informática";
        $i->idmodelo=4;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-4-1. Responsables de que cumplan las políticas y medidas de seguridad informática";
        $i->metrica="El Responsable de Seguridad Informática, genera políticas, informa y controla la aplicación en los diferentes niveles de la facultad";
        $i->idmodelo=5;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-4-2. Cultura Organizacional";
        $i->metrica="Existe una cultura organizacional de la seguridad informatica y se exigen valores eticos";
        $i->idmodelo=5;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-4-3. Desarrollo de aptitudes en personas y grupos";
        $i->metrica="Existen grupos de trabajos que promueven y consolidan y fomentan el desarrollo de la seguridad informatica con administradores y usuarios";
        $i->idmodelo=5;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-4-4. Analisis y gestion de riesgo";
        $i->metrica="Se realizan de forma periodica el analisis de la gestion de riesgo en la organizacion";
        $i->idmodelo=5;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-4-5. Ejecucion del plan Estrategico";
        $i->metrica="Se realiza una revision de los controles y de ataques ocurridos, estadisticas que permiten planificar medidas preventivas y correctivas";
        $i->idmodelo=5;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-5-1. Revision de politicas y medidas de seguridad";
        $i->metrica="Se realizaron reuniones para la revision  de la medias y politicas de seguridad";
        $i->idmodelo=6;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-5-2. Promocion y valoracion de aptitudes relacionados con la seguridad";
        $i->metrica="Existen mecanismo para la promocion y valoracion de las aptitudes con respecto a la seguridad informatica";
        $i->idmodelo=6;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-5-3. Automatizacion de los procesos de documentacion de las politicas, aprobacion y difusion electronica";
        $i->metrica="Existe un sistema que permita hacer seguimiento a las politicas, aprobacion y difusion.";
        $i->idmodelo=6;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-5-4. Valoracion de la ejecucion de la Plan Estrategico";
        $i->metrica="Se tiene el porcentaje de ejecucion del plan estrategico son respecto a la seguridad de la informacion ";
        $i->idmodelo=6;
        $i->save();
        $i = new \App\Indicador();
        $i->descripcion="IMF-5-5.Monitoreo de la red y estadisticas de ataques en linea";
        $i->metrica="Existen reportes sobre uso y ataques a las redes, y estadistica que se puedan consultar en linea";
        $i->idmodelo=6;
        $i->save();
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicadors');
    }
}
