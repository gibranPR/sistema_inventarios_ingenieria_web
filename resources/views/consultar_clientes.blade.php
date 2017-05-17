@extends('index') @section('titulo')
<h1>
	Gestión de Clientes
</h1> @stop @section('contenido') {{-- Aquí va todo el contenido relacionado con la página actual --}}
<div class="col-xs-12">
    <div class="box box-success box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Clientes del Sistema</h3>&nbsp;&nbsp;
            <a href="{{url('/clientes/registrar')}}" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Agregar"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span>Agregar Clientes</a>
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
                        <th>Estado</th>
                        <th>E-mail</th>
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
                            @if($a->sexo==0) Femenino @else Masculino @endif
                        </td>
                        <td>{{$a->empresa}}</td>
                        <td>{{$a->estado}}</td>
                        <td>{{$a->email}}</td>
                        <td>
                            <a href="{{url('/clientes/editar')}}/{{$a->id}}" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editar">
                                <span class="fa fa-pencil-square-o" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>
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
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@stop
