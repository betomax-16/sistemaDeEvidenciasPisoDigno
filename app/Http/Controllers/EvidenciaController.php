<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
//use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Estado;
use App\Proyecto;
use App\Municipio;
use App\Localidad;
use App\Beneficiado;
use App\ImagenTemporal;
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
                                 ->paginate(12);
    }

    private function beneficiadosDeLocalidad($localidad, $proyecto, $anio)
    {
       return Beneficiado::join('Localidades', 'Beneficiados.idLocalidad', '=', 'Localidades.idLocalidad')
                                  ->select('Beneficiados.*','Localidades.idMunicipio','Localidades.nombre')
                                  ->where('Localidades.nombre', '=', $localidad)
                                  ->where('Beneficiados.proyecto', '=', $proyecto)
                                  ->where(DB::raw('year(Beneficiados.created_at)'), '=', $anio)
                                  ->paginate(12);
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

    private function guardarFoto($fotos, $path, Beneficiado $beneficiado, $tipo)
    {
      foreach ($fotos as $foto) {
        $old_path = public_path().'/imagenes/temporalEvidencias/';
        $new_path = $path;
        $imagen = ImagenTemporal::where('nombreOriginal', 'like', $foto)->orderBy('nombreOriginal', 'asc')->first();
        $old_path .= $imagen->nombreSanitizado;
        $new_path .= $imagen->nombreSanitizado;
        if (!File::exists( $new_path )) {
          File::move($old_path, $new_path);
          $f = new Foto();
          $f->idHogar = $beneficiado->idHogar;
          $f->nombreArchivo = $imagen->nombreOriginal;
          $f->tipo = $tipo;
          $f->nombreSanitizado = $imagen->nombreSanitizado;
          $f->save();
          $imagen->delete();
        }
        else {
          $file = pathinfo($new_path);
          $extension = $file['extension'];
          $filename = $file['filename'];
          $newName = $filename.'.'.$extension;
          while (File::exists($path.$newName)) {
            $newName = $this->crearNombreUnico($path, $filename, $extension);
          }
          File::move($old_path, $path.$newName);
          $f = new Foto();
          $f->idHogar = $beneficiado->idHogar;
          $f->nombreArchivo = $imagen->nombreOriginal;
          $f->tipo = $tipo;
          $f->nombreSanitizado = $newName;
          $f->save();
          $imagen->delete();
        }
      }
    }

    function sanitizar($string, $force_lowercase = true, $anal = false)
    {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;

        return ($force_lowercase) ?
                  (function_exists('mb_strtolower')) ?
                    mb_strtolower($clean, 'UTF-8') :
                    strtolower($clean) :
                $clean;
    }

    private function crearNombreUnico($path, $filename, $extension )
    {
        $path .= $filename . '.' . $extension;
        if ( File::exists( $path ) )
        {
            // Generate token for image
            $imageToken = substr(sha1(mt_rand()), 0, 5);
            return $filename . '-' . $imageToken . '.' . $extension;
        }

        return $filename . '.' . $extension;
    }

    private function validarImagen(Request $request, $imagen, &$rules)
    {
      if ($request->hasFile($imagen)) {
        $foto = count($request->$imagen) - 1;
        foreach (range(0, $foto) as $index) {
          $rules[$imagen.'.'.$index] = 'mimes:jpeg,png,jpg';
        }
      }
    }

    private function guardarImagen(Request $request, $imagen, &$fotos)
    {
      $path = public_path().'/imagenes/temporalEvidencias/';
      if ($request->hasFile($imagen)) {
        $files = $request->file($imagen);
        foreach ($files as $file) {
          $nombreOriginal = $file->getClientOriginalName();
          $extension = $file->getClientOriginalExtension();
          $nombreOriginalSinExtencion = substr($nombreOriginal, 0, strlen($nombreOriginal) - strlen($extension) - 1);
          $filename = $this->sanitizar($nombreOriginalSinExtencion);
          $allowed_filename = $this->crearNombreUnico($path, $filename, $extension );

          $file->move($path, $allowed_filename);
          $imgTemporal = new ImagenTemporal();
          $imgTemporal->nombreSanitizado = $allowed_filename;
          $imgTemporal->nombreOriginal = $nombreOriginal;
          $imgTemporal->save();
          array_push($fotos, $nombreOriginal);
        }
      }
      return $fotos;
    }

    public function addImage(Request $request)
    {
      $rules = [];
      $this->validarImagen($request, 'foto1', $rules);
      $this->validarImagen($request, 'foto2', $rules);
      $this->validarImagen($request, 'foto3', $rules);
      $this->validarImagen($request, 'fotoN', $rules);

      $validacion = Validator::make($request->all(), $rules);
      if ($validacion->fails()) {
        if ($request->ajax()) {
          return response()->json(['errores' => $validacion->errors()]);
        }
        return redirect()->back()->withInput()->withErrors($validacion->errors());
      }

      $fotos = [];
      $this->guardarImagen($request, 'foto1', $fotos);
      $this->guardarImagen($request, 'foto2', $fotos);
      $this->guardarImagen($request, 'foto3', $fotos);
      $this->guardarImagen($request, 'fotoN', $fotos);

      if ($request->ajax()) {
          return response()->json(['info' => $fotos]);
      }
      else {
        return $request->all();
      }
    }

    public function removeImage(Request $request)
    {
      //$path = public_path().'/imagenes/temporalEvidencias/'.$request->id;

      //CREO QUE SI SE DEJA ASI, A LA HORA DE REMOVER FOTOS EN LA SECCION DE CREACION DE EVIDENCIAS
      //PROBABLEMENTE SE PODRIA ELEIMINAR UN ARCHIVO YA EXISTENTE EN LA CARPETA DE EVIDENCIAS
      //MEJOR SOLO HACER EJECUTAR EL QUERY COMPLETO SI ES SE ENTRA EN LA PARTE DE EDICION DE EVIDENCIAS
      $message = 'error';
      //HACER COINCIDIR CON EL "ID DE LA EVICENCIA Y TIPO DE FOTO" PARA OBTENER LA IMAGEN QUE SE RELACIONA A ESA EVIDENCIA
      if ($request->idBeneficiado) {
        $tipo = ['dropzoneFileUpload1' => 'PISO_ORIGINAL',
                 'dropzoneFileUpload2' => 'PISO_EN_PROCESO',
                 'dropzoneFileUpload3' => 'PISO_TERMINADO',
                 'dropzoneFileUpload4' => 'OTROS'];
        $foto = Foto::where('nombreSanitizado', '=', $request->id)
                    ->where('idHogar', '=', $request->idBeneficiado)
                    ->where('tipo', '=', $tipo[$request->tipo])
                    ->orderBy('nombreSanitizado', 'asc')->first();
        if ($foto) {
          $path = public_path().'/imagenes/evidencias/';
          $file = $path.$foto->nombreSanitizado;
          if (File::exists($file)) {
            if (unlink($file)) {
              $message = 'eliminado';
              $foto->delete();
            }
          }
        }
        else {
          $imagenTem = ImagenTemporal::where('nombreOriginal', 'like', $request->id)->orderBy('nombreOriginal', 'asc')->first();
          if ($imagenTem) {
            $path = public_path().'\imagenes\temporalEvidencias\\'.$imagenTem->nombreSanitizado;
            if (File::exists($path)) {
              if (unlink($path)) {
                $message = 'eliminado';
                $imagenTem->delete();
              }
            }
          }
        }
      }
      else {
        $imagenTem = ImagenTemporal::where('nombreOriginal', 'like', $request->id)->orderBy('nombreOriginal', 'asc')->first();
        if ($imagenTem) {
          $path = public_path().'\imagenes\temporalEvidencias\\'.$imagenTem->nombreSanitizado;
          if (File::exists($path)) {
            if (unlink($path)) {
              $message = 'eliminado';
              $imagenTem->delete();
            }
          }
        }
      }
      return $message;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //return response()->json(['info' => $request->{$a}]);
        if (!(Session::has('proyecto') && Session::has('estado'))) {
          if ($request->ajax()) {
            return response()->json(['session' => 'false']);
          }
          return view('welcome');
        }
        $rules = [
            'municipio' => 'required|max:255',
            'idMunicipio' => 'required|exists:Municipios',
            'localidad' => 'required|max:255',
            'idLocalidad' => 'required|exists:Localidades',
            'familia' => 'required|max:255',
        ];

        if (!$request->fotos1) {
          $rules['fotos1'] = 'required';
        }
        else {
          if (strlen($request->fotos1[0]) <= 0) {
            $rules['fotos1'] = 'max:255';
          }
        }

        foreach ($request->all() as $key => $fotos) {
          switch ($key) {
            case 'fotos2':
              if (strlen($request->{$key}[0]) <= 0) {
                $rules[$key] = 'max:255';
              }
              break;
            case 'fotos3':
              if (strlen($request->{$key}[0]) <= 0) {
                $rules[$key] = 'max:255';
              }
              break;
            case 'fotos4':
              foreach ($fotos as $foto) {
                if (strlen($foto) <= 0) {
                  $rules[$key] = 'max:255';
                }
              }
              break;
          }
        }

        $validacion = Validator::make($request->all(), $rules);

        if ($validacion->fails()) {
          if ($request->ajax()) {
            return response()->json(['errors'=>$validacion->errors()]);
          }
          return redirect()->back()->withInput()->withErrors($validacion->errors());
        }

        $beneficiado = new Beneficiado();
        $beneficiado->familia = $request->familia;
        $beneficiado->idLocalidad = $request->idLocalidad;
        $beneficiado->proyecto = Session::get('proyecto');
        $beneficiado->save();
        $path = public_path().'/imagenes/evidencias/';

        if ($request->fotos1) {
          $fotos = $request->fotos1;
          $this->guardarFoto($fotos, $path, $beneficiado, 'PISO_ORIGINAL');
        }
        if ($request->fotos2) {
          $fotos = $request->fotos2;
          $this->guardarFoto($fotos, $path, $beneficiado, 'PISO_EN_PROCESO');
        }
        if ($request->fotos3) {
          $fotos = $request->fotos3;
          $this->guardarFoto($fotos, $path, $beneficiado, 'PISO_TERMINADO');
        }
        if ($request->fotos4) {
          $fotos = $request->fotos4;
          $this->guardarFoto($fotos, $path, $beneficiado, 'OTROS');
        }
        if ($request->ajax()) {
          return response()->json(['status' => 'success']);
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
        if ($beneficiado) {
          $localidad = $beneficiado->localidad;
          $municipio = $localidad->municipio;
          $fotos = Foto::where('idHogar','=',$beneficiado->idHogar)->get();
          $imageAnswer = array();
          foreach ($fotos as $foto) {
            $imageAnswer[] = [
                'original' => $foto->nombreArchivo,
                'server' => $foto->nombreSanitizado,
                'tipo' => $foto->tipo,
                'size' => File::size(public_path('/imagenes/evidencias/' . $foto->nombreSanitizado))
            ];
          }
          return $this->noGuardarCache(view('usuarios/proveedorEvidencias/editarEvidencia')
                                      ->with('beneficiado', $beneficiado)
                                      ->with('municipio', $municipio)
                                      ->with('localidad', $localidad)
                                      ->with('fotos', $imageAnswer));
        }
        return view('welcome');
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
      if (!(Session::has('proyecto') && Session::has('estado'))) {
        if ($request->ajax()) {
          return response()->json(['session' => 'false']);
        }
        return view('welcome');
      }
      $rules = [
          'municipio' => 'required|max:255',
          'idMunicipio' => 'required|exists:Municipios',
          'localidad' => 'required|max:255',
          'idLocalidad' => 'required|exists:Localidades',
          'familia' => 'required|max:255',
      ];

      if (!$request->fotos1) {
        $rules['fotos1'] = 'required';
      }
      else {
        if (strlen($request->fotos1[0]) <= 0) {
          $rules['fotos1'] = 'max:255';
        }
      }

      foreach ($request->all() as $key => $fotos) {
        switch ($key) {
          case 'fotos2':
            if (strlen($request->{$key}[0]) <= 0) {
              $rules[$key] = 'max:255';
            }
            break;
          case 'fotos3':
            if (strlen($request->{$key}[0]) <= 0) {
              $rules[$key] = 'max:255';
            }
            break;
          case 'fotos4':
            foreach ($fotos as $foto) {
              if (strlen($foto) <= 0) {
                $rules[$key] = 'max:255';
              }
            }
            break;
        }
      }

      $validacion = Validator::make($request->all(), $rules);

      if ($validacion->fails()) {
        if ($request->ajax()) {
          return response()->json(['errors'=>$validacion->errors()]);
        }
        return redirect()->back()->withInput()->withErrors($validacion->errors());
      }

      $beneficiado = Beneficiado::find($request->idBeneficiado);
      $beneficiado->familia = $request->familia;
      $beneficiado->idLocalidad = $request->idLocalidad;
      $beneficiado->proyecto = Session::get('proyecto');
      $beneficiado->save();
      $path = public_path().'/imagenes/evidencias/';
      $path_temporal = public_path().'/imagenes/temporalEvidencias/';
      if ($request->fotos1) {
        $fotos = $request->fotos1;
        $auxFotos = [];
        foreach ($fotos as $foto) {
          if (File::exists($path_temporal.$foto)) {
            array_push($auxFotos, $foto);
          }
        }
        $this->guardarFoto($auxFotos, $path, $beneficiado, 'PISO_ORIGINAL');
      }
      if ($request->fotos2) {
        $fotos = $request->fotos2;
        $auxFotos = [];
        foreach ($fotos as $foto) {
          if (File::exists($path_temporal.$foto)) {
            array_push($auxFotos, $foto);
          }
        }
        $this->guardarFoto($auxFotos, $path, $beneficiado, 'PISO_EN_PROCESO');
      }
      if ($request->fotos3) {
        $fotos = $request->fotos3;
        $auxFotos = [];
        foreach ($fotos as $foto) {
          if (File::exists($path_temporal.$foto)) {
            array_push($auxFotos, $foto);
          }
        }
        $this->guardarFoto($auxFotos, $path, $beneficiado, 'PISO_TERMINADO');
      }
      if ($request->fotos4) {
        $fotos = $request->fotos4;
        $auxFotos = [];
        foreach ($fotos as $foto) {
          if (File::exists($path_temporal.$foto)) {
            array_push($auxFotos, $foto);
          }
        }
        $this->guardarFoto($auxFotos, $path, $beneficiado, 'OTROS');
      }
      if ($request->ajax()) {
        return response()->json(['status' => 'success']);
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
          unlink($path.'/'.$foto->nombreSanitizado);
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

    public function outFocusMunicipio(Request $request)
    {
      if ($request->ajax()) {
        $municipios = Municipio::where('nombre', '=', $request->place)->where('idEstado', '=', Session::get('estado'))->get();
        $idMunicipio = $municipios->count() == 1 ? $municipios[0]->idMunicipio : null;
        return response()->json(['idMunicipio' => $idMunicipio]);
      }
    }

    public function outFocusLocalidad(Request $request)
    {
      if ($request->ajax()) {
        $localidades = Localidad::where('nombre', '=', $request->place)->where('idMunicipio', '=', $request->idMunicipio)->get();
        $idLocalidad = $localidades->count() == 1 ? $localidades[0]->idLocalidad : null;
        return response()->json(['idLocalidad' => $idLocalidad]);
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
            'evidencias' => view('layouts/templates/Evidencias', ['beneficiados'=> $beneficiados])->render(),
            'paginacion' => view('layouts/templates/pagination', ['beneficiados'=> $beneficiados])->render()
          ]);
        }
        elseif ($region == 'LOCALIDAD') {
          $beneficiados = $this->beneficiadosDeLocalidad($nombre, $proyecto, $anio);
          return response()->json([
            'evidencias' => view('layouts/templates/Evidencias', ['beneficiados'=> $beneficiados])->render(),
            'paginacion' => view('layouts/templates/pagination', ['beneficiados'=> $beneficiados])->render()
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
