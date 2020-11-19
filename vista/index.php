<?php include 'head.php';
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['id_usuario'] < 1) {
    header("Location: login/index.php");
    exit;
}
include dirname(__file__, 2) . '../modelo/usuario.php';
$usuario      = new Usuario();
$idUsuario    = $_SESSION['id_usuario'];
$datosusuario = $usuario->getUsuariolog($idUsuario);
$vermodulo    = $usuario->getVermodulo($datosusuario[0]["fkID_cargo"], 1);
?>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon">
                        <i class="fas fa-laptop">
                        </i>
                    </div>
                    <div class="sidebar-brand-text mx-3">
                        Inventory
                        <sup>
                            Software
                        </sup>
                    </div>
                </a>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">
                            <i class="fas fa-home" style="cursor: pointer">
                            </i>
                            <span>
                                Inicio
                            </span>
                        </a>
                    </li>
                    <!-- Divider -->
                    <hr class="sidebar-divider">
                        <!-- Heading -->
                        <div class="sidebar-heading">
                            Menú
                        </div>
                        <?php
$vermodulo = $usuario->getVermodulo($datosusuario[0]["fkID_cargo"], 2);
if ($vermodulo[0]['ver'] == 1) {
    ?>
                        <!-- Nav Item - Charts -->
                        <li class="nav-item">
                            <a class="nav-link" id="menu_equipos" style="cursor: pointer">
                                <i class="fas fa-desktop">
                                </i>
                                <span>
                                    Equipos
                                </span>
                            </a>
                        </li>
                        <?php }?>
                        <?php
$vermodulo = $usuario->getVermodulo($datosusuario[0]["fkID_cargo"], 3);
if ($vermodulo[0]['ver'] == 1) {
    ?>
                        <!-- Nav Item - Charts -->
                        <li class="nav-item">
                            <a class="nav-link" id="menu_proyecto" style="cursor: pointer">
                                <i class="fas fa-file-contract">
                                </i>
                                <span>
                                    Proyectos
                                </span>
                            </a>
                        </li>
                        <?php }?>
                        <?php
$vermodulo = $usuario->getVermodulo($datosusuario[0]["fkID_cargo"], 12);
if ($vermodulo[0]['ver'] == 1) {
    ?>
                        <!-- Nav Item - Charts -->
                        <li class="nav-item">
                            <a class="nav-link" id="menu_informes" style="cursor: pointer">
                                <i class="fas fa-chart-bar">
                                </i>
                                <span>
                                    Informes
                                </span>
                            </a>
                        </li>
                        <?php }?>
                        <!-- Nav Item - Utilities Collapse Menu -->
                        <li class="nav-item">
                            <a aria-controls="collapseUtilities" aria-expanded="true" class="nav-link collapsed" data-target="#collapseUtilities" data-toggle="collapse" href="#" style="cursor: pointer">
                                <i class="fas fa-cog">
                                </i>
                                <span>
                                    Administración
                                </span>
                            </a>
                            <div aria-labelledby="headingUtilities" class="collapse" data-parent="#accordionSidebar" id="collapseUtilities">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">
                                        Personal:
                                    </h6>
                                <?php
$vermodulo = $usuario->getVermodulo($datosusuario[0]["fkID_cargo"], 14);
if ($vermodulo[0]['ver'] == 1) {
    ?>

                                    <a class="collapse-item" id="menu_funcionario" style="cursor: pointer">
                                        Funcionario
                                    </a>
                                    <?php }?>
                                </div>
                            </div>
                        </li>
                        <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle">
                            </button>
                        </div>
                    </hr>
                </hr>
            </ul>
            <!-- End of Sidebar -->
            <!-- Content Wrapper -->
            <div class="d-flex flex-column" id="content-wrapper">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <div class="titulo" id="titulo">&nbsp;Inicio</div>
                        <!-- Sidebar Toggle (Topbar) -->
                        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop">
                            <i class="fa fa-bars">
                            </i>
                        </button>
                        <!-- Topbar Search -->

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                            <!-- Nav Item - Alerts -->

                            <!-- Nav Item - Messages -->

                            <div class="topbar-divider d-none d-sm-block">
                            </div>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow" style="cursor: pointer">
                                <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="userDropdown" role="button">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                        <?php echo $datosusuario[0]["nombres"]; ?>
                                    </span>
                                    <img class="img-profile rounded-circle" src="../imagenes/usuario.png">
                                    </img>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div aria-labelledby="userDropdown" class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400">
                                        </i>
                                        <?php echo $datosusuario[0]["nombre_cargo"]; ?>
                                    </a>
                                    <?php
$vermodulo = $usuario->getVermodulo($datosusuario[0]["fkID_cargo"], 1);
if ($vermodulo[0]['ver'] == 1) {
    ?>
                                    <a class="dropdown-item" id="menu_usuarios">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400">
                                        </i>
                                        Usuarios
                                    </a>
                                    <?php }?>
                                    <div class="dropdown-divider">
                                    </div>
                                    <a class="dropdown-item" data-target="#logoutModal" data-toggle="modal" href="#">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400">
                                        </i>
                                        Salir
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->
                    <!-- Begin Page Content -->
                    <div id="tabla" class="panel-default" style="margin: 20px;"></div>
                    <div class="container-fluid">

                    <!-- /.container-fluid -->
                </div>

                <!-- End of Main Content -->
                <!-- Footer -->

                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up">
            </i>
        </a>
        <!-- Logout Modal-->
        <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="logoutModal" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Desea cerrar sesión?
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">
                            Cancelar
                        </button>
                        <button class="btn btn-primary" name="btn_cerrar_sesion" id="btn_cerrar_sesion">
                            Cerrar sesión
                        </button>
                    </div>
                </div>
            </div>
        </div>
  <?php include 'footer.php';?>
