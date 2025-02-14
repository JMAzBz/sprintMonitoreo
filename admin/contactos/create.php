<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include("../../app/controller/producto/categoria/listado_categoria.php");
include("../../app/controller/producto/marcas/listado_marca.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h1>NUEVO CONTACTO</h1>
                </div>
            </div>
            <div class=" row">
                <div class="col-md-3">
                </div>
                <div class="col-md-12">
                    <div class="card card-outline card-pink">
                        <div class="card-header">
                            <h3 class="card-title">COMPLETAR PLANTILLA</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= APP_URL . 'app/controller/contactos/create_contacto.php' ?>" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>NOMBRE COMPLETO <span class="text-danger">*</span></label>
                                            <input type="text" name="p_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>APELLIDO COMPLETO <span class="text-danger">*</span></label>
                                            <input type="text" name="p_last_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>DOCUMENTO IDENTIDAD <span class="text-danger">*</span></label>
                                            <input type="text" name="p_dni" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>RUC <span class="text-danger">*</span></label>
                                            <input type="text" name="p_ruc" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CORREO <span class="text-danger">*</span></label>
                                            <input type="email" name="p_correo" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CELULAR <span class="text-danger">*</span></label>
                                            <input type="number" name="p_celular" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn bg-pink">Guardar</button>
                                            <a href="<?= APP_URL . 'admin/contactos' ?>" class="btn btn-secondary">Cancelar</a>
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