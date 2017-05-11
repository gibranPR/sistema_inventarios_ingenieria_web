@extends('index')

@section('titulo')
<h2>
	Consulta de Clientes

		<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
	</a>
</h2>
@stop

@section('contenido')
<div class="col-xs-12">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Edad</th>
				<th>Sexo</th>
				<th>Empresa</th>
				<th>Correo</th>
				<th>
					<a href="{{url('/registrarClientes')}}" class="btn btn-success btn-xs">Registrar</a>
				</th>
			</tr>
		</thead>
		<tbody>
		@foreach($clientes as $a)
			<tr>
				<td>{{$a->id}}</td>
				<td>{{$a->nombre}}</td>
				<td>{{$a->edad}}</td>
				<td>
					@if($a->sexo==0)
					Femenino
					@else
					Masculino
					@endif
				</td>
				
				<td>{{$a->correo}}</td>
				<td>
					<a href="{{url('/editarCliente')}}/{{$a->id}}" class="btn btn-xs btn-primary">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal{{$a->id}}">
					  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</td>
			</tr>
		<!-- Modal -->
		<div class="modal fade" id="modal{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">¿Deseas eliminar al cliente ?</h4>
		      </div>
		      <div class="modal-body">
		        ¡Una ves eliminado el cliente ya no podras recuperarlo!
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		        <a href="{{url('/eliminarCliente')}}/{{$a->id}}" class="btn btn-danger">Eliminar</a>
		      </div>
		    </div>
		  </div>
		</div>
		@endforeach
	</table>
	<div class="text-center">
		{{$clientes->links()}}
	</div>
</div>
@stop
