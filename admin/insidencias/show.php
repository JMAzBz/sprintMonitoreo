<?php
$insid_id = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include("../../app/controller/insidencias/datos_incidencia.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h1>Evento "<?=$evento?>"</h1>
                </div>
            </div>
            <div class=" row">
                <div class="col-md-3">
                </div>
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Completar plantilla</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= APP_URL . '/app/controller/insidencias/create_insidencia.php'?>" method="post">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Evento</label>
                                            <input type="text" value="<?=$evento?>" class="form-control" disabled >
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Descripcion</label>
                                            <textarea class="form-control" disabled><?=$descripcion?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">  
                                            <label for="">Nv Critico</label>
                                            <input type="text" value="<?=$nv_critico?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <input type="text" class="form-control" value="<?=$categoria?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <input type="text" class="form-control" value="<?=$etapa?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha</label>
                                            <input type="date" class="form-control" value="<?=$fecha?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <a href="<?= APP_URL . '/admin/insidencias' ?>" class="btn btn-secondary">Cancelar</a>
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