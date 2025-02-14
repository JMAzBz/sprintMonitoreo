<?php 
require_once("../../app/config.php");
require_once("../../admin/layout/parte1.php");
require_once("../../app/controller/producto/lista_producto.php");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="container">
                <h1 class="text-center">INVENTARIO REGISTRADOS</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-purple">
                        <div class="card-header">
                            <h3 class="card-title">LISTA INVENTARIO</h3>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="example1"
                                class="table table-bordered table-hover text-center table-striped table-bordered nowrap">
                                <thead class="bg-purple">
                                    <tr>
                                        <th>Nº</th>
                                        <th>CODIGO INTERNO</th>
                                        <th>NOMBRE</th>
                                        <th>MARCA</th>
                                        <th>DESCRIPCION</th>
                                        <th>TIPO</th>
                                        <th>CATEGORIA</th>
                                        <th>EN STOCK</th>
                                        <th>UNIDAD MEDIDA</th>
                                        <th>FECHA RECEPCION</th>
                                        <!-- <th>HORA RECEPCION</th> -->
                                        <th>DEPOSITO</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($productos as $datos_p) {
                                        $producto_id = $datos_p['id_almacen'];
                                        $contador ++;
                                    ?>
                                    <tr>
                                        <td><?=$contador?></td>
                                        <td><?=$datos_p['code_alm']?></td>
                                        <td><?=$datos_p['nombre']?></td>
                                        <td><span class="badge bg-purple"><?=$datos_p['marca']?></span> </td>
                                        <td class="text-truncate" style="max-width: 300px;"><?=$datos_p['descripcion']?></td>
                                        <td><span class="badge bg-primary"><?=$datos_p['tipo']?></span></td>
                                        <td><span class="badge bg-pink"><?=$datos_p['categoria']?></span></td>
                                        <td><?=$datos_p['stock']?></td>
                                        <td><span class="badge bg-purple"><?=$datos_p['unidad_md']?></span></td>
                                        <td><?=$datos_p['reception_at']?></td>
                                        <td><?=$datos_p['deposito']?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="./show.php?id=<?=$producto_id?>" type="button"
                                                    class="btn btn-primary mr-2 btn-sm"><i class="bi bi-eye"> VISUALIZAR </i></a>
                                                <a href="./edit.php?id=<?=$producto_id?>" type="button"
                                                    class="btn btn-success mr-2 btn-sm"><i
                                                        class="bi bi-pencil-square"> EDITAR STOCK</i></a>
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
            info: "Mostrando _START_ a _END_ de _TOTAL_ INVENTARIOS",
            infoEmpty: "Mostrando 0 a 0 de 0 Productos",
            infoFiltered: "(Filtrado de _MAX_ total Usuarios)",
            lengthMenu: "Mostrar _MENU_",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscador:",
            zeroRecords: "Sin resultados encontrados",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            }
        },
        buttons: [
            {
                extend: 'collection',
                text: 'Reportes',
                buttons: ['copy', 'pdf', 'csv', 'excel', 'print']
            }
        ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});

</script>