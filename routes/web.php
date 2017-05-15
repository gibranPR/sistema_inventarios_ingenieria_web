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
    	return view('home');
	});

	// Clientes - Octavio
	Route::get('/clientes', 'ClientesController@consultarClientes');
	Route::get('/clientes/editar/{id}', 'ClientesController@editarCliente');
	Route::get('/clientes/registrar', 'ClientesController@registrarClientes');
	Route::post('/clientes/registrar', 'ClientesController@guardarCliente');
	Route::post('/clientes/actualizar', 'ClientesController@actualizarCliente');

	// Solo para admins
	Route::group(['middleware' => ['admin']], function () {
	// Usuarios - Iván
		Route::get('/usuarios', 'UsuariosController@consultarUsuarios');
		Route::get('/usuarios/editar/{user_id}', 'UsuariosController@editarUsuario');
		Route::get('/usuarios/registrar', 'UsuariosController@vistaRegistrarUsuario');
		Route::post('/usuarios/registrar', 'UsuariosController@registrarUsuario');
		Route::post('/usuarios/actualizar', 'UsuariosController@actualizarUsuario');
	});
});

Auth::routes();
