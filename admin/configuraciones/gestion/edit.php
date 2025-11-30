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
          <h1>Modificacion de: <?= $gestion;?></h1>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Ingrese los datos necesarios</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="<?= APP_URL;?>/app/controllers/configuraciones/gestion/update.php" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="id_gestion" value="<?=$id_gestion;?> " hidden>
                                <label for="">Gestion educativa <b>*</b></label>
                                <input type="text" value="<?=$gestion;?>" name="gestion" class="form-control" required>
                            </div>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <select name="estado" id="" class="form-control">
                                    <?php
                                    if ($estado == 1) {
                                    ?>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                    <?php } else {?>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo" selected>Inactivo</option> <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>               
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="<?=APP_URL;?>/admin/configuraciones/gestion" class="btn btn-danger">Cancelar</a>
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
    include '../../../admin/layout/parte2.php';
    include '../../../layout/mensajes.php';
  ?>