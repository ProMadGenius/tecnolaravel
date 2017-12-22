<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 1000)->create();
        $this->loadEncuestas();
    }


    public function loadEncuestas(){
        for ($i=1;$i<18;$i++)
        {
            $encuesta = new \App\Encuesta();
            $encuesta->idfacultad=$i;
            $encuesta->fechainicio=Carbon::now();
            $encuesta->fechafin='2017-12-25';
            //$encuesta->idusuario1=1;
            $encuesta->save();
            //error_log($encuesta->id); for console log

            $users= \App\User::inRandomOrder()
                ->where('idfacultad',$i)
                ->get();

            $encuesta->idusuario1= $users->get(0)->id;
            $encuesta->idusuario2= $users->get(1)->id;
            $encuesta->idusuario3= $users->get(2)->id;
            $encuesta->idusuario4= $users->get(3)->id;
            $encuesta->idusuario5= $users->get(4)->id;
            $encuesta->idusuario6= $users->get(5)->id;
            $encuesta->idusuario7= $users->get(6)->id;
            $encuesta->idusuario8= $users->get(7)->id;
            $encuesta->idusuario9= $users->get(8)->id;
            $encuesta->idusuario10= $users->get(9)->id;

            $encuesta->update();
            //error_log($users);
            $c = 0;
            foreach ($users as $user){
                if($c==10){
                    break;
                }
                else {
                    $c++;
                    for ($j=1;$j<=30;$j++){
                        $detalleEncuesta = new \App\DetalleEncuestaUsuario();
                        $detalleEncuesta->idencuesta=$encuesta->id;
                        $detalleEncuesta->idusuario= $user->id;
                        $detalleEncuesta->idindicador=$j;
                        $detalleEncuesta->respuesta=$this->getRandomAnswer();
                        $detalleEncuesta->save();
                    }

                }
            }

        }

    }

    public function getRandomAnswer(){
        $i = rand(1,99);
        if($i>50)
        {
            return 'si';
        }else return 'no';
    }

}
