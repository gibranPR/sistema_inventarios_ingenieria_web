<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Producto;
class ProductosController extends Controller
{
	  public function consultarProductos() {
	   	$productos = Producto::select('id','nombre','costo','categoria','existencia','activo')->paginate(10);
	   	return view('consultarProductos', compact('productos'));
	  }

}
