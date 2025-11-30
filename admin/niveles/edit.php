<?php
$id_nivel =$_GET['id'];
  include '../../app/config.php';
  include '../../admin/layout/parte1.php';

  include '../../app/controllers/niveles/datosNivel.php';
  include '../../app/controllers/configuraciones/gestion/listadoGestiones.php';
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
          <h1>Editar nivel: <?=$nivel;?></h1>
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
                <form action="<?= APP_URL;?>/app/controllers/niveles/update.php" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Gestion educativa</label>
                                <input type="text" name="id_nivel" value="<?=$id_nivel;?>" hidden>
                                <select name="gestion_id" id="" class="form-control">
                                    <?php
                                        foreach ($gestiones as $gestione) { 
                                            if($gestione['estado'] == "1") {
                                            ?>
                                        <option value="<?=$gestione['id_gestion']; ?>"
                                        <?php if ($gestion_id == $gestione['id_gestion'] ) { ?> selected="selected" <?php } ?> >
                                        
                                        <?=$gestione['gestion'];?>
                                        </option>
                                        <?php } } ?>
                                </select>
                            </div>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Niveles</label>
                                <select name="nivel" id="" class="form-control">
                                    <option value="Pre-Escolar" <?php if ($nivel == 'Pre-Escolar' ) { ?> selected="selected" <?php } ?>>Pre-Escolar</option>
                                    <option value="Primaria" <?php if ($nivel == 'Primaria' ) { ?> selected="selected" <?php } ?>>Primaria</option>
                                    <option value="Secundaria" <?php if ($nivel == 'Secundaria' ) { ?> selected="selected" <?php } ?>>Secundaria</option>
                                    <option value="Bachilerato" <?php if ($nivel == 'Bachilerato' ) { ?> selected="selected" <?php } ?>>Bachilerato</option>
                                    <option value="Licenciatura" <?php if ($nivel == 'Licenciatura' ) { ?> selected="selected" <?php } ?>>Licenciatura</option>
                                    <option value="Maestria" <?php if ($nivel == 'Maestria' ) { ?> selected="selected" <?php } ?>>Maestria</option>
                                    <option value="Doctorado" <?php if ($nivel == 'Doctorado' ) { ?> selected="selected" <?php } ?>>Doctorado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Turnos</label>
                                <select name="turno" id="" class="form-control">
                                    <option value="Matutino" <?php if ($turno == 'Matutino' ) { ?> selected="selected" <?php } ?>>Matutino</option>
                                    <option value="Vespertino" <?php if ($turno == 'Vespertino' ) { ?> selected="selected" <?php } ?>>Vespertino</option>
                                    <option value="Completo" <?php if ($turno == 'Completo' ) { ?> selected="selected" <?php } ?>>Completo</option>
                                </select>
                            </div>
                        </div>
                    </div>               
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="<?=APP_URL;?>/admin/niveles" class="btn btn-danger">Cancelar</a>
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
