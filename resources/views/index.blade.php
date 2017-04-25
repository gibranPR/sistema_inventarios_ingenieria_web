<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Inventarios</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('bibliotecas/AdminLTE/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bibliotecas/font-awesome/css/font-awesome.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('bibliotecas/AdminLTE/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
    <link rel="stylesheet" href="{{asset('bibliotecas/AdminLTE/dist/css/skins/skin-red.min.css')}}">
</head>

<body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="index2.html" class="logo">
                <span class="logo-mini"><b>S</b>I</span>
                <span class="logo-lg"><b>Sistema</b> Inventarios</span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Alternar Navegación</span>
                </a>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="header">MENÚ</li>
                    <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link Ejemplo</span></a></li>
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
    <!-- AdminLTE App -->
    <script src="{{asset('bibliotecas/AdminLTE/dist/js/app.min.js')}}"></script>
</body>

</html>
