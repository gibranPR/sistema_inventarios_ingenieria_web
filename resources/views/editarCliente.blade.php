@extends('index')

@section('titulo')
	<h2>Editar Cliente</h2>
	<hr>
@stop

@section('contenido')
<div class="col-xs-12">
	<form action="{{url('/actualizarCliente')}}/{{$cliente->id}}" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label for="nombre">Nombre:</label>
			<input name="nombre" type="text" placeholder="Teclea el nombre" class="form-control" value="{{$cliente->nombre}}" required>
		</div>
		<div class="form-group">
			<label for="edad">Edad:</label>
			<input name="edad" type="number" placeholder="Teclea la Edad" class="form-control" value="{{$cliente->edad}}" required>
		</div>
		<div class="form-group">
			<label for="sexo">Sexo:</label>
			<select name="sexo" class="form-control" required>
				<option value="">Selecciona el sexo</option>
				@if($cliente->sexo==0)
				<option value="0" selected>Femenino</option>
				<option value="1">Masculino</option>
				@else
				<option value="0">Femenino</option>
				<option value="1" selected>Masculino</option>
				@endif
			</select>
		</div>
		<div class="form-group">
			<label for="correo">Empresa:</label>
			<input name="empresa" type="text" placeholder="Teclea la nueva empresa" class="form-control" value="{{$cliente->empresa}}" required>
		</div>
		<div class="form-group">
			<label for="correo">Correo:</label>
			<input name="correo" type="email" placeholder="Teclea el e-mail" class="form-control" value="{{$cliente->correo}}" required>
		</div>
		<button type="submit" class="btn btn-primary">Actualizar</button>
		<a href="{{url('/consultarClientes')}}" class="btn btn-danger">Cancelar</a>
	</form>
</div>
@stop
