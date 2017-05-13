@extends('index') @section('titulo')
<h1>
	Gestión de Clientes
</h1> @stop @section('contenido') {{-- Aquí va todo el contenido relacionado con la página actual --}}
<div class="col-xs-12">
    <div class="box box-success box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Clientes del Sistema</h3>&nbsp;&nbsp;
            <a href="{{url('/registrarClientes')}}" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Agregar"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span>Agregar Clientes</a>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body table-responsive no-padding">
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
												<a href="{{url('/editarCliente')}}/{{$a->id}}" class="btn btn-xs btn-warning">
													<span class="fa fa-pencil-square-o" aria-hidden="true"></span>
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


										</td>
									</tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="text-center">
    {{$clientes->links()}}
</div>
@stop @section('scripts')
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@stop
