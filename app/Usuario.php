<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'idUsuario';
    protected $table = 'Usuarios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellidoPaterno', 'apellidoMaterno', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function nombreCompleto()
    {
      return $this->nombre.' '.$this->apellidoPaterno.' '.$this->apellidoMaterno;
    }

    public function proyectos()
    {
      return $this->belongsToMany('App\Proyecto', 'Usuarios_Proyectos', 'idUsuario', 'proyecto')->withPivot('created_at')->withPivot('updated_at');
    }
}
