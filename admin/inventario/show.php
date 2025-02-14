<?php
$prod_id_get = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controller/producto/datos_producto.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h1>PRODUCTO "<?=$p_nom?>"</h1>
                </div>
            </div>
            <div class=" row">
                <div class="col-md-3">
                </div>
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">DATOS DE INVEARIO</h3>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>NOMBRE <span class="text-danger">*</span></label>
                                            <input type="text" value="<?=$p_nom?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="">DESCRIPCIÓN <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="descripcion" disabled><?=$p_descripcion?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">TIPO <span class="text-danger">*</span></label>
                                            <input type="text" value="<?=$p_tipo?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>CATEGORIA <span class="text-danger">*</span></label>
                                            <input type="text" value="<?=$categoria?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">STOCK DISPONIBLE <span class="text-danger">*</span></label>
                                            <input type="text" value="<?=$stock?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">UNIDAD MEDIDA <span class="text-danger">*</span></label>
                                            <input type="text" value="<?=$unidad_md?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="<?= APP_URL . 'admin/inventario/index.php' ?>" class="btn btn-secondary">VOLVER</a>
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

<?php
require_once("../layout/parte2.php");
require_once("../layout/mensajes.php");
?>