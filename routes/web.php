<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Solo para usuarios logueados
Route::group(['middleware' => 'auth'], function () {
	Route::get('/', function () {
    	return view('index');
	});

	// Hechas por Octavio
	Route::get('/registrarClientes', 'ClientesController@registrarClientes');
	Route::get('/consultarClientes', 'ClientesController@consultarClientes');
	Route::get('/editarCliente/{id}', 'ClientesController@editarCliente');
	Route::post('actualizarCliente/{id}', 'ClientesController@actualizarCliente');
	Route::post('/guardarCliente', 'ClientesController@guardarCliente');
	Route::get('/eliminarCliente/{id}', 'ClientesController@eliminarCliente');

	// Solo para admins
	Route::group(['middleware' => ['admin']], function () {
		Route::get('/usuarios', 'UsuariosController@consultarUsuarios');
		Route::get('/usuarios/editar/{user_id}', 'UsuariosController@editarUsuario');
		Route::get('/usuarios/registrar', 'UsuariosController@vistaRegistrarUsuario');
		Route::post('/usuarios/registrar', 'UsuariosController@registrarUsuario');
		Route::post('/usuarios/actualizar', 'UsuariosController@actualizarUsuario');
	});
});

Auth::routes();
