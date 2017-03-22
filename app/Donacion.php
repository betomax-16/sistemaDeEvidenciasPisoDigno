<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
  public $incrementing = false;
  protected $table = 'Donaciones';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'email', 'nombre', 'apellidoPaterno', 'apellidoMaterno', 'rfc', 'colonia', 'direccion', 'cp', 'monto'
  ];
}
