<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
  public $timestamps = false;
  public $incrementing = false;
  protected $primaryKey = 'idEstado';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nombre',
  ];

  public function proyectos()
  {
    return $this->belongsToMany('App\Proyecto', 'Proyectos_Estados', 'idEstado', 'proyecto')->withPivot('created_at')->withPivot('updated_at');
  }

  public function municipios()
  {
    return $this->hasMany('App\Municipio', 'idEstado', 'idEstado');
  }
}
