@extends('index') @section('titulo')
<h1>
    Visualización del ticket #{{$ticket->id}} de {{$ticket->tipo}}
</h1> @stop @section('contenido') {{-- Aquí va todo el contenido relacionado con la página actual --}}
<div class="col-md-6 col-xs-12">
    <div class="box box-solid box-primary collapsed-box">
        <div class="box-header with-border">
            <i class="fa fa-users"></i>
            <h3 class="box-title">Información del usuario que creó el ticket</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <dl class="dl-horizontal">
                <dt>Username</dt>
                <dd>{{$ticket->user->username}}</dd>
                <dt>Nombre</dt>
                <dd>{{$ticket->user->nombre}} {{$ticket->user->apellido_paterno}} {{$ticket->user->apellido_materno}}</dd>
                <dt>Correo</dt>
                <dd>{{$ticket->user->email}}</dd>
            </dl>
        </div>
    </div>
</div>
<div class="col-md-6 col-xs-12">
    <div class="box box-solid box-primary collapsed-box">
        <div class="box-header with-border">
            <i class="fa fa-building-o"></i>
            <h3 class="box-title">Información del Cliente</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <dl class="dl-horizontal">
                <dt>Nombre del encargado</dt>
                <dd>{{$ticket->cliente->nombre}}</dd>
                <dt>Empresa</dt>
                <dd>{{$ticket->cliente->empresa}}</dd>
                <dt>Correo</dt>
                <dd>{{$ticket->cliente->email}}</dd>
            </dl>
        </div>
    </div>
</div>
<div class="col-md-12 col-xs-12">
    <div class="box box-solid box-success">
        <div class="box-header with-border">
            <i class="fa fa-ticket"></i>
            <h3 class="box-title">Información del Ticket</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="col-md-6 no-padding">
                <dl class="dl-horizontal">
                    <dt>Fecha de creación</dt>
                    <dd>{{$ticket->created_at}}</dd>
                    <dt>Número de ticket</dt>
                    <dd>{{$ticket->id}}</dd>
                    <dt>Estado del ticket</dt>
                    <dd ng-switch="'{{$ticket->estado_proceso}}'">
                        <span ng-switch-when="nuevo"><i class="fa fa-lightbulb-o text-orange" aria-hidden="true"></i> Nuevo</span>
                        <span ng-switch-when="procesando"><i class="fa fa-forward text-blue" aria-hidden="true"></i> Procesando</span>
                        <span ng-switch-when="pausado"><i class="fa fa-pause-circle text-teal" aria-hidden="true"></i> En Pausa</span>
                        <span ng-switch-when="cancelado"><i class="fa fa-ban text-red" aria-hidden="true"></i> Cancelado</span>
                        <span ng-switch-when="terminado"><i class="fa fa-check-circle text-green" aria-hidden="true"></i> Terminado</span>
                    </dd>
                </dl>
            </div>
            <div class="col-md-6 no-padding">
                <dl class="dl-horizontal">
                    <dt>Fecha de actualización</dt>
                    <dd>{{$ticket->updated_at}}</dd>
                    <dt>Comentario</dt>
                    <dd>{{$ticket->comentario}}</dd>
                    <dt>Tipo de ticket</dt>
                    <dd ng-switch="'{{$ticket->tipo}}'">
                        <span ng-switch-when="salida"><i class="fa fa-arrow-right text-red" aria-hidden="true"></i> Salida</span>
                        <span ng-switch-when="entrada"><i class="fa fa-arrow-left text-green" aria-hidden="true"></i> Entrada</span>
                    </dd>
                </dl>
            </div>
        </div>
        @if($ticket->estado_proceso != 'cancelado' && $ticket->estado_proceso != 'terminado')
        <div class="box-footer">
            <a href="#" class="btn btn-danger" ng-click="main.abrirModal('#modal-cambiar-estado', {'ticket_id': '{{$ticket->id}}', 'estado_proceso': '{{$ticket->estado_proceso}}'})"><i class="fa fa-cogs" aria-hidden="true"></i> Cambiar Estado del Ticket</a>
        </div>
        @endif
    </div>
</div>
<div class="col-md-12 col-xs-12">
    <div class="box box-solid box-warning">
        <div class="box-header with-border">
            <i class="fa fa-list-ul"></i>
            <h3 class="box-title">Productos del ticket</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ticket->producto as $producto)
                    <tr>
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->pivot->cantidad}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <ul class="timeline" ng-init="main.historial_ticket={{$historial_ticket}}">
            <li class="time-label" ng-repeat-start="historia in main.historial_ticket">
                <span class="bg-red">
                        @{{main.fechaTimestamp(historia.created_at) | date}}
                    </span>
            </li>
            <li ng-repeat-end ng-switch="historia.estado_actual">
                <i ng-switch-when="nuevo" class="fa fa-lightbulb-o bg-orange"></i>
                <i ng-switch-when="procesando" class="fa fa-forward bg-blue"></i>
                <i ng-switch-when="pausado" class="fa fa-pause-circle bg-teal"></i>
                <i ng-switch-when="cancelado" class="fa fa-ban bg-red"></i>
                <i ng-switch-when="terminado" class="fa fa-check-circle bg-green"></i>
                <i ng-switch-default class="fa fa-refresh bg-green"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> @{{main.fechaTimestamp(historia.created_at) | date: 'HH:mm:ss'}}</span>
                    <h3 class="timeline-header"><a href="#">@{{historia.usuario}}</a> cambió ticket de "@{{historia.estado_anterior}}" a "@{{historia.estado_actual}}"</h3>
                    <div class="timeline-body">
                        @{{historia.comentario}}
                    </div>
                </div>
            </li>
            <li>
                <i class="fa fa-clock-o bg-gray"></i>
            </li>
        </ul>
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
@stop
