@extends('index')

@section('titulo')
<h2>
	Consulta de Productos

		
	</a>
</h2>
@stop

@section('contenido')
<div class="box box-success box-solid">
	<div class="box-header">
    	<h3 class="box-title">Productos</h3>   
    	<a  href="{{url('/registrarProducto')}}" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Agregar"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span>Agregar Producto</a>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>         
    </div>
            <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
		<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Costo</th>
				<th>Categoria</th>
				<th>Existencia</th>
				<th>Estado</th>
				<th>
					
				</th>
			</tr>
		</thead>
		<tbody>
		@foreach($productos as $a)
			<tr @if(!$a->estado)class="danger"@endif>
				<td>{{$a->id}}</td>
				<td>{{$a->nombre}}</td>
				<td>{{$a->costo}}</td>
				<td>{{$a->categoria}}</td>
				<td>{{$a->existencia}}</td>
				<td>@if($a->estado)<span class="text-green"><i class="fa fa-check-circle" aria-hidden="true"></i></span>@else<span class="text-red"><i class="fa fa-ban" aria-hidden="true"></i></span>@endif</td>
				<td>
				@if($a->estado)
					<a href="{{url('/editarProductos')}}/{{$a->id}}" class="btn btn-xs btn-primary">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal{{$a->id}}">
					  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				@else
				<a href="{{url('/editarProductos')}}/{{$a->id}}" class="btn btn-xs btn-primary">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
				@endif	
				</td>
			</tr>
		<!-- Modal -->
		<div class="modal fade" id="modal{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">¿Deseas colocar el producto como inactivo?</h4>
		      </div>
		      <div class="modal-body">
		        Una vez inhabilitado el producto no podrás utilizarlo.
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		        <a href="{{url('/disableProductos')}}/{{$a->id}}" class="btn btn-danger">Inactivo</a>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</div>
		@endforeach
	</table>
	<div class="text-center">
		{{$productos->links()}}
	</div>
</div>
@stop
