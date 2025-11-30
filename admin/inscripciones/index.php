<?php
include '../../app/config.php';
include '../../admin/layout/parte1.php';
include '../../app/controllers/docentes/listado_de_docentes.php';
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
                <h1>Inscripciones <?= $anoActual ?></h1>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary"><i class="bi bi-person-plus"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Inscripciones</span>
                            <a href="create.php" class="btn btn-primary btn-sm">Nuevo estudiante</a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="bi bi-box-arrow-in-right"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Importar estudiantes</span>
                            <a href="importar" class="btn btn-success btn-sm">Importar </a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
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