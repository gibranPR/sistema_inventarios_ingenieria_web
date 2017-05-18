<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	protected $table = 'tickets';

	public function user() {
		return $this->hasOne('App\User', 'id', 'user_id');
	}

	public function cliente() {
		return $this->hasOne('App\Cliente', 'id', 'cliente_id');
	}

	public function producto() {
		return $this->belongsToMany('App\Producto', 'ticket_producto');
	}

	public function ticket_producto() {
		return $this->hasMany('App\TicketProducto', 'ticket_id', 'id');
	}
}
