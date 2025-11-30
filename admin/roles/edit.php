<?php
$idRol = $_GET['id'];
include '../../app/config.php';
include '../../admin/layout/parte1.php';

include '../../app/controllers/roles/datosRol.php';
if ($rol_usuario_sesion != 1) {
    //echo "No tienes permisos para ver esta página.";
    // Opcional: Redirigirlo a su panel correspondiente
    header('Location: '.APP_URL.'/login'); 
    exit;
}
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
     <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Editar el rol: <?= $nombreRol ?></h1>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Informacion General</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="<?= APP_URL;?>/app/controllers/roles/update.php" method="post">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nombre del rol</label>
                            <input type="text" name="idRol" value="<?= $idRol?>" hidden>
                            <input type="text" class="form-control" name="rolNombre" value="<?= $nombreRol ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="<?=APP_URL;?>/admin/roles" class="btn btn-danger">Cancelar</a>
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
  <?php
    include '../../admin/layout/parte2.php';
    include '../../layout/mensajes.php';
  ?>
