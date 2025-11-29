<?php
  include '../app/config.php';
  include '../admin/layout/parte1.php';
  include '../app/controllers/roles/listadoRoles.php';
  include '../app/controllers/usuarios/listadoUsuarios.php';
  include '../app/controllers/niveles/listadoNiveles.php';
  include '../app/controllers/grados/listado_de_grados.php';
  include '../app/controllers/materias/listado_de_materias.php';
  include '../app/controllers/administrativos/listado_de_administrativos.php';
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
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $contadorNiveles = 0;
                  foreach ($niveles as $nivele) {
                    $contadorNiveles++;
                  }
                ?>
                <h3><?=$contadorNiveles;?></h3>
                <p>Niveles registrados</p>
              </div>
              <div class="icon">
                <i class="fas"><i class="bi bi-mortarboard"></i></i>
              </div>
              <a href="<?=APP_URL?>/admin/niveles" class="small-box-footer">
                Mas informacion <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $contadorGrados = 0;
                  foreach ($grados as $grado) {
                    $contadorGrados++;
                  }
                ?>
                <h3><?=$contadorGrados;?></h3>
                <p>Grados registrados</p>
              </div>
              <div class="icon">
                <i class="fas"><i class="bi bi-bar-chart-line"></i></i>
              </div>
              <a href="<?=APP_URL?>/admin/grados" class="small-box-footer">
                Mas informacion <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $contadorMaterias = 0;
                  foreach ($materias as $materia) {
                    $contadorMaterias++;
                  }
                ?>
                <h3><?=$contadorMaterias;?></h3>
                <p>Materias registradas</p>
              </div>
              <div class="icon">
                <i class="fas"><i class="bi bi-journal-bookmark-fill"></i></i>
              </div>
              <a href="<?=APP_URL?>/admin/materias" class="small-box-footer">
                Mas informacion <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-dark">
              <div class="inner">
                <?php
                  $contadoradministrativos = 0;
                  foreach ($administrativos as $administrativo) {
                    $contadoradministrativos++;
                  }
                ?>
                <h3><?=$contadoradministrativos;?></h3>
                <p>Administrativos registrados</p>
              </div>
              <div class="icon">
                <i class="fas"><i class="bi bi-person-gear"></i></i>
              </div>
              <a href="<?=APP_URL?>/admin/administrativos" class="small-box-footer">
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