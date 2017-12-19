<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Encuesta
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\DetalleEncuestaUsuario[] $detalle
 * @mixin \Eloquent
 */
class Encuesta extends Model
{
    //

    public function detalle()
    {
        return $this->hasMany('App\DetalleEncuestaUsuario', 'idencuesta');
    }
}
