<?php 
require_once("../../app/config.php");
require_once("../../admin/layout/parte1.php");
require_once("../../app/controller/insidencias/lista_insidencia.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="container">
                <h1 class="text-center">INSIDENCIAS REGISTRADAS</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Listado de insidencias</h3>
                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <i class="nav-giticon fas"><i class="bi bi-file-text"></i></i></i>
                                    <a href="<?= APP_URL.'admin/insidencias/create.php'?>" class="text-white">Nuevo Registro</a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1"
                                class="table table-bordered table-hover table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>FECHA</th>
                                        <th>EVENTO</th>
                                        <th>DESCRIPCIONES</th>
                                        <th>NV CRITICO</th>
                                        <th>CATEGORIA</th>
                                        <th>AREA</th>
                                        <th>ETAPA</th>
                                        <th class="no-export">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($insidencias as $datos) {
                                        $id_insid = $datos['id_insd'];
                                        $contador ++;
                                    ?>
                                    <tr>
                                        <td><?=$contador?></td>
                                        <td><?=$datos['fecha'] ?></td>
                                        <td><?=$datos['evento'] ?></td>
                                        <td><?=$datos['descripcion'] ?></td>
                                        <td><?=$datos['nv_critico'] ?></td>
                                        <td><?=$datos['categoria'] ?></td>
                                        <td><?=$datos['area'] ?></td>
                                        <td><?=$datos['etapa'] ?></td>
                                        <td class="no-export">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="./show.php?id=<?=$id_insid?>" type="button"
                                                    class="btn btn-primary mr-2 btn-sm"><i class="bi bi-eye"></i></a>
                                                <a href="./edit.php?id=<?=$id_insid?>" type="button"
                                                    class="btn btn-success mr-2 btn-sm"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <form action="<?= APP_URL.'app/controller/insidencias/borrado_insidencias.php'?>"
                                                    onclick="preguntar<?=$id_insid?>(event)" method="post" id="miFormulario<?=$id_insid;?>">
                                                    <input type="text" name="id_insid" value="<?=$id_insid?>" hidden>
                                                    <button type="submit" class="btn btn-danger  mr-2 btn-sm">
                                                        <i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                function preguntar<?=$id_insid?>(event) {
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
                                                            var form = $('#miFormulario<?= $id_insid ?>');
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
        "pageLength": 5,
        "language": {
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Insidencias",
            "infoEmpty": "Mostrando 0 a 0 de 0 Insidencias",
            "infoFiltered": "(Filtrado de _MAX_ total Insidencias)",
            "lengthMenu": "Mostrar _MENU_",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscador:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        "responsive": true,
        "autoWidth": false,
        buttons: [
            {
                extend: 'collection',
                text: 'Reportes',
                buttons: [
                    {
                        extend: 'copy',
                        text: 'Copiar',
                        exportOptions: {
                            columns: ':not(.no-export)' // Excluye columnas con la clase no-export
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        exportOptions: {
                            columns: ':not(.no-export)'
                        }
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        exportOptions: {
                            columns: ':not(.no-export)'
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        exportOptions: {
                            columns: ':not(.no-export)'
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Imprimir'
                    }
                ]
            }
        ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});

</script>