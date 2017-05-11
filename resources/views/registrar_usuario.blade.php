@extends('index') @section('titulo')
<h1>
	Agregando un nuevo usuario
</h1> @stop @section('contenido') {{-- Aquí va todo el contenido relacionado con la página actual --}}
<div class="container">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Agregar usuario</h3>
            </div>
            <form action="{{url('/usuarios/registrar')}}" method="POST">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" id="nombre" name="nombre" placeholder="Nombre" type="text" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="apellido_paterno">Apellido Paterno</label>
                        <input class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Apellido Paterno" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido_materno">Apellido Materno</label>
                        <input class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Apellido Materno" type="text">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input class="form-control" id="email" name="email" placeholder="E-mail" type="email" required>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="" disabled>Selecciona Estado del Usuario</option>
                            <option value="1">Activo</option>
                            <option value="0" selected>Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Rol</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="" disabled>Selecciona Rol del Usuario</option>
                            <option value="admin">Administrador</option>
                            <option value="almacenista" selected>Almacenista</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" id="username" name="username" placeholder="Username" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input class="form-control" id="password" name="password" placeholder="Contraseña" type="password" required>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{url('/usuarios')}}" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success pull-right">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
