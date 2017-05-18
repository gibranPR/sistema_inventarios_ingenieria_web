<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Users;
use App\Producto;
use App\Ticket;
use App\TicketProducto;
use DB;

class TicketsController extends Controller
{
    public function consultarTickets() {
    	$tickets = Ticket::with('user', 'cliente')->get();

    	return view('consultar_tickets', compact('tickets'));
    }

    public function nuevoTicket() {
    	$clientes=Cliente::select('id', 'nombre')->where('estado', '=', '1')->orderBy('nombre')->get();

    	$productos=Producto::select('id', 'nombre', 'existencia')->where('activo', '=', '1')->orderBy('nombre')->get();

    	return view('crear_ticket', compact('clientes', 'productos'));
    }

    public function crearTicket(Request $datos) {

    	DB::beginTransaction();
    	try {
	    	$ticket = new Ticket();
			$ticket->comentario = $datos->input('comentario');
			$ticket->user_id = $datos->input('user_id');
			$ticket->cliente_id = $datos->input('cliente_id');
			$ticket->save();

			$ids = $datos->input('productos_ids');
			$cantidades = $datos->input('productos_cantidades');
			$ilen = count($ids);
			for ($i = 0; $i < $ilen; $i++) {
				$ticket_producto =  new TicketProducto();
    			$ticket_producto->cantidad = $cantidades[$i];
    			$ticket_producto->Producto_id = $ids[$i];
    			$ticket_producto->ticket_id = $ticket->id;
    			$ticket_producto->save();
			}
			
        	DB::commit();
        	$success = true;
    	} catch (\Exception $e) {
    		dd($e);
        	$success = false;
        	DB::rollback();
    	}

	    if ($success) {
      		return Redirect('/tickets');
    	} else {
	    	dd('No salió');
    	}
    }
}
