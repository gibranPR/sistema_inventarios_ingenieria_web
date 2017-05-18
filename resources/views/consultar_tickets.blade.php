@extends('index') @section('titulo')
<h1>
Visor de Tickets
</h1> @stop @section('contenido') {{-- Aquí va todo el contenido relacionado con la página actual --}}
<div class="col-xs-12">
    <div class="box box-success box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Tickets Generados</h3>&nbsp;&nbsp;
            <a href="{{url('/usuarios/registrar')}}" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Agregar"><span><i class="fa fa-ticket" aria-hidden="true"></i></span>Crear Ticket</a>
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
                       <td>{{$ticket->tipo}}</td>
                       <td>{{$ticket->estado_proceso}}</td>
                       <td>{{$ticket->user->username}}</td>
                       <td>{{$ticket->cliente->nombre}}</td>
                       <td>{{$ticket->created_at}}</td>
                       <td>{{$ticket->updated_at}}</td>
                       <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="text-center">
    {{-- {{$users->links()}} --}}
</div>
@stop @section('scripts')
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@stop
