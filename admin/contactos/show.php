<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');
$id_persona_get = $_GET['id'];
include("../../app/controller/contactos/datos_contacto.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h1>CONTACTO "<?=$nombres?>"</h1>
                </div>
            </div>
            <div class=" row">
                <div class="col-md-3">
                </div>
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">COMPLETAR PLANTILLA</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= APP_URL . 'app/controller/contactos/create_contacto.php' ?>" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>NOMBRE COMPLETO <span class="text-danger">*</span></label>
                                            <input type="text" value="<?=$nombres?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>APELLIDO COMPLETO <span class="text-danger">*</span></label>
                                            <input type="text" value="<?=$apellido?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>DOCUMENTO IDENTIDAD <span class="text-danger">*</span></label>
                                            <input type="text" value="<?=$dni?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>RUC <span class="text-danger">*</span></label>
                                            <input type="text" value="<?=$ruc?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CORREO <span class="text-danger">*</span></label>
                                            <input type="email" value="<?=$correo?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CELULAR <span class="text-danger">*</span></label>
                                            <input type="number" value="<?=$celular?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="<?= APP_URL . 'admin/contactos/index.php' ?>" class="btn btn-secondary">VOLVER</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

<?php
require_once("../layout/parte2.php");
require_once("../layout/mensajes.php");
?>