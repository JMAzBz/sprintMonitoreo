<?php
$prod_id_get = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include('../../app/controller/producto/datos_producto.php');
include('../../app/controller/producto/categoria/listado_categoria.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h1>PRODUCTO "<?= $p_nom ?>"</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Completar plantilla</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= APP_URL . '/app/controller/inventario/update_inventario.php' ?>" method="post">
                                <div class="row">
                                    <input type="text" name="id_almacen" value="<?= $prod_id_get ?>" hidden>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>NOMBRE DEL PODUCTO <span class="text-danger">*</span></label>
                                            <input type="text" value="<?= $p_nom ?>" name="p_name" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label>DESCRIPCION <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="2" disabled><?= $p_descripcion ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">TIPO <span class="text-danger">*</span></label>
                                            <input type="text" value="<?= $p_tipo ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CATEGORIA <span class="text-danger">*</span></label>
                                            <input type="text" value="<?= $categoria ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">UNIDAD MEDIDA <span class="text-danger">*</span></label>
                                            <input type="text" value="<?= $unidad_md ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>FECHA DE FABRICACIÓN <span class="text-danger">*</span></label>
                                            <input type="date" value="<?= $mfg_date ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>FECHA DE EXPIRACIÓN <span class="text-danger">*</span></label>
                                            <input type="date" value="<?= $exp_date ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">FECHA DE RECEPCIÓN<span class="text-danger">*</span></label>
                                        <input type="date" value="<?= $reception_at ?>" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">CÓDIGO INTERNO<span class="text-danger">*</span></label>
                                            <input type="text" value="<?= $code_alm ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">NOMBRE DEL DEPÓSITO<span class="text-danger">*</span></label>
                                            <input type="text" value="<?= $deposito ?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>STOCK <span class="text-danger">*</span></label>
                                            <input type="number" value="<?= $stock ?>" name="stock" class="form-control" min="0" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <a href="<?= APP_URL . 'admin/inventario/index.php' ?>" class="btn btn-secondary">Cancelar</a>
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