<?php require_once("../../app/config.php"); ?>
<?php require_once("../../admin/layout/parte1.php"); ?>
<?php require_once("../../app/controller/contactos/listado_contacto.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h1>CREAR USUARIO</h1>
                </div>
            </div>
            <div class=" row">
                <div class="col-md-12">
                    <div class="card card-outline card-purple">
                        <div class="card-header">
                            <h3 class="card-title">COMPLETAR PLANTILLA</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= APP_URL . 'app/controller/usuario/create_user.php' ?>" method="post">
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <label>CONTACTO RUC <span class="text-danger">*</span></label>
                                        <select name="id_persona" class="form-control">
                                            <?php
                                            foreach ($personas as $datos_p) {
                                            $correo = $datos_p['correo'];
                                            ?>
                                                <option value="<?= $datos_p['id_persona'] ?>"><?= $datos_p['ruc']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="user_name">NOMBRE USUARIO <span class="text-danger">*</span></label>
                                            <input type="text" value="<?=$correo?>" name="user_email" class="form-control" disabled>
                                            <input type="text" value="<?=$correo?>" name="user_email" class="form-control" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="user_name">CONTRASEÑA</label>
                                            <input type="text" name="user_pass" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="user_name">REPETIR CONTRASEÑA</label>
                                            <input type="text" name="pass_repeat" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn bg-purple">Guardar</button>
                                            <a href="<?= APP_URL ?>/admin/usuarios" class="btn btn-secondary">Cancelar</a>
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