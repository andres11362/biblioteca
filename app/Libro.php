<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = ['nombre', 'genero', 'editorial', 'autor', 'cantidad'];

    public $timestamps = false;

    public function Prestamos()
    {
        return $this->hasMany('App\Prestamo');
    }
}
