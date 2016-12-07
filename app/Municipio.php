<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
  public $timestamps = false;
  public $incrementing = false;
  protected $primaryKey = 'idMunicipio';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'claveMunicipio', 'nombre', 'idEstado',
  ];

  public function estado()
  {
    return $this->belongsTo('App\Estado', 'idEstado');
  }

  public function localidades()
  {
    return $this->hasMany('App\Localidad', 'idMunicipio', 'idMunicipio');
  }
}
