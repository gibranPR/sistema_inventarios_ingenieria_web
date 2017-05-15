@extends('index') @section('titulo')
<h1>
    Editando al cliente "{{$cliente->nombre}}"
</h1> @stop @section('contenido') {{-- Aquí va todo el contenido relacionado con la página actual --}}
<div class="container">
    <div class="col-xs-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Edición de cliente</h3>
            </div>
            <form action="{{url('/clientes/actualizar')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$cliente->id}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" id="nombre" name="nombre" placeholder="Nombre" type="text" value="{{$cliente->nombre}}" required>
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad</label>
                        <input class="form-control" id="edad" name="edad" placeholder="Edad" type="number" value="{{$cliente->edad}}" required>
                    </div>
                    <div class="form-group">
                        <label>Sexo</label>
                        <select name="sexo" id="sexo" class="form-control" required>
                            <option value="" disabled>Selecciona tu genero</option>
                            @if($cliente->sexo==1)
                            <option value="1" selected>Masculino</option>
                            <option value="0">femenino</option>
                            @else
                            <option value="1">Masculino</option>
                            <option value="0" selected>Femenino</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Empresa</label>
                        <input class="form-control" id="empresa" name="empresa" placeholder="Empresa" type="text" value="{{$cliente->empresal}}" required>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="" disabled>Selecciona Estado del Cliente</option>
                            @if($cliente->estado==1)
                            <option value="1" selected>Activo</option>
                            <option value="0">Inactivo</option>
                            @else
                            <option value="1">Activo</option>
                            <option value="0" selected>Inactivo</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input class="form-control" id="email" name="email" placeholder="E-mail" type="email" value="{{$cliente->email}}" required>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{url('/clientes')}}" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success pull-right">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
