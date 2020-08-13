<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
//rutas correspondientes a actividades que no requieren de un login
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::post('/olvidoClave', 'EstudianteController@forwardingPass');
Route::post('/reiniciarPassword','PasswordResetRequestController@sendPasswordResetEmail','as','resetearPass');
Route::post('/change-password', 'ChangePasswordController@passwordResetProcess');
Route::get('/documentos', 'TipodocumentoController@index');






Route::post('/listarRolesP', 'EstudianteController@prueba');
//rutas correspondientes a actividades de usuarios que solo requieren estar logueados
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post('/logout', 'AuthController@logout');
    Route::post('/data', 'AuthController@getAuthUser');
    Route::post('/permission', 'AuthController@getPermission');

    //estudianteescuela
    Route::get('/EstudianteEscuela/listar/{id}', 'EstudianteEscuelaController@index');

    //rol
    Route::get('/Rol/listar', 'RolController@index');

    //tesis
    Route::get('/Tesis/listarTesisEstudianteEscuela/{id}', 'TesisController@index');

    /*Route::get('Operador/getAllOperador','OperadorController@index')->name('getAllOperador');
	Route::post('Operador/createOperador','OperadorController@store')->name('createOperador');
	Route::get('Operador/getOperador/{id}','OperadorController@show')->name('getOperador');
	Route::put('Operador/updateOperador/{id}','OperadorController@update')->name('updateOperador');
	Route::delete('Operador/delete/{id}','OperadorController@destroy')->name('deleteOperador');*/


});
//rutas correspondientes a actividades que requieren de un logueo y permiso a ciertas actividades
Route::get('Estudiante/listar', ['middleware' => 'auth.permission:estudiante.listar', 'uses' => 'EstudianteController@index', 'as' => 'EstudianteListar']);
Route::get('Estudiante/ver/{id}', ['middleware' => 'auth.permission:estudiante.ver', 'uses' => 'EstudianteController@show', 'as' => 'EstudianteVer']);
Route::delete('Estudiante/eliminar/{id}', ['middleware' => 'auth.permission:estudiante.eliminar', 'uses' => 'EstudianteController@destroy', 'as' => 'createOperador']);
Route::get('Estudiante/buscar', ['middleware' => 'auth.permission:estudiante.buscar', 'uses' => 'EstudianteController@getStudentPerName', 'as' => 'EstudianteBuscar']);
Route::put('Estudiante/editar/{id}', ['middleware' => 'auth.permission:estudiante.editar', 'uses' => 'EstudianteController@update', 'as' => 'EstudianteEditar']);
Route::post('Estudiante/crearEstudiante', ['middleware' => 'auth.permission:estudiante.crear', 'uses' => 'EstudianteController@store', 'as' => 'EstudianteCrear']);

//Escuela
Route::get('Escuela/Listar', ['middleware' => 'auth.permission:escuela.listar', 'uses' => 'EscuelaController@index', 'as' => 'EscuelaListar']);
Route::delete('Escuela/eliminar/{id}', ['middleware' => 'auth.permission:escuela.eliminar', 'uses' => 'EscuelaController@destroy', 'as' => 'EscuelaEliminar']);
Route::post('Escuela/crear', ['middleware' => 'auth.permission:escuela.crear', 'uses' => 'EscuelaController@store', 'as' => 'EscuelaCrear']);

//EstudianteEscuela
Route::post('EstudianteEscuela/crear', ['middleware' => 'auth.permission:estudianteescuela.crear', 'uses' => 'EstudianteEscuelaController@store', 'as' => 'EstudianteEscuelaCrear']);
Route::delete('EstudianteEscuela/eliminar/{id}', ['middleware' => 'auth.permission:estudianteescuela.eliminar', 'uses' => 'EstudianteEscuelaController@destroy', 'as' => 'EstudianteEscuelaEliminar']);


//Roles
Route::post('Rol/crear', ['middleware' => 'auth.permission:rol.crear', 'uses' => 'RolController@store', 'as' => 'RolCrear']);
Route::delete('Rol/eliminar/{id}', ['middleware' => 'auth.permission:rol.eliminar', 'uses' => 'RolController@destroy', 'as' => 'RolEliminar']);

//Rol Proceso
Route::get('Proceso/verRolProceso/{id}', ['middleware' => 'auth.permission:rolproceso.ver', 'uses' => 'ProcesoController@show', 'as' => 'RolProcesoVer']);
//Proceso
Route::get('Proceso/listarProceso', ['middleware' => 'auth.permission:proceso.listar', 'uses' => 'ProcesoController@verProcesos', 'as' => 'ProcesoVer']);
Route::post('Proceso/crearProceso', ['middleware' => 'auth.permission:proceso.crear', 'uses' => 'ProcesoController@store', 'as' => 'ProcesoCrear']);

