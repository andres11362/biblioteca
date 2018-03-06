<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const USUARIO_ADMINISTRADOR = "admin";
    const USUARIO_BIBLIOTECARIO = "biblio";
    const USUARIO_NORMAL        = "user";
    const USUARIO_VALIDO      = true;
    const USUARIO_NO_VALIDO     = false;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'documento','direccion','telefono','role', 'estado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function verificarRolePrimerUsuario()
    {
        if(User::count() <= 0){
            return User::USUARIO_ADMINISTRADOR;
        }else{
            return User::USUARIO_NORMAL;
        }
    }

    public static function verificarEstadoPrimerUsuario()
    {
        if(User::count() <= 0){
            return User::USUARIO_VALIDO;
        }else{
            return User::USUARIO_NO_VALIDO;
        }
    }

    public function Prestamos()
    {
        return $this->hasMany('App\Prestamo');
    }

}
