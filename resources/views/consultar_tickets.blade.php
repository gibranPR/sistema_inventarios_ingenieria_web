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
                        <td  ng-switch="'{{$ticket->estado_proceso}}'">
                            <i ng-switch-when="nuevo" class="fa fa-lightbulb-o text-orange" aria-hidden="true"></i>
                            <i ng-switch-when="procesando" class="fa fa-forward text-blue" aria-hidden="true"></i>
                            <i ng-switch-when="cancelado" class="fa fa-ban text-red" aria-hidden="true"></i>
                            <i ng-switch-when="terminado" class="fa fa-check-circle text-green" aria-hidden="true"></i>
                        </td>
                        <td>{{$ticket->user->username}}</td>
                        <td>{{$ticket->cliente->nombre}}</td>
                        <td>{{$ticket->created_at}}</td>
                        <td>{{$ticket->updated_at}}</td>
                        <td>
                            <a href="#" class="btn btn-xs btn-warning"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" title="Ver Ticket"></i></a>
                            <a href="#" class="btn btn-xs btn-primary"><i class="fa fa-cogs" aria-hidden="true" data-toggle="tooltip" title="Cambiar Estado"></i></a>
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
<div class="row">
    <dif class="col-xs-6">
        <table class="table table-hover">
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
                    <td><i class="fa fa-ban text-red" aria-hidden="true"></i></td>
                    <td>Entrada Cancelada</td>
                </tr>
                <tr>
                    <td><i class="fa fa-check-circle text-green" aria-hidden="true"></i></td>
                    <td>Entrada Finalizada</td>
                </tr>
            </tbody>
        </table>
    </dif>
</div>
@stop @section('scripts')
<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@stop
