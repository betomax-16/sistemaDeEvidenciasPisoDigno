<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
  Session::forget('proyecto');
  Session::forget('estado');
  Session::forget('programa');
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'proveedor', 'middleware' => 'auth'], function(){
  Route::resource('evidencia','EvidenciaController');
  Route::resource('proyecto','ProyectoController');
  Route::resource('usuario','UsuarioController');
  Route::get('participante/{proyecto}/{idEstado}', 'ParticipanteController@index')->name('participante.index');
  Route::post('participante/store/{proyecto}/{idEstado}', 'ParticipanteController@store')->name('participante.store');
  Route::delete('participante/destroy/{usuario}/{proyecto}', 'ParticipanteController@destroy')->name('participante.destroy');
  Route::post('participantes/{proyecto}', 'ParticipanteController@seleccionarUsuarios')->name('participantes');
});
Route::post('evidencias/autocompleteLocalidad', 'EvidenciaController@autocompleteLocalidadesDelMunicipio')->name('evidencia.autocompleteLocalidad');
Route::post('evidencias/autocomplete', 'EvidenciaController@autocomplete')->name('evidencia.autocomplete');
Route::post('evidencias/hogares', 'EvidenciaController@buscarHogares')->name('evidencia.hogares');
Route::get('evidencias/{proyecto}/{idEstado}', 'EvidenciaController@evidencias')->name('evidencia.evidencias');
Route::get('evidencias/{idEvidencia}', 'EvidenciaController@ver')->name('evidencia.ver');
Route::post('evidencias/masBeneficiados', 'EvidenciaController@municipioConMasBeneficiados')->name('municipioConMasBeneficiados');
Route::post('foto/ver', 'EvidenciaController@foto')->name('foto.ver');
Route::get('proyecto/{programa}', 'ProyectoController@proyectosPorPrograma')->name('proyectosPorPrograma');
Route::get('contacto', 'VisitanteController@contacto')->name('contacto');
Route::post('contacto/enviar', 'VisitanteController@enviarContacto')->name('enviarContacto');
