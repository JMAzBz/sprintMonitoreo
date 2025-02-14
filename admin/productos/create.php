<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include("../../app/controller/producto/categoria/listado_categoria.php");
include("../../app/controller/producto/marcas/listado_marca.php");
include("../../app/controller/usuario/receptor_datos.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h1>NUEVO PRODUCTO</h1>
                </div>
            </div>
            <div class=" row">
                <div class="col-md-3">
                </div>
                <div class="col-md-12">
                    <div class="card card-outline card-purple">
                        <div class="card-header">
                            <h3 class="card-title">COMPLETAR PLANTILLA</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= APP_URL . '/app/controller/producto/create_producto.php' ?>" method="post">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" value="<?=$id_user?>" name="receptor_id" hidden>
                                            <label>NOMBRE DEL PODUCTO <span class="text-danger">*</span></label>
                                            <input type="text" name="p_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>MARCA <span class="text-danger">*</span></label>
                                            <select name="p_marca_id" class="form-control">
                                                <?php
                                                foreach ($marca as $datos_m) {
                                                ?>
                                                    <option value="<?= $datos_m['id_marca'] ?>"><?= $datos_m['marca']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>DESCRIPCION <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">TIPO <span class="text-danger">*</span></label>
                                            <select name="tipo_p" class="form-control" required>
                                                <option value="CONSUMIBLE">CONSUMIBLE</option>
                                                <option value="FABRICABLE">FABRICABLE</option>
                                                <option value="ALMACENABLE">ALMACENABLE</option>
                                                <option value="SERVICIO">SERVICIO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CATEGORIA <span class="text-danger">*</span></label>
                                            <select name="p_catg_id" id="" class="form-control">
                                                <?php
                                                foreach ($categorias as $categoria) {
                                                ?>
                                                    <option value="<?= $categoria['p_catg_id'] ?>"><?= $categoria['categoria']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">UNIDAD MEDIDA <span class="text-danger">*</span></label>
                                            <select name="unidad_md" class="form-control" required>
                                                <option value="UNIDAD">UNIDAD</option>
                                                <option value="METROS">METROS</option>
                                                <option value="KILOS">KILOS</option>
                                                <option value="LITROS">LITROS</option>
                                                <option value="PAQUETES">PAQUETES</option>
                                                <option value="CAJAS">CAJAS</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>FECHA DE FABRICACIÓN <span class="text-danger">*</span></label>
                                            <input type="date" name="mfg_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>FECHA DE EXPIRACIÓN <span class="text-danger">*</span></label>
                                            <input type="date" name="exp_date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">FECHA DE RECEPCIÓN<span class="text-danger">*</span></label>
                                        <input type="date" name="reception_at" class="form-control" required>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">CÓDIGO INTERNO<span class="text-danger">*</span></label>
                                            <input type="text" name="code_alm" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">NOMBRE DEL DEPÓSITO<span class="text-danger">*</span></label>
                                            <input type="text" name="deposito" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>STOCK <span class="text-danger">*</span></label>
                                            <input type="number" name="stock" class="form-control" min="0" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-4">
                                        <label>PROVEEDOR <span class="text-danger">*</span></label>
                                        <input type="text" name="proveedor" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <label>PRECIO COMPRA <span class="text-danger">*</span></label>
                                        <input type="number" name="p_compra" class="form-control" min="1" placeholder="0" required>
                                    </div>
                                    <div class="col-4">
                                        <label>PRECIO VENTA <span class="text-danger">*</span></label>
                                        <input type="number" name="p_venta" class="form-control" min="1" placeholder="0" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-4">
                                        <label>RECEPCIONADO POR <span class="text-danger">*</span></label>
                                        <input type="text" value="<?=$email_r?>" class="form-control" disabled>
                                    </div>
                                    <div class="col-4">
                                        <label>NOMBRE <span class="text-danger">*</span></label>
                                        <input type="text" value="<?=$nombre_r?>" class="form-control" min="1" placeholder="0" disabled>
                                    </div>
                                    <div class="col-4">
                                        <label>APELLIDO <span class="text-danger">*</span></label>
                                        <input type="text" value="<?=$apellido_r?>" class="form-control" min="1" placeholder="0" disabled>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn bg-purple">Guardar</button>
                                            <a href="<?= APP_URL . '/admin/productos/index.php' ?>" class="btn btn-secondary">Cancelar</a>
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