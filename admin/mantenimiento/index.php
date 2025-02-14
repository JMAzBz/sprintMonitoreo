<?php
require_once("../../app/config.php");
require_once("../../admin/layout/parte1.php");
require_once("../../app/controller/mantenimiento/list_mantenimiento.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="container">
                <h1 class="text-center">MANTENIMIENTOS REGISTRADOS</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-pink">
                        <div class="card-header">
                            <h3 class="card-title">LISTA MANTENIMIENTO</h3>
                            <div class="card-tools">
                                <button class="btn bg-pink">
                                    <i class="nav-giticon fas"><i class="bi bi-file-text"></i></i></i>
                                    <a href="<?= APP_URL . '/admin/mantenimiento/create.php' ?>" class="text-white">NUEVO REGISTRO</a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="example1"
                                class="table table-bordered table-hover text-center table-striped table-bordered nowrap">
                                <thead class="bg-pink">
                                    <tr>
                                        <th>Nº</th>
                                        <th>EQUIPO</th>
                                        <th>CODIGO</th>
                                        <th>CATEGORIA</th>
                                        <th>ARRANCO EN</th>
                                        <th>DELEGADOR</th>
                                        <th>ASIGANDO PARA</th>
                                        <th>FRECUENCIA</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($mantenimiento as $datos_m) {
                                        $producto_id = $datos_m['id_mant'];
                                        $contador++;
                                    ?>
                                        <tr>
                                            <td><?= $contador ?></td>
                                            <td><?= $datos_m['nombre'] ?></td>
                                            <td><?= $datos_m['code_alm'] ?></td>
                                            <td><?= $datos_m['categoria'] ?></td>
                                            <td><?= $datos_m['arranque_at'] ?></td>
                                            <td><?= $datos_m['delegador'] ?></td>
                                            <td><?= $datos_m['user_email'] ?></td>
                                            <td><?= $datos_m['fecuencia_mnt'] ?></td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="./show.php?id=<?= $producto_id ?>" type="button"
                                                        class="btn btn-primary mr-2 btn-sm"><i class="bi bi-eye"> VISUALIZAR </i></a>
                                                    <a href="./edit.php?id=<?= $producto_id ?>" type="button"
                                                        class="btn btn-success mr-2 btn-sm"><i
                                                            class="bi bi-pencil-square"> EDITAR </i></a>
                                                    <form action="<?= APP_URL . 'app/controller/mantenimiento/borrado_mantenimiento.php' ?>" method="post"
                                                        onclick="preguntar<?= $producto_id ?>(event)" method="post" id="miFormulario<?= $producto_id; ?>">
                                                        <input type="text" name="id_mant" value="<?= $producto_id ?>" hidden>
                                                        <button type="submit" class="btn btn-danger  mr-2 btn-sm">
                                                            <i class="bi bi-trash"> ELIMINAR </i></button>
                                                    </form>
                                                    <script>
                                                        function preguntar<?= $producto_id ?>(event) {
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
                                                                    var form = $('#miFormulario<?= $producto_id ?>');
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
    $(document).ready(function() {
        $("#example1").DataTable({
            dom: "Bfrtip",
            scrollX: true,
            pageLength: 10,
            responsive: false, // Con scrollX, desactiva responsive de DataTables.
            autoWidth: false,
            language: {
                emptyTable: "No hay información",
                info: "Mostrando _START_ a _END_ de _TOTAL_ Mantenimiento",
                infoEmpty: "Mostrando 0 a 0 de 0 Mantenimiento",
                infoFiltered: "(Filtrado de _MAX_ total Mantenimiento)",
                lengthMenu: "Mostrar _MENU_",
                loadingRecords: "Cargando...",
                processing: "Procesando...",
                search: "BUSCADOR:",
                zeroRecords: "Sin resultados encontrados",
                paginate: {
                    first: "Primero",
                    last: "Último",
                    next: "Siguiente",
                    previous: "Anterior"
                }
            },
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                buttons: ['copy', 'pdf', 'csv', 'excel', 'print']
            }]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>