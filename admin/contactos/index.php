<?php 
require_once("../../app/config.php");
require_once("../../admin/layout/parte1.php");
require_once("../../app/controller/contactos/listado_contacto.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <div class="content">
        <div class="container">
            <div class="container">
                <h1 class="text-center">CONTACTOS REGISTRADAS</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-pink">
                        <div class="card-header">
                            <h3 class="card-title">PERSONAS REGISTRADAS</h3>
                            <div class="card-tools">
                                <button class="btn bg-pink">
                                    <i class="nav-giticon fas"><i class="bi bi-file-text"></i></i></i>
                                    <a href="./create.php" class="text-white">Nuevo Registro</a>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1"
                                class="table table-bordered table-hover text-center table-striped table-bordered nowrap">
                                <thead class="bg-pink">
                                    <tr>
                                        <th>Nº</th>
                                        <th>NOMBRE COMPLETO</th>
                                        <th>APELLIDO COMPLETO</th>
                                        <th>DNI</th>
                                        <th>RUC</th>
                                        <th>TELEFONO</th>
                                        <th>CORREO</th>
                                        <th class="no-export">ACCIONES</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        foreach ($personas as $datos_p) {
                                            $id_persona = $datos_p['id_persona'];
                                            $contador ++;
                                        ?>
                                        <tr>
                                            <td><?=$contador?></td>
                                            <td><?=$datos_p['nombre']?></td>
                                            <td><?=$datos_p['apellido']?></td>
                                            <td><?=$datos_p['dni']?></td>
                                            <td><?=$datos_p['ruc']?></td>
                                            <td><?=$datos_p['celular']?></td>
                                            <td><?=$datos_p['correo']?></td>
                                            <td class="no-export">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="./show.php?id=<?=$id_persona?>" type="button"
                                                        class="btn btn-primary mr-2 btn-sm"><i class="bi bi-eye"> VISUALIZAR </i></a>
                                                    <a href="./edit.php?id=<?=$id_persona?>" type="button"
                                                        class="btn btn-success mr-2 btn-sm"><i
                                                            class="bi bi-pencil-square"> EDITAR </i></a>
                                                    <form action="<?= APP_URL.'app/controller/contactos/borrado_persona.php'?>"
                                                        onclick="preguntar<?=$id_persona?>(event)" method="post" id="miFormulario<?=$id_persona;?>">
                                                        <input type="text" name="id_persona" value="<?=$id_persona?>" hidden>
                                                        <button type="submit" class="btn btn-danger  mr-2 btn-sm">
                                                            <i class="bi bi-trash"> ELIMINAR </i></button>
                                                    </form>
                                                    <script>
                                                    function preguntar<?=$id_persona?>(event) {
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
                                                                var form = $('#miFormulario<?= $id_persona ?>');
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
            info: "MOSTRANDO _START_ a _END_ de _TOTAL_ CONTACTOS",
            infoEmpty: "Mostrando 0 a 0 de 0 CONTACTOS",
            infoFiltered: "(Filtrado de _MAX_ total CONTACTOS)",
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