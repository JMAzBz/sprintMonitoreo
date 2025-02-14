<?php
session_start();
$email = $_SESSION['email'];
if (isset($_SESSION['email'])) {
    // echo "Ingreso correctamente";
} else {
    // echo "No ingreso correctamente";
    header('Location:' . APP_URL);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= APP_NAME ?>
    </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= APP_URL . 'pubilc/plugins/fontawesome-free/css/all.css' ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= APP_URL . 'pubilc/dist/css/adminlte.css' ?>">
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Iconos Bootstrap 5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= APP_URL . '/pubilc/plugins/datatables-bs4/css/dataTables.bootstrap4.css' ?>">
    <link rel="stylesheet" href="<?= APP_URL . '/pubilc/plugins/datatables-responsive/css/responsive.bootstrap4.css' ?>">
    <link rel="stylesheet" href="<?= APP_URL . '/pubilc/plugins/datatables-buttons/css/buttons.bootstrap4.css' ?>">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="<?= APP_URL ?>/admin" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= APP_URL ?>/admin" class="nav-link">
                        <?= APP_NAME ?>
                    </a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class=" navbar-nav ml-auto">
                <!-- Navbar Search -->
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> -->
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= APP_URL ?>admin" class="brand-link">
                <img src="<?= APP_URL . '/pubilc/dist/img/sp_small.png' ?>" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">
                    MONITOREO SPRINT
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= APP_URL . 'pubilc/dist/img/guy_p.png' ?>" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block small">
                            <?= $email ?>
                        </a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link bg-purple">
                                <i class="nav-icon fas"><i class="bi bi-folder-fill"></i></i>
                                <p>
                                    INSIDENCIAS
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= APP_URL . 'admin/categoria' ?>" class="nav-link active">
                                        <i class="bi bi-folder-fill"></i>
                                        <p>Categoria</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= APP_URL . 'admin/responsables' ?>" class="nav-link active">
                                        <i class="bi bi-folder-fill"></i>
                                        <p>Responsable</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= APP_URL . 'admin/insidencias' ?>" class="nav-link active">
                                        <i class="bi bi-folder-fill"></i>
                                        <p>Insidencia</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link bg-purple">
                                <i class="nav-icon fas"><i class="bi bi-basket-fill"></i></i>
                                <p>
                                    PRODUCTOS
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= APP_URL . 'admin/productos/marcas/index.php' ?>" class="nav-link active">
                                        <i class="bi bi-basket-fill"></i>
                                        <p>Marca Producto</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= APP_URL . '/admin/productos/categorias/categoria.php' ?>" class="nav-link active">
                                        <i class="bi bi-basket-fill"></i>
                                        <p>Categoria Producto</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= APP_URL . 'admin/productos' ?>" class="nav-link active">
                                        <i class="bi bi-basket-fill"></i>
                                        <p>Producto</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= APP_URL . 'admin/inventario/index.php' ?>" class="nav-link bg-purple">
                                <i class="nav-icon"><i class="bi bi-box-seam-fill"></i></i>
                                <p>INVENTARIO</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link bg-purple">
                                <i class="nav-icon fas"><i class="bi bi-gear-wide-connected"></i></i>
                                <p>
                                    MANTENIMIENTO
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= APP_URL . 'admin/mantenimiento/index.php' ?>" class="nav-link active">
                                        <i class="bi bi-gear-wide-connected"></i>
                                        <p>Mantenimiento</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= APP_URL . 'admin/mantenimiento/mantenimineto_worked/index.php'?>" class="nav-link active">
                                        <i class="bi bi-gear-wide-connected"></i>
                                        <p>Mnt. Trabajados</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= APP_URL . 'admin/contactos' ?>" class="nav-link bg-purple">
                                <i class="nav-icon"><i class="bi bi-person-square"></i></i>
                                <p>CONTACTOS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= APP_URL . 'admin//usuarios' ?>" class="nav-link bg-purple">
                                <i class="nav-icon"><i class="bi bi-person-fill-gear"></i></i>
                                <p>USUARIOS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= APP_URL . '/admin/layout/logout.php' ?>" class="nav-link bg-pink">
                                <i class="nav-icon"><i class="bi bi-power"></i></i>
                                <p>CERRAR SESSION</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>