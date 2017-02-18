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
  $response = response(view('welcome'), 200);
  $response->header('Expires', 'Tue, 1 Jan 1980 00:00:00 GMT');
  $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
  $response->header('Pragma', 'no-cache');
  return $response;
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
Route::get('somos', 'VisitanteController@quienesSomos')->name('somos');
Route::get('donacion', 'VisitanteController@donacion')->name('donacion');
Route::get('avisop', 'VisitanteController@avisop')->name('avisop');
Route::get('contacto', 'VisitanteController@contacto')->name('contacto');
Route::post('contacto/enviar', 'VisitanteController@enviarContacto')->name('enviarContacto');
Route::get('download/{proyecto}/{anio}/{region}/{lugar}', 'EvidenciaController@excel')->name('evidencia.excel');


//paypal

Route::get('payment', 'PaypalController@postPayment')->name('payment');
Route::get('payment/status', 'PaypalController@getPaymentStatus')->name('payment.status');

Route::post('rfc', 'PaypalController@refereciaBancaria')->name('rfc');
Route::get('pdf_rfc', 'PaypalController@pdf_rfc')->name('pdf_rfc');
