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

Route::get('/', function () {
    return view('index');
});
//route::resource('cliente','ClienteController');

Route::get('/registrarClientes', 'clienteController@registrarClientes');

//Route::get('/registrarCliente', 'clienteController@registrarClientes');


Route::get('/consultarClientes', 'clienteController@consultarClientes');

Route::post('/guardarCliente', 'clienteController@guardarCliente');

Route::get('/eliminarCliente/{id}', 'clienteController@eliminarCliente');

Route::get('editarCliente/{id}', 'clienteController@editarCliente');

Route::post('actualizarCliente/{id}', 'clienteController@actualizarCliente');

Route::get('clientesPDF', 'clienteController@clientesPDF');

Route::get('empresaClientesPDF/{id}', 'clienteController@empresaClientesPDF');

//Rutas del grupo de 14-15

Route::get('/menu', function () {
    return view('menu/index');
});
