<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Producto;
use App\Ticket;
use App\TicketProducto;
use DB;

class TicketsController extends Controller
{
    public function consultarTickets() {
    	$tickets = Ticket::with('user', 'cliente')->orderBy('created_at', 'desc')->paginate(10);

    	return view('consultar_tickets', compact('tickets'));
    }

    public function verTicket($ticket_id) {
        $ticket = Ticket::with('user', 'cliente', 'producto')->where('id', $ticket_id)->get()[0];

        return view('ver_ticket', compact('ticket'));
    }

    public function nuevoTicketEntrada() {
        return $this->nuevoTicket('entrada');
    }

    public function nuevoTicketSalida() {
        return $this->nuevoTicket('salida');
    }

    private function nuevoTicket($tipo) {
    	$clientes=Cliente::select('id', 'nombre', 'empresa')->where('estado', '=', '1')->orderBy('nombre')->get();

    	$productos=Producto::select('id', 'nombre', 'existencia')->where([['activo', '=', '1'], ['existencia', '>', '0']])->orderBy('nombre')->get();

    	return view('crear_ticket', compact('clientes', 'productos', 'tipo'));
    }

    public function crearTicket(Request $datos) {
        switch($datos->input('tipo')) {
            case 'salida':
                return $this->crearTicketSalida($datos);
                break;
            case 'entrada':
                return $this->crearTicketEntrada($datos);
                break;

        }
    }

    private function crearTicketEntrada(Request $datos) {
        // Bloquea las tablas
        DB::beginTransaction();
        try {
            // Crea un nuevo tiwcket y lo guarda
            $ticket = new Ticket();
            $ticket->comentario = $datos->input('comentario');
            $ticket->user_id = $datos->input('user_id');
            $ticket->cliente_id = $datos->input('cliente_id');
            $ticket->tipo = 'entrada';
            $ticket->save();

            $ids = $datos->input('productos_ids');
            $cantidades = $datos->input('productos_cantidades');
            $ilen = count($ids);
            for ($i = 0; $i < $ilen; $i++) {
                // Le resta la cantidad de los productos a la existencia de cada uno
                // A consideración, pienso que la cantidad se tiene que aumentar al finalizar el ticket de entrada.
                // $producto = Producto::find($ids[$i]);
                // $producto->existencia = $producto->existencia + $cantidades[$i];
                // $producto->save();

                $ticket_producto =  new TicketProducto();
                $ticket_producto->cantidad = $cantidades[$i];
                $ticket_producto->Producto_id = $ids[$i];
                $ticket_producto->ticket_id = $ticket->id;
                $ticket_producto->save();
            }
            
            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
        }

        if ($success) {
            return Redirect('/tickets');
        }
    }

    private function crearTicketSalida(Request $datos) {
        // Bloquea las tablas
        DB::beginTransaction();
        try {
            // Crea un nuevo tiwcket y lo guarda
            $ticket = new Ticket();
            $ticket->comentario = $datos->input('comentario');
            $ticket->user_id = $datos->input('user_id');
            $ticket->cliente_id = $datos->input('cliente_id');
            $ticket->save();

            $ids = $datos->input('productos_ids');
            $cantidades = $datos->input('productos_cantidades');
            $ilen = count($ids);
            for ($i = 0; $i < $ilen; $i++) {
                // Le resta la cantidad de los productos a la existencia de cada uno
                $producto = Producto::find($ids[$i]);
                $producto->existencia = $producto->existencia - $cantidades[$i];
                $producto->save();

                $ticket_producto =  new TicketProducto();
                $ticket_producto->cantidad = $cantidades[$i];
                $ticket_producto->Producto_id = $ids[$i];
                $ticket_producto->ticket_id = $ticket->id;
                $ticket_producto->save();
            }
            
            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
        }

        if ($success) {
            return Redirect('/tickets');
        }
    }
}
