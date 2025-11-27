<?php
  include '../../app/config.php';
  include '../../admin/layout/parte1.php';



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
        <div class="col-md-4     col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="far"><i class="bi bi-book"></i> </i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Datos de la Institucion</b></span>
                <a href="institucion" class="btn btn-primary btn-sm" >Configurar</a>
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

  