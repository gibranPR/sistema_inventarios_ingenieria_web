<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cliente;
use App\Producto;
use App\Ticket;
use App\TicketProducto;
use App\HistorialTicket;
use DB;

class TicketsController extends Controller
{
    public function consultarTickets() {
    	$tickets = Ticket::with('user', 'cliente')->orderBy('created_at', 'desc')->paginate(10);

    	return view('consultar_tickets', compact('tickets'));
    }

    public function verTicket($ticket_id) {
        $ticket = Ticket::with('user', 'cliente', 'producto')->where('id', $ticket_id)->get()[0];

        $historial_ticket = HistorialTicket::where('ticket_id', '=', $ticket_id)->orderBy('created_at', 'desc')->get();

        return view('ver_ticket', compact('ticket', 'historial_ticket'));
    }

    public function nuevoTicketEntrada() {
        return $this->nuevoTicket('entrada');
    }

    public function nuevoTicketSalida() {
        return $this->nuevoTicket('salida');
    }

    public function cambiarEstado(Request $datos) {
        DB::beginTransaction();


        try {

            $ticket = Ticket::find($datos->input('ticket_id'));

            $this->nuevoHistorialTicket($ticket->estado_proceso, $datos->input('nuevo_estado'), $datos->input('comentario'), $datos->input('ticket_id'));

            $ticket->estado_proceso = $datos->input('nuevo_estado');

            $ticket->save();

            if (($ticket->tipo == 'entrada' && $datos->input('nuevo_estado') == 'terminado') ||
                ($ticket->tipo == 'salida' && $datos->input('nuevo_estado') == 'cancelado')) {
                $productos = TicketProducto::where('ticket_id', '=', $ticket->id)->get();
                $ilen = count($productos);
                for ($i = 0; $i < $ilen; $i++) {
                    $producto = Producto::find($productos[$i]->producto_id);
                    $producto->existencia = $producto->existencia + $productos[$i]->cantidad;
                    $producto->save();
                }
            }

            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
        }

        if ($success) {

        }

        // return Redirect('/tickets');
        return redirect()->back();
    }

    private function nuevoTicket($tipo) {
    	$clientes=Cliente::select('id', 'nombre', 'empresa')->where('estado', '=', '1')->orderBy('nombre')->get();

    	$productos=Producto::select('id', 'nombre', 'existencia')->where([['estado', '=', '1'], ['existencia', '>', '0']])->orderBy('nombre')->get();

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

            $this->nuevoHistorialTicket(null, 'nuevo', 'Ticket de entrada creado.', $ticket->id);
            
            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
        }

        if ($success) {

        }

        return Redirect('/tickets');
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

            $this->nuevoHistorialTicket(null, 'nuevo', 'Ticket de salida creado.', $ticket->id);
            
            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
        }

        if ($success) {

        }

        return Redirect('/tickets');
    }

    private function nuevoHistorialTicket($estado_anterior, $estado_actual, $comentario, $ticket_id) {
        $historial_ticket = new HistorialTicket();
        $historial_ticket->estado_anterior = $estado_anterior;
        $historial_ticket->estado_actual = $estado_actual;
        $historial_ticket->comentario = $comentario;
        $historial_ticket->usuario = Auth::user()->username;
        $historial_ticket->ticket_id = $ticket_id;
        $historial_ticket->save();
    }
}
