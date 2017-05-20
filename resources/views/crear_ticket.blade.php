@extends('index') @section('titulo')
<h1>
    Creación de nuevo ticket de {{$tipo}} de producto.
</h1> @stop @section('contenido') {{-- Aquí va todo el contenido relacionado con la página actual --}}
<div class="col-xs-12">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Información del ticket</h3>
        </div>
        <form action="{{url('/tickets')}}" method="POST">
            {{ csrf_field() }}
            <div class="box-body">
                <input type="hidden" name="tipo" value="{{$tipo}}">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="form-group">
                    <label for="username">Usuario</label>
                    <input class="form-control" id="username" type="text" value="{{Auth::user()->username}}" required disabled>
                </div>
                <div class="form-group">
                    <label for="cliente_id">Cliente</label>
                    <select class="form-control" name="cliente_id" id="cliente_id" required>
                        <option value="" disabled selected>Seleccionar un cliente del listado</option>
                        @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->empresa}} - {{$cliente->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="comentario">Comentario del ticket</label>
                    <textarea name="comentario" id="comentario" class="form-control" rows="4" placeholder="Comentario" maxlength="500"></textarea>
                </div>
                <div class="form-group">
                    <label for="producto">Productos</label>
                    <div class="row">
                        <div class="col-xs-10">
                            <select class="form-control" id="producto" ng-model="main.ticket_producto">
                                <option value="" disabled selected>Seleccionar un producto del listado</option>
                                @foreach($productos as $producto)
                                <option value='{"id":{{$producto->id}}, "nombre":"{{$producto->nombre}}", "existencia": {{$producto->existencia}}}'>{{$producto->nombre}} - {{$producto->existencia}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-2">
                            <a href="#" ng-click="main.agregarProducto()" class="form-control btn btn-danger">Agregar</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Existencia</th>
                                <th>Cantidad</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="producto in main.ticket_productos">
                                <td>@{{producto.id}}</td>
                                <td>@{{producto.nombre}}</td>
                                <td>@{{producto.existencia}}</td>
                                <td>
                                    <input id="producto_cantidad_@{{$index}}" type="number" ng-model="producto.cantidad" min="1" @if($tipo=='salida' )max="@{{producto.existencia}}@endif">
                                </td>
                                <td>
                                    <a href="#" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar Elemento" ng-click="main.abrirModal('#modal-eliminar', $index)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                                <input type="hidden" name="productos_ids[@{{$index}}]" value="@{{producto.id}}" />
                                <input type="hidden" name="productos_cantidades[@{{$index}}]" value="@{{producto.cantidad}}" />
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{url('/usuarios')}}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success pull-right">Crear</button>
            </div>
        </form>
    </div>
</div>
<div class="modal modal-danger" id="modal-eliminar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Eliminar Elemento</h4>
            </div>
            <div class="modal-body">
                <p>¿Seguro que desea eliminar el elemento "@{{main.ticket_productos[main.identificador_modal].nombre}} de la lista?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline" ng-click="main.eliminarIndiceLista(main.ticket_productos, main.identificador_modal)" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@stop @section('css')
<link rel="stylesheet" href="{{asset('bibliotecas/AdminLTE/plugins/select2/select2.min.css')}}"> @stop @section('scripts')
<script src="{{asset('bibliotecas/AdminLTE/plugins/select2/select2.min.js')}}"></script>
<script type="text/javascript">
$(function() {
    $('#cliente_id').select2();
    $('#producto').select2();
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@stop
