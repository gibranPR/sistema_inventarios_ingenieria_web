@extends('index') @section('titulo')
<h1>
Visor de Tickets
</h1> @stop @section('contenido') {{-- Aquí va todo el contenido relacionado con la página actual --}}
<div class="col-xs-12">
    <div class="box box-danger box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Tickets Generados</h3>&nbsp;&nbsp;
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
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Usuario</th>
                        <th>Cliente</th>
                        <th>Fecha de creación</th>
                        <th>Última actualización</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <td ng-switch="'{{$ticket->tipo}}'">
                            <i ng-switch-when="salida" class="fa fa-arrow-right text-red" aria-hidden="true"></i>
                            <i ng-switch-when="entrada" class="fa fa-arrow-left text-green" aria-hidden="true"></i>
                        </td>
                        <td ng-switch="'{{$ticket->estado_proceso}}'">
                            <i ng-switch-when="nuevo" class="fa fa-lightbulb-o text-orange" aria-hidden="true"></i>
                            <i ng-switch-when="procesando" class="fa fa-forward text-blue" aria-hidden="true"></i>
                            <i ng-switch-when="pausado" class="fa fa-pause-circle text-teal" aria-hidden="true"></i>
                            <i ng-switch-when="cancelado" class="fa fa-ban text-red" aria-hidden="true"></i>
                            <i ng-switch-when="terminado" class="fa fa-check-circle text-green" aria-hidden="true"></i>
                        </td>
                        <td>{{$ticket->user->username}}</td>
                        <td>{{$ticket->cliente->nombre}}</td>
                        <td>{{$ticket->created_at}}</td>
                        <td>{{$ticket->updated_at}}</td>
                        <td>
                            <a href="{{url('/tickets/ver')}}/{{$ticket->id}}" class="btn btn-xs btn-warning"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" title="Ver Ticket"></i></a> @if($ticket->estado_proceso != 'cancelado' && $ticket->estado_proceso != 'terminado')
                            <a href="#" class="btn btn-xs btn-primary"><i class="fa fa-cogs" aria-hidden="true" data-toggle="tooltip" title="Cambiar Estado" ng-click="main.abrirModal('#modal-cambiar-estado', {'ticket_id': '{{$ticket->id}}', 'estado_proceso': '{{$ticket->estado_proceso}}'})"></i></a> @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="text-center">
    {{$tickets->links()}}
</div>
<div class="col-md-offset-9 col-md-3 col-xs-12">
    <div class="box box-success box-solid collapsed-box">
        <div class="box-header with-border">
            <h3 class="box-title">Leyenda</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ícono</th>
                        <th>Significado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><i class="fa fa-arrow-right text-red" aria-hidden="true"></i></td>
                        <td>Salida de Producto</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-arrow-left text-green" aria-hidden="true"></i></td>
                        <td>Entrada de Producto</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-lightbulb-o text-orange" aria-hidden="true"></i></td>
                        <td>Nueva Entrada</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-forward text-blue" aria-hidden="true"></i></td>
                        <td>Entrda en Proceso</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-pause-circle text-teal" aria-hidden="true"></i></td>
                        <td>Entrada en Pausa</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-ban text-red" aria-hidden="true"></i></td>
                        <td>Entrada Cancelada</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-check-circle text-green" aria-hidden="true"></i></td>
                        <td>Entrada Finalizada</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal modal-danger" id="modal-cambiar-estado" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('/tickets/estado')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h4 class="modal-title">Cambiar estado de ticket</h4>
                </div>
                <div class="modal-body">
                    <p>Estado actual del ticket #@{{main.identificador_modal.ticket_id}}: "@{{main.identificador_modal.estado_proceso}}"</p>
                    <input type="hidden" name="ticket_id" value="@{{main.identificador_modal.ticket_id}}">
                    <div class="form-group">
                        <label for="nuevo_estado">Nuevo Estado</label ng-init="main.nuevo_estado=undefined">
                        <select name="nuevo_estado" id="nuevo_estado" required class="form-control" ng-model="main.nuevo_estado">
                            <option value="" selected disabled>Nuevo estado</option>
                            <option ng-if="main.identificador_modal.estado_proceso == 'nuevo' || main.identificador_modal.estado_proceso == 'pausado'" value="procesando">Procesando</option>
                            <option ng-if="main.identificador_modal.estado_proceso == 'nuevo' || main.identificador_modal.estado_proceso == 'procesando'" value="pausado">Pausado</option>
                            <option value="cancelado">Cancelado</option>
                            <option ng-if="main.identificador_modal.estado_proceso == 'procesando'" value="terminado">Terminado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comentario">Comentario del cambio de estado</label>
                        <textarea name="comentario" id="comentario" class="form-control" rows="4" placeholder="Comentario" maxlength="500" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" ng-click="main.confirmar=false">Cerrar</button>
                    <button ng-if="main.confirmar===true" type="submit" class="btn btn-primary">Aceptar</button>
                    <a href="#" class="btn btn-outline" ng-click="main.confirmar=true">Confirmar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop @section('css')
<link rel="stylesheet" href="{{asset('bibliotecas/AdminLTE/plugins/select2/select2.min.css')}}"> @stop @section('scripts')
<script src="{{asset('bibliotecas/AdminLTE/plugins/select2/select2.min.js')}}"></script>
<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $('#nuevo_estado').select2();
});
</script>
@stop
