<?php 
include('./app/config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= APP_NAME ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= APP_URL.'/pubilc/plugins/fontawesome-free/css/all.css'?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= APP_URL.'/pubilc/plugins/icheck-bootstrap/icheck-bootstrap.css'?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= APP_URL.'/pubilc/dist/css/adminlte.css'?>">
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <center>
            <img src="<?= APP_URL.'/pubilc/dist/img/logo_sprint.png' ?>" width="150px" alt="">
        </center>
        <div class="login-logo">
            <small><b><?= APP_NAME ?></b></small>
        </div>
        <!-- /.login-logo -->
        <div class=" card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Inicio de sesion</p>

                <form action="./app/controller/login/login.php" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <button class="btn bg-purple btn-block" type="submit">Acceder</button>
                        <!-- <a href="./recuperar_password.php" class="ml-auto mt-2 text-sm"><b>Olvidaste contraseña?</b></a> -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body 
                -->
        </div>
    </div>
    <!-- /.login-box -->

    <?php include('./admin/layout/mensajes.php'); ?>
    <!-- jQuery -->
    <script src="<?= APP_URL.'/pubilc/plugins/jquery/jquery.js'?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= APP_URL.'/pubilc/plugins/bootstrap/js/bootstrap.bundle.js'?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= APP_URL.'/pubilc/dist/js/adminlte.js'?>"></script>

</body>

</html>