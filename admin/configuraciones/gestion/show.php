<?php
    $id_gestion = $_GET['id'];
  include '../../../app/config.php';
  include '../../../admin/layout/parte1.php';
  include '../../../app/controllers/configuraciones/gestion/datosGestion.php';
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
          <h1>Gestion educativa: <?= $gestion;?></h1>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos registrado</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Gestion educativa</label>
                                <p><?= $gestion;?></p>
                            </div>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <p><?php 
                                if ($estado == 1) echo "Activo";
                                else echo "Inactivo";
                                ?></p>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Fecha y hora de creacion</label>
                                <p><?= $fyh_creacion;?></p>
                            </div>
                        </div>
                    </div>                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="<?=APP_URL;?>/admin/configuraciones/gestion" class="btn btn-danger">Volver</a>
                        </div>
                    </div>
                </div>
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
    include '../../../admin/layout/parte2.php';
    include '../../../layout/mensajes.php';
  ?>