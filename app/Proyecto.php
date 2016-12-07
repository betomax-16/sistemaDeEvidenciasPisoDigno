<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $primaryKey = 'nombre';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
    ];

    public function miembros()
    {
      return $this->belongsToMany('App\Usuario', 'Usuarios_Proyectos', 'proyecto', 'idUsuario')->withPivot('created_at')->withPivot('updated_at');
    }

    public function estados()
    {
      return $this->belongsToMany('App\Estado', 'Proyectos_Estados', 'proyecto', 'idEstado')->withPivot('created_at')->withPivot('updated_at');
    }
}
