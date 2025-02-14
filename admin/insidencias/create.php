<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');
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
                    <h1>CREACION DE UNA NUEVA INCIDENCIA</h1>
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
                            <form action="<?= APP_URL . '/app/controller/insidencias/create_insidencia.php' ?>" method="post">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Evento</label>
                                            <input type="text" name="evento" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Descripcion</label>
                                            <input type="text" name="descripcion" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nv Critico</label>
                                            <select name="nv_critico" class="form-control">
                                                <option value="MUY ALTA">MUY ALTA</option>
                                                <option value="ALTA">ALTA</option>
                                                <option value="MEDIA">MEDIA</option>
                                                <option value="BAJA">BAJA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <select name="id_catg" id="" class="form-control">
                                                <?php
                                                foreach ($categorias as $categoria) {
                                                ?>
                                                    <option value="<?= $categoria['id_catg'] ?>"><?= $categoria['categoria']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Area responsable</label>
                                            <select name="area" id="" class="form-control">
                                                <?php
                                                foreach ($responsables as $respn) {
                                                ?>
                                                    <option value="<?= $respn['id_rspn'] ?>"><?= $respn['area']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">ETAPA</label>
                                            <select name="etapa" class="form-control">
                                                <option value="PENDIENTE">PENDIENTE</option>
                                                <option value="FINALIZADO">FINALIZADO</option>
                                                <option value="EN CURSO">EN CURSO</option>
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