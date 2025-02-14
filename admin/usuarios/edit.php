<?php 
$get_user = $_GET['id'];
require_once("../../app/config.php");
require_once("../../admin/layout/parte1.php");
require_once("../../app/controller/usuario/datos_user.php"); 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h1>Creación de un nuevo usuario</h1>
                </div>
            </div>
            <div class=" row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Completar plantilla</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL.'/app/controller/usuario/update_user.php'?>" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" value="<?=$get_user?>" name="id_user" hidden>
                                            <label for="user_name">Correo Electronico</label>
                                            <input type="text" value="<?=$email_user?>" name="user_email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="user_name">Contraseña</label>
                                            <input type="text" name="user_pass" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="user_name">Repetir contraseña</label>
                                            <input type="text" name="pass_repeat" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <a href="<?=APP_URL?>/admin/usuarios" class="btn btn-secondary">Cancelar</a>
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