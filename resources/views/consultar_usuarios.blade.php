@extends('index') @section('titulo')
<h1>
	Gestión de Usuario de Administrador
</h1> @stop @section('contenido') {{-- Aquí va todo el contenido relacionado con la página actual --}}
<div class="col-xs-12">
    <div class="box box-success box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Usuarios del Sistema</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Username</th>
                        <th>E-mail</th>
                        <th>Habilitado</th>
                        <th>Rol</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr @if(!$user->estado)class="danger"@endif>
                       <td>{{$user->nombre}}</td>
                       <td>{{$user->apellido_paterno}}</td>
                       <td>{{$user->apellido_materno}}</td>
                       <td>{{$user->username}}</td>
                       <td>{{$user->email}}</td>
                       <td>@if($user->estado)<span class="text-green"><i class="fa fa-check-circle" aria-hidden="true"></i></span>@else<span class="text-red"><i class="fa fa-ban" aria-hidden="true"></i></span>@endif</td>
                       <td>{{$user->role}}</td>
                       <td>
                           <a class="btn btn-xs btn-warning" href="{{url('/usuarios/editar')}}/{{$user->id}}" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                       </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="text-center">
    {{$users->links()}}
</div>
@stop @section('scripts')
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@stop
