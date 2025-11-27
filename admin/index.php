<?php
  include '../app/config.php';
  include '../admin/layout/parte1.php';
  include '../app/controllers/roles/listadoRoles.php';
  include '../app/controllers/usuarios/listadoUsuarios.php';
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
     <br>
    <div class="container">
      <div class="container">
        <div class="row">
          <h1>Siestema de Gestion Escolar</h1>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                  $contadorRol = 0;
                  foreach ($roles as $role) {
                    $contadorRol++;
                  }
                ?>
                <h3><?=$contadorRol;?></h3>
                <p>Roles registrados</p>
              </div>
              <div class="icon">
                <i class="fas"><i class="bi bi-person-vcard"></i></i>
              </div>
              <a href="<?=APP_URL?>/admin/roles" class="small-box-footer">
                Mas informacion <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $contadorUser = 0;
                  foreach ($usuarios as $usuario) {
                    $contadorUser++;
                  }
                ?>
                <h3><?=$contadorUser;?></h3>
                <p>Usuarios registrados</p>
              </div>
              <div class="icon">
                <i class="fas"><i class="bi bi-person-fill"></i></i>
              </div>
              <a href="<?=APP_URL?>/admin/usuarios" class="small-box-footer">
                Mas informacion <i class="fas fa-arrow-circle-right"></i>
              </a>
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
    include '../admin/layout/parte2.php';
    include '../layout/mensajes.php';
  ?>