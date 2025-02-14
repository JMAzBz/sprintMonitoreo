<?php 
require_once("../../app/config.php");
require_once("../../admin/layout/parte1.php");
require_once("../../app/controller/insidencias/lista_responsable.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="container">
                <h1 class="text-center">RESPONSABLE REGISTRADOS</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Listado de categorias</h3>
                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <i class="nav-giticon fas"><i class="bi bi-file-text"></i></i></i>
                                    <a href="<?= APP_URL.'admin/responsables/create.php'?>" class="text-white">Nuevo Registro</a>
                                </button>   
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1"
                                class="table table-bordered table-hover table-sm table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>AREA</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($responsables as $datos) {
                                        $id_rspn = $datos['id_rspn'];
                                        $contador++;
                                    ?>
                                    <tr>
                                        <td><?= $contador?></td>
                                        <td><?= $datos['area']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="./show.php?id=<?= $id_rspn ?>" type="button"
                                                    class="btn btn-primary mr-2 btn-sm"><i class="bi bi-eye"></i></a>
                                                <a href="./edit.php?id=<?= $id_rspn ?>" type="button"
                                                    class="btn btn-success mr-2 btn-sm"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <form action="<?= APP_URL.'app/controller/insidencias/borrrado_responsable.php'?>"
                                                    onclick="preguntar<?= $id_rspn ?>(event)" method="post" id="miFormulario<?=$id_rspn?>">
                                                    <input type="text" name="id_rspn" value="<?=$id_rspn ?>" hidden>
                                                    <button type="submit" class="btn btn-danger  mr-2 btn-sm">
                                                        <i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                function preguntar<?=$id_rspn?>(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: 'Eliminar registro',
                                                        text: '¿Desea eliminar este registro?',
                                                        icon: 'question',
                                                        showDenyButton: true,
                                                        confirmButtonText: 'Eliminar',
                                                        confirmButtonColor: '#a5161d',
                                                        denyButtonColor: '#270a0a',
                                                        denyButtonText: 'Cancelar',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            var form = $('#miFormulario<?= $id_rspn; ?>');
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
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Categorias",
            "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
            "infoFiltered": "(Filtrado de _MAX_ total Roles)",
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
        "buttons": [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy'
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
            }]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
</script>