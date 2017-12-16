<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    //

    public function detalle()
    {
        return $this->hasMany('App\DetalleEncuestaUsuario', 'idencuesta');
    }
}
