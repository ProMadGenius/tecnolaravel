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
            $encuesta->save();
            //error_log($encuesta->id); for console log

            $users= \App\User::inRandomOrder()
                ->where('idfacultad',$i)
                ->get();
            //error_log($users);
            $c = 0;
            foreach ($users as $user){
                if($c==10){
                    break;
                }
                else {
                    $c++;
                    for ($j=1;$j<30;$j++){
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
