<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiado extends Model
{
  protected $primaryKey = 'idHogar';
  protected $table = 'Beneficiados';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'familia', 'idLocalidad','proyecto',
  ];

  public function proyecto()
  {
    return $this->belongsTo('App\Proyecto', 'proyecto');
  }

  public function localidad()
  {
    return $this->belongsTo('App\Localidad', 'idLocalidad');
  }

  public function fotos()
  {
    return $this->hasMany('App\Foto', 'idHogar', 'idHogar');
  }
}
