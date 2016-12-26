<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Municipio;
use App\Proyecto;

class Estado extends Model
{
  public $timestamps = false;
  public $incrementing = false;
  protected $primaryKey = 'idEstado';
  protected $table = 'Estados';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nombre',
  ];

  public function municipios()
  {
    return $this->hasMany('App\Municipio', 'idEstado', 'idEstado');
  }

  public function municipioConMasBeneficiados(Proyecto $proyecto)
  {
    return Municipio::join('Localidades', 'Localidades.idMunicipio', '=', 'Municipios.idMunicipio')
                    ->join('Beneficiados', 'Beneficiados.idLocalidad', '=', 'Localidades.idLocalidad')
                    ->select('Municipios.*', DB::raw('count(*) as familias'))
                    ->whereYear('Beneficiados.created_at', '=', Carbon::now()->format('Y'))
                    ->where('Municipios.idEstado', '=', $this->idEstado)
                    ->where('Beneficiados.proyecto', '=', $proyecto->nombre)
                    ->groupBy('Municipios.idMunicipio')
                    ->orderBy('familias', 'desc')
                    ->limit(1)
                    ->first();
  }
}
