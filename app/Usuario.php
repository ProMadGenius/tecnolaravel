<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Usuario
 *
 * @mixin \Eloquent
 */
class Usuario extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password','apellido','ci','idtipousuario','idfacultad'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
