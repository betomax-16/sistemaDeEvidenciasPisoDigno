<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Estado;
use App\Proyecto;
use App\Municipio;
use App\Localidad;
use App\Beneficiado;
use App\Foto;
use Validator;
use Carbon\Carbon;
use Excel;

class EvidenciaController extends Controller
{
    private function noGuardarCache($view)
    {
      $response = response($view, 200);
      $response->header('Expires', 'Tue, 1 Jan 1980 00:00:00 GMT');
      $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
      $response->header('Pragma', 'no-cache');
      return $response;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      dd('hola');
    }

    private function beneficiadosDelMunicipio($municipio, $proyecto, $anio)
    {
       return Beneficiado::join('Localidades', 'Beneficiados.idLocalidad', '=', 'Localidades.idLocalidad')
                                 ->join('Municipios', 'Localidades.idMunicipio', '=', 'Municipios.idMunicipio')
                                 ->select('Beneficiados.*','Localidades.idMunicipio','Localidades.nombre')
                                 ->where('Municipios.nombre', '=', $municipio)
                                 ->where('Beneficiados.proyecto', '=', $proyecto)
                                 ->where(DB::raw('year(Beneficiados.created_at)'), '=', $anio)
                                 ->paginate(6);
    }

    private function beneficiadosDeLocalidad($localidad, $proyecto, $anio)
    {
       return Beneficiado::join('Localidades', 'Beneficiados.idLocalidad', '=', 'Localidades.idLocalidad')
                                  ->select('Beneficiados.*','Localidades.idMunicipio','Localidades.nombre')
                                  ->where('Localidades.nombre', '=', $localidad)
                                  ->where('Beneficiados.proyecto', '=', $proyecto)
                                  ->where(DB::raw('year(Beneficiados.created_at)'), '=', $anio)
                                  ->paginate(6);
    }

