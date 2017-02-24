<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sepomex extends Model
{
    protected $table = 'sepomex';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idEstado', 'estado', 'idMunicipio', 'municipio', 'ciudad', 'zona', 'cp', 'asentamiento', 'tipo',
    ];
}
