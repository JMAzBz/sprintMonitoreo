<?php 
$get_user = $_GET['id'];
require_once("../../app/config.php");
require_once("../../admin/layout/parte1.php");
require_once("../../app/controller/usuario/datos_user.php");
require_once("../../app/controller/contactos/listado_contacto.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h1>CREAR USUARIO</h1>
                </div>
            </div>
            <div class=" row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">COMPLETAR PLANTILLA</h3>
                        </div>
                        <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <label>RUC <span class="text-danger">*</span></label>
                                        <input type="text" value="<?=$ruc?>" class="form-control" disabled>
                                    </div>
                                    <div class="col-4">
                                        <label>CELULAR  <span class="text-danger">*</span></label>
                                        <input type="text" value="<?=$celular?>" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="user_name">NOMBRE USUARIO <span class="text-danger">*</span></label>
                                            <input type="text" value="<?=$email_user?>" name="user_email" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label >NOMBRE <span class="text-danger">*</span></label>
                                            <input type="text" value="<?=$nombre?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label >APELLIDO <span class="text-danger">*</span></label>
                                            <input type="text" value="<?=$apellido?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>DNI <span class="text-danger">*</span></label>
                                            <input type="text" value="<?=$dni?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="<?= APP_URL ?>admin/usuarios" class="btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once("../../admin/layout/parte2.php");
require_once("../../layout/mensaje.php");
?>