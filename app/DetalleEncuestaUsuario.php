<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DetalleEncuestaUsuario
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Usuario[] $usuarios
 * @mixin \Eloquent
 */
class DetalleEncuestaUsuario extends Model
{
    //
    protected $table = 'detalle_encuesta_usuarios';




    public function usuarios()
    {
        return $this->hasMany('App\Usuario', 'idusuario');
    }
}
