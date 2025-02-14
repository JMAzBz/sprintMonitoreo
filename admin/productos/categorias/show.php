<?php
$catg_id = $_GET['id'];
require_once("../../../app/config.php");
require_once("../../../admin/layout/parte1.php");
require_once("../../../app/controller/producto/categoria/datos_categoria.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h2>CATEGORIA "<?=$nombre_catg?>"</h1>
                </div>
            </div>
            <div class=" row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos registrados</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL?>/app/controllers/roles/create.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="rol_name">Nombre del rol</label>
                                            <input type="text" value="<?=$nombre_catg?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="rol_name">Registro creado en la fecha y hora:</label>
                                            <input type="date-time" value="<?=$insert_at?>" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="<?=APP_URL.'admin/productos/categorias/categoria.php'?>" class="btn btn-secondary">Volver</a>
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
<?php require_once("../../layout/parte2.php");
require_once("../../layout/mensajes.php");
?>
<script>
$(function() {
    $("#example1").DataTable({
        "pageLength": 5,
        "language": {
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Roles",
            "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
            "infoFiltered": "(Filtrado de _MAX_ total Roles)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Roles",
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
        }],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
</script>