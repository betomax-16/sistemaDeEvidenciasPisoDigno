<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
  protected $primaryKey = 'idFoto';
  protected $table = 'Fotos';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'idHogar', 'nombreArchivo', 'tipo', 'nombreSanitizado',
  ];

  public function beneficiado()
  {
    return $this->belongsTo('App\Beneficiado', 'idHogar');
  }
}
