<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Producto;
class ProductosController extends Controller
{
	  public function consultarProductos() {
	   	$productos = Producto::select('id','nombre','categoria','existencia','estado')->paginate(10);
	   	return view('consultarProductos', compact('productos'));
	  }
	  public function registrarProducto(Request $datos){
	    $productos= new Producto();
	    $productos->nombre=$datos->input('nombre');
	    $productos->categoria=$datos->input('categoria');
	    $productos->existencia=$datos->input('existencia');
	    $productos->estado=$datos->input('estado');
	    $productos->save();
	    return Redirect('/consultarProductos');
  	}
    public function vistaRegistrarProducto() {
      return view('registrarProducto');
    }
    public function editarProductos($id) {
    	$productos = Producto::find($id);
    	return view('editarProductos', compact('productos'));
    }
    public function actualizarProductos(Request $datos) {
    	$input = $datos->input();
    	$productos = Producto::find($input['id']);
    	$productos->nombre=$input['nombre'];
    	$productos->categoria=$input['categoria'];
    	$productos->existencia=$input['existencia'];
    	$productos->estado=$input['estado'];
    	$productos->save();
	   	return Redirect('/consultarProductos');
    }
    public function disableProducto($id) {
      $productos=Producto::find($id);
      $productos->estado='0';
      $productos->save();

      return Redirect('/consultarProductos');
    }
}
