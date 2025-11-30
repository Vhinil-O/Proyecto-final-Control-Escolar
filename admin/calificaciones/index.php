<?php
include '../../app/config.php';
include '../layout/parte1.php';
include '../../app/controllers/docentes/listado_de_asignaciones.php';
if ($rol_usuario_sesion != 1) {
    //echo "No tienes permisos para ver esta página.";
    // Opcional: Redirigirlo a su panel correspondiente
    header('Location: '.APP_URL.'/login'); 
    exit;
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Grados asignados para calificaciones</h1>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Asignaciones registradas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Nro</th>

                                        <th style="text-align: center;">Nivel</th>
                                        <th style="text-align: center;">Turno</th>
                                        <th style="text-align: center;">Grado</th>
                                        <th style="text-align: center;">Grupo</th>
                                        <th style="text-align: center;">Materia</th>
                                        <th style="text-align: center;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($asignaciones as $asignacione) {
                                        $id_grado = $asignacione['id_grado'];
                                        if ($email_session == $asignacione['email']) {
                                            $contador = $contador + 1;
                                    ?>
                                            <tr>
                                                <td><?= $contador ?></td>
                                                <td><?= $asignacione['nivel'] ?></td>
                                                <td><?= $asignacione['turno'] ?></td>
                                                <td><?= $asignacione['curso'] ?></td>
                                                <td><?= $asignacione['paralelo'] ?></td>
                                                <td><?= $asignacione['nombre_materia'] ?></td>
                                                <td style="text-align: center;">
                                                    <a href="create.php?id_grado=<?= $id_grado ?>&&id_docente=<?= $asignacione['docente_id']?>&&id_materia=<?=$asignacione['materia_id']?>"
                                                        class="btn btn-primary btn-sm"><i class="bi bi-check2-square"></i> Subir notas</a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
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