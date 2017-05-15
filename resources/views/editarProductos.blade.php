@extends('index') @section('titulo')
<h1>
	Modifica producto "{{$productos->nombre}}"
</h1> @stop @section('contenido') {{-- Aquí va todo el contenido relacionado con la página actual --}}
<div class="container">
    <div class="col-xs-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Edición de Producto</h3>
            </div>
            <form action="{{url('/actualizarProductos')}}/{{$productos->id}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$productos->id}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" id="nombre" name="nombre" placeholder="Nombre" type="text" value="{{$productos->nombre}}" required>
                    </div>
                    <div class="form-group">
                        <label for="costo">Costo</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                            <input class="form-control" id="costo" name="costo" placeholder="Costo" type="number" value="{{$productos->costo}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <input class="form-control" id="categoria" name="categoria" placeholder="Categoria" type="number" value="{{$productos->categoria}}" required>
                    </div>
                    <div class="form-group">
                        <label for="existencia">Existencia</label>
                        <input class="form-control" id="existencia" name="existencia" placeholder="Existencia" type="number" value="{{$productos->existencia}}" required>
                    </div>
                    <div class="form-group">
                        <label for="activo">Estatus del producto</label>
                        <select name="activo" class="form-control" required>
                                <option value="1" @if($productos->activo)selected="true"@endif>Activo</option>
                                <option value="0" @if(!$productos->activo)selected="true"@endif>Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{url('/consultarProductos')}}" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
