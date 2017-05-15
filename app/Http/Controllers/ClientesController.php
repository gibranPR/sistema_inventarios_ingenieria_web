<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cliente;
use App\Empresa;
use DB;

class ClientesController extends Controller
{
  public function registrarClientes(){
  return view('registrarcliente');
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
    return Redirect('/consultarClientes ');
  }
  //*********************************************
  public function consultarClientes() {
      $clientes=DB::table('clientes')
        //  ->join('empresas', 'clientes.id_empresa', '=', 'empresas.id')
          //->select('clientes.*', 'empresas.nombre AS empresa')
          //->select('clientes')
          ->paginate(10);

      return view('consultarClientes', compact('clientes'));
  }

  public function eliminarCliente($id) {
     $cliente=Cliente::find($id);
      $cliente->delete();

    return Redirect('/consultarClientes');
  }


  public function editarCliente($id){
      $cliente=Cliente::find($id);
      return view('editarCliente', compact('cliente'));
  }

  public function actualizarCliente(Request $datos, $id){
      $cliente=Cliente::find($id);
      $cliente->nombre=$datos->input('nombre');
      $cliente->edad=$datos->input('edad');
      $cliente->sexo=$datos->input('sexo');
      $cliente->empresa=$datos->input('empresa');
      $cliente->estado=$datos->input('estado');
      $cliente->email=$datos->input('email');
      $cliente->save();

      return Redirect('/consultarClientes');
  }

/*  public function clientesPDF(){
      $clientes=Cliente::all();
      $vista=view('clientesPDF', compact('clientes'));
      $dompdf=\App::make('dompdf.wrapper');
      $dompdf->loadHTML($vista);
      return $dompdf->stream('reporte.pdf');
  }

      public function empresaClientesPDF($id){
      $clientes=DB::table('clientes')
          ->where('id_empresa', '=', $id)
          ->get();
      $empresa=Empresa::find($id);
      $vista=view('empresaClientesPDF', compact('clientes', 'empresa'));
      $dompdf=\App::make('dompdf.wrapper');
      $dompdf->loadHTML($vista);
      return $dompdf->stream('lista.pdf');
  }*/
}
