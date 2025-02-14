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
                <h1 class="text-center">PRODUCTOS REGISTRADOS</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-purple">
                        <div class="card-header">
                            <h3 class="card-title">LISTA PRODUCTOS</h3>
                            <div class="card-tools">
                                <button class="btn bg-purple">
                                    <i class="nav-giticon fas"><i class="bi bi-file-text"></i></i></i>
                                    <a href="<?= APP_URL.'admin/productos/create.php'?>" class="text-white">NUEVO REGISTRO</a>
                                </button>
                            </div>
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
                                        <th>RECEPCIONADO POR</th>
                                        <th>DEPOSITO</th>
                                        <th>VIDA UTIL</th>
                                        <th>PROVEEDOR</th>
                                        <th>PRECIO VENTA</th>
                                        <th>PRECIO COMPRA</th>
                                        <th>VALOR ACTUAL</th>
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
                                        <td><span class="badge bg-purple"><?=$datos_p['marca']?></span></td>
                                        <td class="text-truncate" style="max-width: 300px;"><?=$datos_p['descripcion']?></td>
                                        <td><span class="badge bg-primary"><?=$datos_p['tipo']?></span></td>
                                        <td><span class="badge bg-pink"><?=$datos_p['categoria']?></span></td>
                                        <td><?=$datos_p['stock']?></td>
                                        <td><span class="badge bg-navy"><?=$datos_p['unidad_md']?></span></td>
                                        <td><?=$datos_p['reception_at']?></td>
                                        <td><?=$datos_p['user_email']?></td>
                                        <td><?=$datos_p['deposito']?></td>
                                        <td><p class="badge bg-olive"><?=$datos_p['vida_util']?></p></td>
                                        <td><?=$datos_p['proveedor']?></td>
                                        <td><?=$datos_p['venta_price']?></td>
                                        <td><?=$datos_p['costo_price']?></td>
                                        <td><?=$datos_p['valor_actual']?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="./show.php?id=<?=$producto_id?>" type="button"
                                                    class="btn btn-primary mr-2 btn-sm"><i class="bi bi-eye"> VISUALIZAR </i></a>
                                                <a href="./edit.php?id=<?=$producto_id?>" type="button"
                                                    class="btn btn-success mr-2 btn-sm"><i
                                                        class="bi bi-pencil-square"> EDITAR </i></a>
                                                <form action="<?=APP_URL.'app/controller/producto/borrado_producto.php'?>" method="post"
                                                    onclick="preguntar<?=$producto_id?>(event)" method="post" id="miFormulario<?=$producto_id;?>">
                                                    <input type="text" name="id_almacen" value="<?=$producto_id?>" hidden>
                                                    <button type="submit" class="btn btn-danger  mr-2 btn-sm">
                                                        <i class="bi bi-trash"> ELIMINAR </i></button>
                                                </form>
                                                <script>
                                                function preguntar<?=$producto_id?>(event) {
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
            info: "MOSTRANDO _START_ a _END_ de _TOTAL_ PRODUCTOS",
            infoEmpty: "Mostrando 0 a 0 de 0 PRODUCTOS",
            infoFiltered: "(Filtrado de _MAX_ total PRODUCTOS)",
            lengthMenu: "MOSTRAR _MENU_",
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