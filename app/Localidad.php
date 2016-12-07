<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
  public $timestamps = false;
  public $incrementing = false;
  protected $primaryKey = 'idLocalidad';
  protected $table = 'Localidades';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nombre', 'idMunicipio',
  ];

  public function municipio()
  {
    return $this->belongsTo('App\Municipio', 'idMunicipio');
  }

  public function hogares()
  {
    return $this->hasMany('App\Hogar', 'idLocalidad', 'idLocalidad');
  }
}
