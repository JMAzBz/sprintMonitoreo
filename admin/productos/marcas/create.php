<?php require_once("../../../app/config.php"); ?>
<?php require_once("../../../admin/layout/parte1.php"); ?>
<?php require_once("../../../app/controller/insidencias/listado_categoria.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h1>NUEVA MARCA</h1>
                </div>
            </div>
            <div class=" row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="card card-outline card-pink">
                        <div class="card-header">
                            <h3 class="card-title">COMPLETAR PLANILLA</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL.'app/controller/producto/marcas/create_marca.php'?>" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>NOMBRE MARCA</label>
                                            <input type="text" name="marca_p" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn bg-pink">Guardar</button>
                                            <a href="<?=APP_URL.'admin/productos/marcas'?>" class="btn btn-secondary">Cancelar</a>
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
require_once("../../layout/parte2.php");
require_once("../../layout/mensajes.php");
?>