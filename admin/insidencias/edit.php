<?php
$insid_id = $_GET['id'];
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include("../../app/controller/insidencias/datos_incidencia.php");
include("../../app/controller/insidencias/listado_categoria.php");
include("../../app/controller/insidencias/lista_responsable.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h1>Evento "<?= $evento ?>"</h1>
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
                            <form action="<?= APP_URL . 'app/controller/insidencias/update_insidencias.php' ?>" method="post">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" value="<?= $insid_id ?>" name="insidencia_id" hidden>
                                            <label>Evento</label>
                                            <input type="text" value="<?= $evento ?>" name="evento" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Descripcion</label>
                                            <input type="text" value="<?= $descripcion ?>" name="descripcion" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nv Critico</label>
                                            <select name="nv_critico" class="form-control">
                                                <option value="MUY ALTA" <?php if ($nv_critico == "MUY ALTA") { ?>selected="select" <?php } ?>>MUY ALTA</option>
                                                <option value="ALTA" <?php if ($nv_critico == "ALTA") { ?>selected="select" <?php } ?>>ALTA</option>
                                                <option value="MEDIA" <?php if ($nv_critico == "MEDIA") { ?>selected="select" <?php } ?>>MEDIA</option>
                                                <option value="BAJA" <?php if ($nv_critico == "BAJA") { ?>selected="select" <?php } ?>>BAJA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <select name="id_catg" id="" class="form-control">
                                                <?php foreach ($categorias as $catg) { ?>
                                                    <option value="<?= $catg['id_catg'] ?>" <?= $fk_categoria == $catg['id_catg'] ? 'selected' : '' ?>><?= $catg['categoria'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Area responsable:</label>
                                            <select name="id_rspn" id="" class="form-control">
                                                <?php foreach ($responsables as $respn) { ?>
                                                    <option value="<?= $respn['id_rspn'] ?>" <?= $fk_respnsable == $respn['id_rspn'] ? 'selected' : '' ?>><?= $respn['area'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">ETAPA</label>
                                            <select name="etapa" class="form-control">
                                                <option value="PENDIENTE" <?php if ($etapa == "PENDIENTE") { ?>selected="select" <?php } ?>>PENDIENTE</option>
                                                <option value="FINALIZADO" <?php if ($etapa == "FINALIZADO") { ?>selected="select" <?php } ?>>FINALIZADO</option>
                                                <option value="EN CURSO" <?php if ($etapa == "EN CURSO") { ?>selected="select" <?php } ?>>EN CURSO</option>
                                            </select>
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