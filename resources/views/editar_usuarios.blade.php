@extends('index') @section('titulo')
<h1>
	Editando al usuario "{{$user->username}}"
</h1> @stop @section('contenido') {{-- Aquí va todo el contenido relacionado con la página actual --}}
<div class="container">
    <div class="col-xs-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Edición de usuario</h3>
            </div>
            <form action="{{url('/usuarios/actualizar')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" id="nombre" name="nombre" placeholder="Nombre" type="text" value="{{$user->nombre}}" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido_paterno">Apellido Paterno</label>
                        <input class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Apellido Paterno" type="text" value="{{$user->apellido_paterno}}" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido_materno">Apellido Materno</label>
                        <input class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Apellido Materno" type="text" value="{{$user->apellido_materno}}">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input class="form-control" id="email" name="email" placeholder="E-mail" type="email" value="{{$user->email}}" required>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="" disabled>Selecciona Estado del Usuario</option>
                            @if($user->estado==1)
                            <option value="1" selected>Activo</option>
                            <option value="0">Inactivo</option>
                            @else
                            <option value="1">Activo</option>
                            <option value="0" selected>Inactivo</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Rol</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="" disabled>Selecciona Rol del Usuario</option>
                            @if($user->role=='admin')
                            <option value="admin" selected>Administrador</option>
                            <option value="almacenista">Almacenista</option>
                            @else
                            <option value="admin">Administrador</option>
                            <option value="almacenista" selected>Almacenista</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Nueva Contraseña</label>
                        <input class="form-control" id="password" name="password" placeholder="Ingrese una nueva contraseña si desea cambiarla" type="text">
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{url('/usuarios')}}" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success pull-right">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
