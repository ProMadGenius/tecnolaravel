<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Contador
 *
 * @mixin \Eloquent
 */
class Contador extends Model
{
    protected $table = 'contadors';
    public $timestamps = false;
}
