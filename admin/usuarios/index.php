<?php require_once("../../app/config.php");
require_once("../../admin/layout/parte1.php");
require_once("../../app/controller/usuario/listado_user.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="container">
                <h1 class="text-center">USUARIO REGISTRADOS</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-purple">
                        <div class="card-header">
                            <h3 class="card-title">Listado de usuarios</h3>
                            <div class="card-tools">
                                <button class="btn bg-purple">
                                    <i class="nav-giticon fas"><i class="bi bi-plus-circle-fill"></i></i></i>
                                    <a href="<?= APP_URL ?>admin/usuarios/create.php" class="text-white">Nuevo Registro</a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1"
                                class="table table-bordered table-hover table-sm table-striped text-center">
                                <thead class="bg-purple">
                                    <tr>
                                        <th>Nº</th>
                                        <th>NOMBRE</th>
                                        <th>APELLIDO</th>
                                        <th>DNI</th>
                                        <th>RUC</th>
                                        <th>USUARIO</th>
                                        <th>ACCION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador_user = 0;
                                    foreach ($usuarios as $usuario) {
                                        $user_id_tabla = $usuario['id_user'];
                                        $contador_user++;
                                    ?>
                                    <tr>
                                        <td><?= $contador_user ?></td>
                                        <td><?=$usuario['nombre'];?></td>
                                        <td><?=$usuario['apellido'];?></td>
                                        <td><?=$usuario['dni'];?></td>
                                        <td><?=$usuario['ruc'];?></td>
                                        <td><?=$usuario['correo'];?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="./show.php?id=<?=$user_id_tabla?>" type="button"
                                                    class="btn btn-primary mr-2 btn-sm"><i class="bi bi-eye"> VISUALIZAR</i></a>
                                                <a href="./edit.php?id=<?=$user_id_tabla?>" type="button"
                                                    class="btn btn-success mr-2 btn-sm"><i
                                                        class="bi bi-pencil-square"> EDITAR </i></a>
                                                <form action="<?= APP_URL.'app/controller/usuario/borrado_user.php'?>"
                                                    onclick="preguntar<?=$user_id_tabla ?>(event)" method="post" id="miFormulario<?=$user_id_tabla;?>">
                                                    <input type="text" name="id_user" value="<?=$user_id_tabla ?>" hidden>
                                                    <button type="submit" class="btn btn-danger  mr-2 btn-sm">
                                                        <i class="bi bi-trash"> ELIMINAR </i></button>
                                                </form>
                                                <script>
                                                function preguntar<?=$user_id_tabla?>(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: 'ELIMINAR REGISTRO',
                                                        text: '¿Desea eliminar este registro?',
                                                        icon: 'question',
                                                        showDenyButton: true,
                                                        confirmButtonText: 'ELIMINAR',
                                                        confirmButtonColor: '#B11807',
                                                        denyButtonColor: '#1A1616',
                                                        denyButtonText: 'CANCELAR',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            var form = $('#miFormulario<?= $user_id_tabla; ?>');
                                                            form.submit();
                                                        }
                                                    });
                                                }
                                                </script>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
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
<script>
$(function() {
    $("#example1").DataTable({
        "pageLength": 5,
        "language": {
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
            "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
            "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscador:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                }, {
                    extend: 'csv'
                }, {
                    extend: 'excel'
                }, {
                    text: 'Imprimir',
                    extend: 'print'
                }]
            },
        ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
</script>