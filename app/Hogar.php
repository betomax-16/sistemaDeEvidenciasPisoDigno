<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hogar extends Model
{
  protected $primaryKey = 'idHogar';
  protected $table = 'Hogares';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'familia', 'area', 'idLocalidad',
  ];

  public function localidad()
  {
    return $this->belongsTo('App\Localidad', 'idLocalidad');
  }

  public function fotos()
  {
    return $this->hasMany('App\Foto', 'idHogar', 'idHogar');
  }
}
