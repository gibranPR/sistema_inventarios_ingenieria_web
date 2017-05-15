@extends('index') @section('titulo')
<h1>
	Home
</h1> @stop @section('contenido') {{-- Aquí va todo el contenido relacionado con la página actual --}}
<div class="col-xs-2">
</div>
<div class="col-xs-8">
    <div class="box box-widget widget-user">
        <div class="widget-user-header bg-aqua-active">
            <h3 class="widget-user-username">
            	{{ Auth::user()->nombre }} {{ Auth::user()->apellido_paterno }} {{ Auth::user()->apellido_materno }}
            </h3>
        </div>
        <div class="widget-user-image">
            <img src="https://robohash.org/{{ Auth::user()->nombre }}?set=set3" class="img-circle" alt="User Image">
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-6 border-right">
                    <div class="description-block">
                        <span class="description-text">Tipo Usuario</span>
                        <h5 class="description-header">{{ Auth::user()->role }}</h5>
                    </div>
                </div>
                <div class="col-sm-6 border-right">
                    <div class="description-block">
                        <span class="description-text">Email</span>
                        <h5 class="description-header">{{ Auth::user()->email }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
