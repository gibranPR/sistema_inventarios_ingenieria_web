<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsuariosController extends Controller
{
    public function consultarUsuarios() {
    	$users = User::select('id', 'nombre', 'apellido_paterno', 'apellido_materno', 'username', 'email', 'estado', 'role')->orderBy('username')->paginate(10);
    	return view('consultar_usuarios', compact('users'));
    }

    public function editarUsuario($user_id) {
    	$user = User::find($user_id);
    	return view('editar_usuarios', compact('user'));
    }

    public function actualizarUsuario(Request $datos) {
    	$input = $datos->input();
    	$user = User::find($input['id']);
    	// dd($input);

    	$user->nombre=$input['nombre'];
    	$user->apellido_paterno=$input['apellido_paterno'];
    	$user->apellido_materno=$input['apellido_materno'];
    	$user->email=$input['email'];
    	$user->estado=$input['estado'];
    	$user->role=$input['role'];

    	if ($input['password']) {
    		$user->password=bcrypt($input['password']);
    	}

    	$user->save();

		return Redirect('/usuarios');
    }
}
