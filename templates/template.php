<?php
session_start();
$url_base = "http://localhost/expedientes/";

if (!isset($_SESSION['usuario'])) {
    header("location:" . $url_base . "login");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de expedientes</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo $url_base; ?>templates/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="<?php echo $url_base; ?>templates/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $url_base; ?>templates/dist/css/adminlte.min.css">

    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?php echo $url_base; ?>templates/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo $url_base; ?>templates/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo $url_base; ?>templates/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <style>
        #example1_wrapper .dt-buttons .btn {
            background-color: #444444 !important;
            /* Otros estilos personalizados que desees aplicar */
        }
    </style>

    <style>
        .sidebar-dark-custom {
            background: #34495E !important;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">



        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark" style="background-color: #2C3E50">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>


            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->


                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                        <span class="badge badge-danger navbar-badge">X</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right border border-primary">

                        <div class="dropdown-divider"></div>
                        <a href="#"
                            class="dropdown-item dropdown-footer"><strong><?php echo $_SESSION['nombre'];  ?></strong></a>
                        <a href="<?php echo $url_base; ?>cerrar" class="dropdown-item dropdown-footer"> <i
                                class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-custom elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link text-center">

                <span class="brand-text font-weight-light h3"><b>G-EXPEDIENTES</b></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo $url_base; ?>public/img/expediente.png" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION['nombre']; ?></a>
                    </div>
                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?php echo $url_base; ?>home" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Inicio

                                </p>
                            </a>
                        </li>
                        <?php if ($_SESSION['rol'] == 1) {   ?>
                            <li class="nav-item">
                                <a href="<?php echo $url_base; ?>modulos/usuarios/" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Usuarios

                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo $url_base; ?>modulos/categorias/" class="nav-link">
                                    <i class="fas fa-briefcase nav-icon"></i>
                                    <p>Especialidades</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $url_base; ?>modulos/instituciones/" class="nav-link">
                                    <i class="fas fa-briefcase nav-icon"></i>
                                    <p>Ooads</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $url_base; ?>modulos/documentos/" class="nav-link">
                                    <i class="fas fa-file nav-icon"></i>
                                    <p>Documentos</p>
                                </a>
                            </li>
                        <?php  }  ?>

                        <li class="nav-item">
                            <a href="<?php echo $url_base; ?>/formato/FORMATO_REV_EXP_PARA_OP_MED.docx" class="nav-link" download>
                                <i class="fas fa-envelope nav-icon"></i>
                                <p>Formato</p>
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                            <a href="<?php echo $url_base; ?>modulos/mensajes/" class="nav-link">
                                <i class="fas fa-envelope nav-icon"></i>
                                <p>Mensajes</p>
                            </a>
                        </li>-->
                        <li class="nav-item">
                            <a href="<?php echo $url_base; ?>modulos/consultas/" class="nav-link">
                                <i class="fas fa-question nav-icon"></i>
                                <p>Consultas</p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
    </div>
</body>