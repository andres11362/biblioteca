<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Prestamo extends Model
{
    const ESTADO_PRESTAMO = "1";
    const ESTADO_DEVOLUCION = "2";
    const ESTADO_MULTA = "3";

    protected $fillable = ['id_user', 'id_libro', 'fecha_inicio', 'fecha_fin','estado'];

    public $timestamps = false;

    protected $dates = [
        'fecha_inicio', 
        'fecha_fin'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function libros()
    {
        return $this->belongsTo('App\Libro', 'id_libro');
    }

    /*public static function setFechainicioAttribute($value)
    {
        $this->attributes['fecha_inicio'] = Carbon::now()->addDays(5);
    }

    public static function setFechafinAttribute($value)
    {
        $this->attributes['fecha_fin'] = Carbon::now()->addHours(5);
    }*/

}
