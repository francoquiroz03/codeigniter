<!DOCTYPE html>
<!--
Creado por Franco Quiroz Desarrolador
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Empresa</title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url()?>resources/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>resources/css/bootstrap-responsive.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo base_url()?>resources/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?php echo base_url()?>resources/css/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?php echo base_url()?>resources/css/green.css" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
        <link href="<?php echo base_url()?>resources/css/daterangepicker.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="<?php echo base_url()?>resources/css/custom.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  </head>
    <body class="nav-md">
     <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-institution"></i> 
              <span>Empresa</span>
              </a>
            </div>
            <div class="clearfix"></div>
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?php echo site_url('home');?>"><i class="fa fa-home"></i> Home </a></li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Administración</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-book"></i>Empresa<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('sic/informe_notas1');?>">Modificar</a></li>
                      <li><a href="<?php echo site_url('sic/informe_notas1');?>">Subir Imágenes</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i>Usuarios<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('usuarios/agregar');?>">Agregar</a></li>
                      <li><a href="<?php echo site_url('Usuarios');?>">Modificar</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="fa fa-child"></span>
                <?php $username = ($this->session->userdata['logged_in']['user_name']); echo $username; ?>
                  <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo site_url('logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->