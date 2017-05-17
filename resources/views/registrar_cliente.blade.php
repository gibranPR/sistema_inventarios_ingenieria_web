@extends('index') @section('titulo')
<h1>
    Agregando un nuevo usuario
</h1> @stop @section('contenido') {{-- Aquí va todo el contenido relacionado con la página actual --}}
<div class="container">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Agregar Cliente</h3>
            </div>
            <form action="{{url('/clientes/registrar')}}" method="POST">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" id="nombre" name="nombre" placeholder="Teclea el Nombre" type="text" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad</label>
                        <input class="form-control" id="edad" name="edad" placeholder="Ingresa tu edad" type="number" required>
                    </div>
                    <div class="form-group">
                        <label>Sexo</label>
                        <select name="sexo" id="sexo" class="form-control" required>
                            <option value="" disabled>Selecciona tu genero</option>
                            <option value="1">Masculino</option>
                            <option value="0" selected>Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="empresa">Empresa</label>
                        <input class="form-control" id="empresa" name="empresa" placeholder="Registra el nombre de tu empresa" type="text" required>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="" disabled>Selecciona Estado del Cliente</option>
                            <option value="1">Activo</option>
                            <option value="0" selected>Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="correo">E-mail</label>
                        <input class="form-control" id="email" name="email" placeholder="Te clea tu E-mail" type="email" required>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{url('/clientes')}}" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success pull-right">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
