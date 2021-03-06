<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenTemporal extends Model
{
  protected $table = 'Imagenestemporales';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nombreOriginal', 'nombreSanitizado',
  ];
}