//Actividad
Route::get('Proceso/verProcesoActividad/{idRolProceso}', ['middleware' => 'auth.permission:actividad.ver', 'uses' => 'RolActividadController@show', 'as' => 'ProcesoActividadVer']);

Route::get('Actividad/listarActividad/{id}', ['middleware' => 'auth.permission:actividad.listar', 'uses' => 'ActividadController@index', 'as' => 'listarActividad']);
Route::post('Actividad/crearActividad', ['middleware' => 'auth.permission:actividad.crear', 'uses' => 'ActividadController@store', 'as' => 'crearActividad']);

//Tesis
Route::post('Tesis/crear', ['middleware' => 'auth.permission:tesis.crear', 'uses' => 'TesisController@store', 'as' => 'TesisCrear']);
Route::delete('Tesis/eliminar/{id}', ['middleware' => 'auth.permission:tesis.eliminar', 'uses' => 'TesisController@destroy', 'as' => 'TesisEliminar']);


//TipoTesis

Route::get('TipoTesis/listar', ['middleware' => 'auth.permission:tipotesis.listar', 'uses' => 'TipoTesisController@index', 'as' => 'TipoTesisListar']);
Route::get('TipoTesis/ver/{id}', ['middleware' => 'auth.permission:tipotesis.ver', 'uses' => 'TipoTesisController@show', 'as' => 'TipoTesisVer']);
Route::delete('TipoTesis/eliminar/{id}', ['middleware' => 'auth.permission:tipotesis.eliminar', 'uses' => 'TipoTesisController@destroy', 'as' => 'TipoTesisEliminar']);
Route::get('TipoTesis/buscar', ['middleware' => 'auth.permission:tipotesis.buscar', 'uses' => 'TipoTesisController@getTipoTesisPerName', 'as' => 'TipoTesisBuscar']);
Route::put('TipoTesis/editar/{id}', ['middleware' => 'auth.permission:tipotesis.editar', 'uses' => 'TipoTesisController@update', 'as' => 'TipoTesisEditar']);
Route::post('TipoTesis/crearTipoTesis', ['middleware' => 'auth.permission:tipotesis.crear', 'uses' => 'TipoTesisController@store', 'as' => 'TipoTesisCrear']);



//Dictamen

Route::get('Dictamen/listar', ['middleware' => 'auth.permission:dictamen.listar', 'uses' => 'DictamenController@index', 'as' => 'DictamenListar']);
Route::get('Dictamen/ver/{id}', ['middleware' => 'auth.permission:dictamen.ver', 'uses' => 'DictamenController@show', 'as' => 'DictamenVer']);
Route::delete('Dictamen/eliminar/{id}', ['middleware' => 'auth.permission:dictamen.eliminar', 'uses' => 'DictamenController@destroy', 'as' => 'DictamenEliminar']);
Route::get('Dictamen/buscar', ['middleware' => 'auth.permission:dictamen.buscar', 'uses' => 'DictamenController@getDictamenPerName', 'as' => 'DictamenBuscar']);
Route::put('Dictamen/editar/{id}', ['middleware' => 'auth.permission:dictamen.editar', 'uses' => 'DictamenController@update', 'as' => 'DictamenEditar']);
Route::post('Dictamen/crearDictamen', ['middleware' => 'auth.permission:dictamen.crear', 'uses' => 'DictamenController@store', 'as' => 'DictamenCrear']);


//Jurado
Route::get('Jurado/listar', ['middleware' => 'auth.permission:jurado.listar', 'uses' => 'JuradoController@index', 'as' => 'JuradoListar']);
Route::get('Jurado/ver/{id}', ['middleware' => 'auth.permission:jurado.ver', 'uses' => 'JuradoController@show', 'as' => 'JuradoVer']);
Route::delete('Jurado/eliminar/{id}', ['middleware' => 'auth.permission:jurado.eliminar', 'uses' => 'JuradoController@destroy', 'as' => 'JuradoEliminar']);
Route::get('Jurado/buscar', ['middleware' => 'auth.permission:jurado.buscar', 'uses' => 'JuradoController@getJuradoPerId', 'as' => 'JuradoBuscar']);
Route::put('Jurado/editar/{id}', ['middleware' => 'auth.permission:jurado.editar', 'uses' => 'JuradoController@update', 'as' => 'JuradoEditar']);
Route::post('Jurado/crearJurado', ['middleware' => 'auth.permission:jurado.crear', 'uses' => 'JuradoController@store', 'as' => 'JuradoCrear']);