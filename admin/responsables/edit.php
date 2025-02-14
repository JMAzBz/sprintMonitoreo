<?php
$resp_id = $_GET['id'];
require_once("../../app/config.php");
require_once("../../admin/layout/parte1.php");
require_once("../../app/controller/insidencias/datos_responsable.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h2>RESPONSABLE "<?=$area?>"</h1>
                </div>
            </div>
            <form action="<?=APP_URL.'/app/controller/insidencias/update_responsable.php'?>" method="post">
                <div class=" row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title">Datos registrados</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?=APP_URL.'/app/controller/insidencias/update_responsable.php'?>" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nombre del rol</label>
                                                <input type="text" name="respn" value="<?=$resp_id?>"
                                                    class="form-control" hidden>
                                                <input type="text" name="area" value="<?=$area?>"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Actualizar</button>
                                                <a href="<?=APP_URL.'/admin/responsables'?>"
                                                    class="btn btn-secondary">Cancelar</a>
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
            </form>
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