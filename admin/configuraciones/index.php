<?php
  include '../../app/config.php';
  include '../../admin/layout/parte1.php';
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
          <h1>Configuraciones Generales</h1>
      </div>
      <br>
      <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="far"><i class="bi bi-book"></i> </i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Datos de la Institucion</b></span>
                <a href="institucion" class="btn btn-primary btn-sm" >Configurar</a>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far"><i class="bi bi-journal-bookmark"></i> </i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Gestion Educativa</b></span>
                <a href="gestion" class="btn btn-info btn-sm" >Configurar</a>
              </div>
              <!-- /.info-box-content -->
            </div>
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

  