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
        {{-- <div class="box-footer">
        </div> --}}
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
@stop
