<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleEncuestaUsuario extends Model
{
    //
    protected $table = 'detalle_encuesta_usuarios';




    public function usuarios()
    {
        return $this->hasMany('App\Usuario', 'idusuario');
    }
}
