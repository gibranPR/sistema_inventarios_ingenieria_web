<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cliente;
use App\Empresa;
use DB;

class ClientesController extends Controller
{
  public function registrarClientes(){
    return view('registrar_cliente');
  }

  public function guardarCliente(Request $datos){
    $cliente= new Cliente();
    $cliente->nombre=$datos->input('nombre');
    $cliente->edad=$datos->input('edad');
    $cliente->sexo=$datos->input('sexo');
    $cliente->empresa=$datos->input('empresa');
    $cliente->estado=$datos->input('estado');
    $cliente->email=$datos->input('email');
    $cliente->save();
    return Redirect('/clientes');
  }
  
  public function consultarClientes() {
      $clientes=DB::table('clientes')
          ->paginate(10);

      return view('consultar_clientes', compact('clientes'));
  }

  public function editarCliente($id){
      $cliente=Cliente::find($id);
      return view('editar_cliente', compact('cliente'));
  }

  public function actualizarCliente(Request $datos){
      $cliente=Cliente::find($datos->input('id'));
      $cliente->nombre=$datos->input('nombre');
      $cliente->edad=$datos->input('edad');
      $cliente->sexo=$datos->input('sexo');
      $cliente->empresa=$datos->input('empresa');
      $cliente->estado=$datos->input('estado');
      $cliente->email=$datos->input('email');
      $cliente->save();

      return Redirect('/clientes');
  }
}
