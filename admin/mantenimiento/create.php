<?php
include('../../app/config.php');
include('../../admin/layout/parte1.php');
include("../../app/controller/producto/lista_producto.php");
include("../../app/controller/usuario/listado_user.php");
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
                    <h1>NUEVO MANTENIEMITO</h1>
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
                            <form action="<?= APP_URL . 'app/controller/mantenimiento/create_matenimiento.php' ?>" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>ASIGNAR RESPONSABLE <span class="text-danger">*</span></label>
                                            <select name="id_responsable" class="form-control">
                                                <?php
                                                foreach ($usuarios as $datos_user) {
                                                    $nombre  = $datos_user['nombre'];
                                                ?>
                                                    <option value="<?= $datos_user['id_user'] ?>"><?= $datos_user['user_email'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>EQUIPO <span class="text-danger">*</span></label>
                                            <select name="equipo_fk" class="form-control">
                                                <?php
                                                foreach ($equipos as $datos_eq) {
                                                    $exp_date  = $datos_eq['exp_date'];
                                                ?>
                                                    <option value="<?= $datos_eq['product_id'] ?>"><?= $datos_eq['nombre'] . ' - ' . $datos_eq['categoria']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">TIPO <span class="text-danger">*</span></label>
                                                <select name="tipo_m" class="form-control" required>
                                                    <option value="PREVENTIVO">PREVENTIVO</option>
                                                    <option value="CORRECTIVO">CORRECTIVO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>FECHA DE ARRRANQUE <span class="text-danger">*</span></label>
                                            <input type="date" name="exp_date" value="<?=$exp_date?>" class="form-control" hidden>
                                            <input type="date" name="arranq_date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>FECHA DE EXPIRACIÓN <span class="text-danger">*</span></label>
                                            <input type="date" value="<?= $exp_date ?>"  name="exp_date" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>FRECUENCIA MANTENIMIENTO DIAS <span class="text-danger">*</span></label>
                                            <input type="number" name="frecuencia_m" min="0" max="100" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                <div class="col-4">
                                    <label>USUARIO DELEGADOR <span class="text-danger">*</span></label></label>
                                    <input type="text"  value="<?= $email ?>" class="form-control" disabled>
                                    <input type="text"  value="<?= $email ?>" name="delegador" class="form-control" hidden>
                                </div>
                                <div class="col-4">
                                    <label>NOMBRE <span class="text-danger">*</span></label></label>
                                    <input type="text"  value="<?=$nombre_r?>" class="form-control" disabled>
                                </div>
                                <div class="col-4">
                                    <label>APELLIDO <span class="text-danger">*</span></label></label>
                                    <input type="text"  value="<?=$apellido_r?>" class="form-control" disabled>
                                </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn bg-pink">Guardar</button>
                                            <a href="<?= APP_URL . 'admin/mantenimiento/index.php' ?>" class="btn btn-secondary">Cancelar</a>
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