    public function evidencias($idProyecto, $idEstado)
    {
      Session::put('proyecto', $idProyecto);
      Session::put('estado', $idEstado);
      $proyecto = Proyecto::find($idProyecto);
      $estado = Estado::find($idEstado);
      $municipio = $estado->municipioConMasBeneficiados($proyecto);
      //$estado = $proyecto->estados()->find($idEstado);
      $fechaActual = Carbon::now();
      $anio = $fechaActual->format('Y');
      $beneficiados = null;
      if ($municipio) {
        $beneficiados = $this->beneficiadosDelMunicipio($municipio->nombre, $proyecto->nombre, $anio);
      }
      return $this->noGuardarCache(view('usuarios/proveedorEvidencias/buscarEvidencias')
                                   ->with('proyecto', $proyecto)
                                   ->with('estado', $estado)
                                   ->with('municipio', $municipio)
                                   ->with('beneficiados', $beneficiados));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!(Session::has('proyecto') && Session::has('estado'))) {
          return view('welcome');
        }
        return $this->noGuardarCache(view('usuarios/proveedorEvidencias/crearEvidencia'));
    }

    private function guardarFoto($files, $path, Beneficiado $beneficiado, $tipo)
    {
      if (is_array($files)) {
        foreach ($files as $file) {
          $nombre = md5($file->getClientOriginalName()).'_'.time().'.'.$file->getClientOriginalExtension();
          $file->move($path, $nombre);
          $foto = new Foto();
          $foto->idHogar = $beneficiado->idHogar;
          $foto->nombreArchivo = $nombre;
          $foto->tipo = $tipo;
          $foto->save();
        }
      }
      else {
        $nombre = md5($files->getClientOriginalName()).'_'.time().'.'.$files->getClientOriginalExtension();
        $files->move($path, $nombre);
        $foto = new Foto();
        $foto->idHogar = $beneficiado->idHogar;
        $foto->nombreArchivo = $nombre;
        $foto->tipo = $tipo;
        $foto->save();
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'municipio' => 'required|max:255',
            'idMunicipio' => 'required|exists:Municipios',
            'localidad' => 'required|max:255',
            'idLocalidad' => 'required|exists:Localidades',
            'familia' => 'required|max:255',
            'foto1' => 'required|mimes:jpeg,png,jpg',
            'foto2' => 'mimes:jpeg,png,jpg',
            'foto3' => 'mimes:jpeg,png,jpg',
        ];

        $fotoN = count($request->fotoN) - 1;
        foreach (range(0, $fotoN) as $index) {
          $rules['fotoN.'.$index] = 'mimes:jpeg,png,jpg';
        }

        $validacion = Validator::make($request->all(), $rules);

        if ($validacion->fails()) {
          return redirect()->back()->withInput()->withErrors($validacion->errors());
        }

        $beneficiado = new Beneficiado();
        $beneficiado->familia = $request->familia;
        $beneficiado->idLocalidad = $request->idLocalidad;
        $beneficiado->proyecto = Session::get('proyecto');
        $beneficiado->save();
        $path = public_path().'/imagenes/evidencias';
        if ($request->hasFile('foto1')) {
          $file = $request->file('foto1');
          $this->guardarFoto($file, $path, $beneficiado, 'PISO_ORIGINAL');
        }
        if ($request->hasFile('foto2')) {
          $file = $request->file('foto2');
          $this->guardarFoto($file, $path, $beneficiado, 'PISO_EN_PROCESO');
        }
        if ($request->hasFile('foto3')) {
          $file = $request->file('foto3');
          $this->guardarFoto($file, $path, $beneficiado, 'PISO_TERMINADO');
        }
        if ($request->hasFile('fotoN')) {
          $file = $request->file('fotoN');
          $this->guardarFoto($file, $path, $beneficiado, 'OTROS');
        }
        return redirect()->route('evidencia.evidencias', [Session::get('proyecto'), Session::get('estado')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function ver($id)
    {
      $beneficiado = Beneficiado::find($id);
      $localidad = $beneficiado->localidad;
      $municipio = $localidad->municipio;
      return view('usuarios/proveedorEvidencias/verEvidencia')
                  ->with('beneficiado', $beneficiado)
                  ->with('localidad', $localidad)
                  ->with('municipio', $municipio);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!(Session::has('proyecto') && Session::has('estado'))) {
          return view('welcome');
        }
        $beneficiado = Beneficiado::find($id);
        $localidad = $beneficiado->localidad;
        $municipio = $localidad->municipio;
        $fotos = Foto::where('idHogar','=',$beneficiado->idHogar)->get();
        return $this->noGuardarCache(view('usuarios/proveedorEvidencias/editarEvidencia')
                                    ->with('beneficiado', $beneficiado)
                                    ->with('municipio', $municipio)
                                    ->with('localidad', $localidad)
                                    ->with('fotos', $fotos));
    }

    private function eliminarFotos($path, $fotos, $tipo)
    {
      foreach ($fotos as $foto) {
        if ($foto->tipo == $tipo) {
          unlink($path.'/'.$foto->nombreArchivo);
          $foto->delete();
        }
      }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $rules = [
          'municipio' => 'required|max:255',
          'idMunicipio' => 'required|exists:Municipios',
          'localidad' => 'required|max:255',
          'idLocalidad' => 'required|exists:Localidades',
          'familia' => 'required|max:255',
          'foto1' => 'mimes:jpeg,png,jpg',
          'foto2' => 'mimes:jpeg,png,jpg',
          'foto3' => 'mimes:jpeg,png,jpg',
      ];

      $fotoN = count($request->fotoN) - 1;
      foreach (range(0, $fotoN) as $index) {
        $rules['fotoN.'.$index] = 'mimes:jpeg,png,jpg';
      }

      $validacion = Validator::make($request->all(), $rules);

      if ($validacion->fails()) {
        return redirect()->back()->withInput()->withErrors($validacion->errors());
      }


      $beneficiado = Beneficiado::find($id);
      $beneficiado->idLocalidad = $request->idLocalidad;
      $beneficiado->familia = $request->familia;
      $beneficiado->save();

      $fotos = $beneficiado->fotos;
      $path = public_path().'/imagenes/evidencias';

      if ($request->hasFile('foto1')) {
        $this->eliminarFotos($path, $fotos, 'PISO_ORIGINAL');
        $file = $request->file('foto1');
        $this->guardarFoto($file, $path, $beneficiado, 'PISO_ORIGINAL');
      }
      if ($request->hasFile('foto2')) {
        $this->eliminarFotos($path, $fotos, 'PISO_EN_PROCESO');
        $file = $request->file('foto2');
        $this->guardarFoto($file, $path, $beneficiado, 'PISO_EN_PROCESO');
      }
      if ($request->hasFile('foto3')) {
        $this->eliminarFotos($path, $fotos, 'PISO_TERMINADO');
        $file = $request->file('foto3');
        $this->guardarFoto($file, $path, $beneficiado, 'PISO_TERMINADO');
      }
      if ($request->hasFile('fotoN')) {
        //$this->eliminarFotos($path, $fotos, 'OTROS');
        $file = $request->file('fotoN');
        $this->guardarFoto($file, $path, $beneficiado, 'OTROS');
      }
      return redirect()->route('evidencia.evidencias', [Session::get('proyecto'), Session::get('estado')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      if ($request->ajax()) {
        $path = public_path().'/imagenes/evidencias';
        $beneficiado = Beneficiado::find($id);
        foreach ($beneficiado->fotos as $foto) {
          unlink($path.'/'.$foto->nombreArchivo);
        }
        $beneficiado->delete();
        return 'Evidencia eliminada exitosamente.';
      }
    }

    public function autocomplete(Request $request)
    {
      if ($request->ajax()) {
        $nombre = $request->place;
        $region = $request->area;
        if ($region == 'MUNICIPIO') {
          $municipios = Municipio::where('nombre', 'like', $nombre.'%')
                                 ->where('idEstado', '=', Session::get('estado'))->limit(10)->get();
          $aux = array();
          foreach ($municipios as $municipio) {
            array_push($aux,['value' => $municipio->claveMunicipio, 'label' => $municipio->nombre]);
          }
          return response()->json([
            'lugares' => $aux
          ]);
        }
        elseif ($region == 'LOCALIDAD') {
          $localidades = Localidad::join('Municipios', 'Localidades.idMunicipio', '=', 'Municipios.idMunicipio')
                                  ->join('Estados', 'Municipios.idEstado', '=', 'Estados.idEstado')
                                  ->select('Localidades.*')
                                  ->where('Localidades.nombre', 'like', '%'.$nombre.'%')
                                  ->where('Estados.idEstado', '=', Session::get('estado'))
                                  ->limit(10)->get();
          $aux = array();
          foreach ($localidades as $localidad) {
            array_push($aux,['value' => $localidad->idLocalidad, 'label' => $localidad->nombre]);
          }
          return response()->json([
            'lugares' => $aux
          ]);
        }
        return $nombre.' '.$region;
      }
    }

    public function autocompleteLocalidadesDelMunicipio(Request $request)
    {
      if ($request->ajax()) {
        $localidades = Localidad::where('idMunicipio', '=', $request->municipio)
                                ->where('nombre', 'like', '%'.$request->lugar.'%')
                                ->get();
        $aux = array();
        foreach ($localidades as $localidad) {
          array_push($aux,['value' => $localidad->idLocalidad, 'label' => $localidad->nombre]);
        }
        return response()->json([
          'lugares' => $aux
        ]);
      }
    }

    public function municipioConMasBeneficiados(Request $request)
    {
      if ($request->ajax()) {
        $proyecto = Proyecto::find($request->project);
        $estado = Estado::find($request->state);
        $municipio = $estado->municipioConMasBeneficiados($proyecto);
        return response()->json([
          'municipio' => $municipio
        ]);
      }
    }

    public function buscarHogares(Request $request)
    {
      if ($request->ajax()) {
        $nombre = $request->place;
        $region = $request->area;
        $anio = $request->year;
        $proyecto = $request->project;
        if ($region == 'MUNICIPIO') {
          $beneficiados = $this->beneficiadosDelMunicipio($nombre, $proyecto, $anio);
          return response()->json([
            view('layouts/templates/Evidencias', ['beneficiados'=> $beneficiados])->render()
          ]);
        }
        elseif ($region == 'LOCALIDAD') {
          $beneficiados = $this->beneficiadosDeLocalidad($nombre, $proyecto, $anio);
          return response()->json([
            view('layouts/templates/Evidencias', ['beneficiados'=> $beneficiados])->render()
          ]);
        }
      }
    }

    public function foto(Request $request)
    {
      if ($request->ajax()) {
        return response()->json([
          'foto' =>  Foto::find($request->idFoto)
        ]);
      }
    }

    public function excel($proyecto, $año, $region, $lugar)
    {
      $beneficiados = null;
      if ($region == 'MUNICIPIO') {
        $beneficiados = Beneficiado::join('Localidades', 'Beneficiados.idLocalidad', '=', 'Localidades.idLocalidad')
                                  ->join('Municipios', 'Localidades.idMunicipio', '=', 'Municipios.idMunicipio')
                                  ->select('Beneficiados.*','Localidades.idMunicipio','Localidades.nombre')
                                  ->where('Municipios.nombre', '=', $lugar)
                                  ->where('Beneficiados.proyecto', '=', $proyecto)
                                  ->where(DB::raw('year(Beneficiados.created_at)'), '=', $año)
                                  ->get();
      }
      elseif ($region == 'LOCALIDAD') {
        $beneficiados = Beneficiado::join('Localidades', 'Beneficiados.idLocalidad', '=', 'Localidades.idLocalidad')
                                   ->select('Beneficiados.*','Localidades.idMunicipio','Localidades.nombre')
                                   ->where('Localidades.nombre', '=', $lugar)
                                   ->where('Beneficiados.proyecto', '=', $proyecto)
                                   ->where(DB::raw('year(Beneficiados.created_at)'), '=', $año)
                                   ->get();
      }
      $this->crearExcel($region, $lugar, $beneficiados, $proyecto);
    }

    private function crearExcel($region, $nombre, $beneficiados, $proyecto)
    {
      Excel::create('Evidencias', function ($excel) use ($beneficiados, $nombre, $region, $proyecto)
      {
        $excel->sheet($nombre, function ($sheet) use ($beneficiados, $nombre, $region, $proyecto)
        {
          $sheet->mergeCells('A1:D1');
          $sheet->row(1,['Registro de evidencias de '.$region.' '.$nombre.'/ proyecto: '.$proyecto]);
          $sheet->row(2,['Municipio', 'Localidad', 'Familia', 'Fecha']);
          foreach ($beneficiados as $beneficiado) {
            $fila = [];
            $fila[0] = Municipio::find($beneficiado->idMunicipio)->nombre;
            $fila[1] = $beneficiado->nombre;
            $fila[2] = $beneficiado->familia;
            $fila[3] = Carbon::createFromFormat('Y-m-d H:i:s',$beneficiado->created_at)->format('Y-m-d');
            $sheet->appendRow($fila);
          }
        });
      })->export('xls');
    }
}
