<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> {{-- Título de la página --}}
    <title>Sistema de Inventarios</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('bibliotecas/AdminLTE/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bibliotecas/font-awesome/css/font-awesome.min.css')}}">
    @yield('css')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('bibliotecas/AdminLTE/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
    <link rel="stylesheet" href="{{asset('bibliotecas/AdminLTE/dist/css/skins/skin-green.min.css')}}">
</head>

<body class="hold-transition skin-green sidebar-mini" ng-app="mainApp" ng-controller="mainController as main" ng-class="{ 'sidebar-collapse': main.sidebarCollapse() }">
    <div class="wrapper">
        <header class="main-header">
            <a href="{{url('/')}}" class="logo">
                <span class="logo-mini"><b>S</b>I</span>
                <span class="logo-lg"><b>Sistema</b> Inventarios</span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" role="button" ng-click="main.setSidebarCollapse()">
                    <span class="sr-only">Alternar Navegación</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="https://robohash.org/{{ Auth::user()->nombre }}?set=set3" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->nombre }} &lt;{{ Auth::user()->username }}&gt;</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="https://robohash.org/{{ Auth::user()->nombre }}?set=set3" class="img-circle" alt="User Image">
                                    <p>
                                        {{ Auth::user()->nombre }} {{ Auth::user()->apellido_paterno }} {{ Auth::user()->apellido_materno }}
                                        <small>{{ Auth::user()->username }} como {{ Auth::user()->role }}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar" ng-controller="locationController as navbar">
                <ul class="sidebar-menu" ng-init="navbar.baseURL='{{url('/')}}'">
                    @if (Auth::user()->role == 'admin')
                    <li class="header">ADMIN</li>
                    <li ng-class="{ active: navbar.isActive('/usuarios')}"><a href="{{url('/usuarios')}}"><i class="fa fa-users" aria-hidden="true"></i><span>Usuarios</span></a></li>
                    @endif
                    <li class="header">MENÚ</li>
                    <li ng-class="{ active: navbar.isActive('/ticket-salida')}"><a href="{{url('/ticket-salida')}}"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Nueva Salida</span></a></li>
                    <li ng-class="{ active: navbar.isActive('/ticket-entrada')}"><a href="{{url('/ticket-entrada')}}"><i class="fa fa-sign-in" aria-hidden="true"></i><span>Nueva Entrada</span></a></li>
                    <li ng-class="{ active: navbar.isActive('/tickets')}"><a href="{{url('/tickets')}}"><i class="fa fa-ticket" aria-hidden="true"></i><span>Tickets</span></a></li>
                    <li ng-class="{ active: navbar.isActive('/consultarProductos')}"><a href="{{url('/consultarProductos')}}"><i class="fa fa-building-o" aria-hidden="true"></i><span>Productos</span></a></li>
                    <li ng-class="{ active: navbar.isActive('/clientes')}"><a href="{{url('/clientes')}}"><i class="fa fa-building-o" aria-hidden="true"></i><span>Clientes</span></a></li>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                @yield('titulo')
            </section>
            <section class="content">
                @yield('contenido')
            </section>
        </div>
        <footer class="main-footer">
            Ingeniería Web 2017
        </footer>
    </div>
    <!-- jQuery 2.2.3 -->
    <script src="{{asset('bibliotecas/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{asset('bibliotecas/AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
    {{-- Angular --}}
    <script src="{{asset('bibliotecas/angular/angular.min.js')}}"></script>
    {{-- JS de Angular --}}
    <script src="{{asset('js/angular/controllers/mainCtrl.js')}}"></script>
    <script src="{{asset('js/angular/services/DataService.js')}}"></script>
    <script src="{{asset('js/angular/app.js')}}"></script>
    {{-- Evitar conflictos con JQuery --}}
    <script>
    $ = jQuery.noConflict();
    </script>
    <!-- AdminLTE App -->
    <script src="{{asset('bibliotecas/AdminLTE/dist/js/app.min.js')}}"></script>
    @yield('scripts')
</body>

</html>
