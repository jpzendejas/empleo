<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/status','StatusController@index');
Route::post('/get_status','StatusController@get_status');
Route::post('/save_status','StatusController@save_status');
Route::post('update_status/{id}','StatusController@update_status');
Route::post('destroy_status/','StatusController@destroy_status');
Route::get('/empresas','EmpresasController@index');
Route::post('/get_empresa','EmpresasController@get_empresas');
Route::post('/get_estado','EmpresasController@get_estados');
Route::post('/get_municipio/{id}','EmpresasController@get_municipios');
Route::post('get_sector','EmpresasController@get_sectores');
Route::post('/save_empresa','EmpresasController@save_empresas');
Route::post('update_empresa/{id}','EmpresasController@update_empresas');
Route::get('/reg','AuthController@registrar');
Route::get('/vacantes','VacantesController@index');
Route::post('/get_vacante','VacantesController@get_vacantes');
Route::post('/update_vacante/{id}','VacantesController@update_vacantes');
Route::post('/get_estado_civil','VacantesController@get_estados_civil');
Route::post('/get_escolaridad','VacantesController@get_escolaridades');
Route::post('/get_experiencia','VacantesController@get_experiencias');
Route::post('/get_causa','VacantesController@get_causas');
Route::post('/save_vacante','VacantesController@save_vacantes');
Route::post('/get_prestacion','VacantesController@get_prestaciones');
Route::get('/usuarios','UsuariosController@index');
Route::post('/get_usuario','UsuariosController@get_usuarios');
Route::post('/get_emp','UsuariosController@get_emps');
Route::post('/save_usuario','UsuariosController@save_usuarios');
Route::post('update_usuario/{id}','UsuariosController@update_usuarios');
Route::post('destroy_usuario/','UsuariosController@destroy_usuarios');
Route::get('/reporte1','VacantesController@reporte_vacantes');
Route::get('/reporte2','VacantesController@reporte_vacantes_municipio');
Route::get('/convocatorias','ConvocatoriasController@index');
Route::post('/get_convocatoria','ConvocatoriasController@get_convocatorias');
Route::post('/save_convocatoria','ConvocatoriasController@save_convocatorias');
Route::post('update_convocatoria/{id}','ConvocatoriasController@update_convocatorias');
Route::post('destroy_convocatoria/','ConvocatoriasController@destroy_convocatorias');
Route::get('/galerias','GaleriasController@index');
Route::post('/get_galeria','GaleriasController@get_galerias');
Route::get('/get_gals','GaleriasController@get_galerias');
Route::post('/save_galeria','GaleriasController@save_galerias');
Route::post('get_empresas_admin','VacantesController@get_empresas');
// Rutas del sitio
Route::get('/buscar','SitioController@search');
Route::get('/buscarvacantes','SitioController@buscarvacante');
Route::get('/inicio','SitioController@index');
Route::get('/contactanos','SitioController@contacto');
Route::get('/directorio','SitioController@directorios');
Route::post('save_aplicaciones','AplicacionesVacantesController@save_aplicacion');
Route::get('/aplicaciones','AplicacionesVacantesController@index');
Route::post('/get_aplicacion','AplicacionesVacantesController@get_aplicaciones');
Route::post('/mails','SitioController@mail');
Route::post('/descartar_aplicacion','AplicacionesVacantesController@descartar_aplicaciones');
Route::post('/reclutar_aplicacion','AplicacionesVacantesController@reclutar_aplicaciones');
Route::post('/disponible_aplicacion','AplicacionesVacantesController@disponible_aplicaciones');
Route::get('/giras_alcaldesa','GirasAlcaldesaController@index');
Route::post('/get_vacante_giras','GirasAlcaldesaController@get_vacantes');
Route::get('/get_numero_vacantes','VacantesController@get_numero_vacante');
