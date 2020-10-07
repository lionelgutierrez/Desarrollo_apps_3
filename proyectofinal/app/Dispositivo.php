<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    //
    protected $fillable = ['nombre', 'descripcion', 'ubicacion','tipo'];
}
