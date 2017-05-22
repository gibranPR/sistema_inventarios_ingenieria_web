@extends('index')

@section('titulo')
	<h2>Registro de Producto</h2>
	<hr>
@stop

@section('contenido')
<div class="container">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Agregar Producto</h3>
            </div>
			<form action="{{url('/guardaProducto')}}" method="POST">
			{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input name="nombre" type="text" placeholder="Teclea nombre" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="categoria">Categoría:</label>
						<input name="categoria" type="text" placeholder="Teclea Categoría" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="existencia">Existencia:</label>
						<input name="existencia" type="number" placeholder="Teclea la existencia" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="estado">Estado del producto:</label>
						<select name="estado" class="form-control" required>
			                    <option value="1">Activo</option>
			                    <option value="0">Inactivo</option>
			            </select>
					</div>
				</div>
				<div class="box-footer">	
					<a href="{{url('/consultarProductos')}}" class="btn btn-danger">Cancelar</a>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
    </div>
</div>
@stop
