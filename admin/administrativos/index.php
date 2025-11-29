<?php
include '../../app/config.php';
include '../../admin/layout/parte1.php';
include '../../app/controllers/administrativos/listado_de_administrativos.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Listado del personal administrativo</h1>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Administrativos registrados</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo administrativo</a>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Nro</th>
                                        <th style="text-align: center;">Nombres del usuario</th>
                                            <th style="text-align: center;">Rol</th>
                                        <th style="text-align: center;">C.I.</th>
                                        <th style="text-align: center;">Fecha de nacimiento</th>
                                        <th style="text-align: center;">Correo</th>
                                        <th style="text-align: center;">Estado</th>
                                        <th style="text-align: center;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador_administrativo = 0;
                                    foreach ($administrativos as $administrativo) {
                                        $id_administrativo = $administrativo['id_administrativo'];
                                        $contador_administrativo++;
                                    ?>
                                        <tr>
                                            <td style="text-align: center;"><?= $contador_administrativo; ?></td>
                                            <td><?= $administrativo['nombres']." ".$administrativo['apellidos']; ?></td>
                                            <td><?= $administrativo['nombre_rol']; ?></td>
                                            <td><?= $administrativo['ci']; ?></td>
                                            <td><?= $administrativo['fecha_nacimiento']; ?></td>
                                            <td><?= $administrativo['email']; ?></td>
                                            <td style="text-align: center;">
                                            <?php
                                            if ($administrativo['estado']== 1) {
                                                echo "ACTIVO";
                                            }
                                            else{
                                                echo "INACTIVO";
                                            }
                                            ?></td>
                                            <td style="text-align: center;">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="show.php?id=<?=$id_administrativo;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                    <a href="edit.php?id=<?=$id_administrativo;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                    <form action="<?=APP_URL;?>/app/controllers/administrativos/delete.php" onclick="preguntar<?=$id_administrativo;?>(event)" method="post" id="miFormulario<?=$id_administrativo;?>">
                                                        <input type="text" name="id_administrativo" value="<?=$id_administrativo?>" hidden>
                                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px;"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                    <script>
                                                        function preguntar<?=$id_administrativo;?>(event){
                                                            event.preventDefault();
                                                            Swal.fire({
                                                                title: 'Eliminar registro',
                                                                text: "Desea eliminar este registro?",
                                                                icon: 'question',
                                                                showDenyButton: true,
                                                                confirmButtonText: 'Eliminar',
                                                                confirmButtonColor: '#a5161d',
                                                                denyButtonColor: '#270a0a',
                                                                denyButtonText: 'Cancelar'
                                                            }).then((result) => {
                                                                if(result.isConfirmed){
                                                                    var form = $('#miFormulario<?=$id_administrativo;?>');
                                                                    form.submit();
                                                                }
                                                            })
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
include '../layout/parte2.php';
include '../../layout/mensajes.php';
?>

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Administrativos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Grados",
                "infoFiltered": "(Filtrado de _MAX_ total Administrativos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Administrativos",
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
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                },{
                    extend: 'csv'
                },{
                    extend: 'excel'
                },{
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
            },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>