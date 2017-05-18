@extends('index') @section('titulo')
<h1>
    Creación de nuevo ticket
</h1> @stop @section('contenido') {{-- Aquí va todo el contenido relacionado con la página actual --}}
<div class="container">
    <div class="col-xs-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Información del ticket</h3>
            </div>
            <form action="{{url('/tickets/nuevo/crear')}}" method="POST">
                {{ csrf_field() }}
                <div class="box-body">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input class="form-control" id="username" type="text" value="{{Auth::user()->username}}" required disabled>
                    </div>
                    <div class="form-group">
                        <label for="cliente_id">Cliente</label>
                        <select class="form-control" name="cliente_id" id="cliente_id" required>
                            <option value="" disabled selected>Seleccionar un cliente del listado</option>
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comentario">Comentario del ticket</label>
                        <textarea name="comentario" id="comentario" class="form-control" rows="4" placeholder="Comentario" required maxlength="500"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="producto">Productos</label>
                        <div class="row">
                            <div class="col-xs-10">
                                <select class="form-control" id="producto" ng-model="main.ticket_producto">
                                    <option value="" disabled selected>Seleccionar un producto del listado</option>
                                    @foreach($productos as $producto)
                                    <option value='{"id":{{$producto->id}}, "nombre":"{{$producto->nombre}}", "existencia": {{$producto->existencia}}}'>{{$producto->nombre}} - {{$producto->existencia}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-2">
                                <a href="#" ng-click="main.agregarProducto()" class="form-control btn btn-danger">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Existencia</th>
                                    <th>Cantidad</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="producto in main.ticket_productos">
                                    <td>@{{producto.id}}</td>
                                    <td>@{{producto.nombre}}</td>
                                    <td>@{{producto.existencia}}</td>
                                    <td><input type="number" ng-model=producto.cantidad></td>
                                    <td></td>
                                    <input type="hidden" name="productos_ids[@{{$index}}]" value="@{{producto.id}}" />
                                    <input type="hidden" name="productos_cantidades[@{{$index}}]" value="@{{producto.cantidad}}" />
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{--
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
                        <input class="form-control" id="password" name="password" placeholder="Ingrese una nueva contraseña si desea cambiarla" type="password">
                    </div> --}}
                </div>
                <div class="box-footer">
                    <a href="{{url('/usuarios')}}" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-success pull-right">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop @section('css')
<link rel="stylesheet" href="{{asset('bibliotecas/AdminLTE/plugins/select2/select2.min.css')}}"> @stop @section('scripts')
<script src="{{asset('bibliotecas/AdminLTE/plugins/select2/select2.min.js')}}"></script>
<script type="text/javascript">
$('#cliente').select2();
$('#producto').select2();
</script>
@stop
