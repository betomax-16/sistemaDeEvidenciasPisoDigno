<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Beneficiado;

class Proyecto extends Model
{
    protected $primaryKey = 'idProyecto';
    protected $table = 'Proyectos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'tipo', 'descripcion'
    ];

    public function miembros()
    {
      return $this->belongsToMany('App\Usuario', 'Usuarios_Proyectos', 'proyecto', 'idUsuario')->withPivot('created_at')->withPivot('updated_at');
    }

    public function beneficiados()
    {
      return $this->hasMany('App\Beneficiado', 'proyecto', 'idProyecto');
    }

    public function estados()
    {
       return Estado::join('Municipios', 'Municipios.idEstado', '=', 'Estados.idEstado')
                  ->join('Localidades', 'Localidades.idMunicipio', '=', 'Municipios.idMunicipio')
                  ->join('Beneficiados', 'Beneficiados.idLocalidad', '=', 'Localidades.idLocalidad')
                  ->select('Estados.*')
                  ->where('Beneficiados.proyecto', '=', $this->nombre)
                  ->groupBy('Estados.idEstado')
                  ->get();
    }
}
