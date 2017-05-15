@extends('index')

@section('titulo')
	<h2>Registro de Producto</h2>
	<hr>
@stop

@section('contenido')
<div class="col-xs-12">
	<form action="{{url('/guardaProducto')}}" method="POST">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label for="nombre">Nombre:</label>
			<input name="nombre" type="text" placeholder="Teclea nombre" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="costo">Costo:</label>
			<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
				<input name="costo" type="number" placeholder="Teclea costo del producto" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label for="categoria">Categoría:</label>
			<input name="categoria" type="number" placeholder="Teclea Categoría" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="existencia">Existencia:</label>
			<input name="existencia" type="number" placeholder="Teclea la existencia" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="activo">Estatus del producto:</label>
			<select name="activo" class="form-control" required>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
            </select>
		</div>
		<button type="submit" class="btn btn-primary">Guardar</button>
		<a href="{{url('/consultarProductos')}}" class="btn btn-danger">Cancelar</a>
	</form>
</div>
@stop
