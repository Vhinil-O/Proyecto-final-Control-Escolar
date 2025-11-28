<?php
  include '../../app/config.php';
  include '../../admin/layout/parte1.php';

  include '../../app/controllers/configuraciones/gestion/listadoGestiones.php';
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
     <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Registro de Datos</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Ingrese los datos necesarios</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="<?= APP_URL;?>/app/controllers/niveles/create.php" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Gestion educativa</label>
                                <select name="gestion_id" id="" class="form-control">
                                    <?php
                                        foreach ($gestiones as $gestione) { 
                                            if($gestione['estado'] == "1") {
                                            ?>
                                        <option value="<?=$gestione['id_gestion'];?>"><?=$gestione['gestion'];?></option>
                                        <?php } }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Niveles</label>
                                <select name="nivel" id="" class="form-control">
                                    <option value="Pre-Escolar">Pre-Escolar</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Secundaria">Secundaria</option>
                                    <option value="Bachilerato">Bachilerato</option>
                                    <option value="Licenciatura">Licenciatura</option>
                                    <option value="Maestria">Maestria</option>
                                    <option value="Doctorado">Doctorado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Turnos</label>
                                <select name="turno" id="" class="form-control">
                                    <option value="Matutino">Matutino</option>
                                    <option value="Vespertino">Vespertino</option>
                                    <option value="Completo">Completo</option>
                                </select>
                            </div>
                        </div>
                    </div>               
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Registrar</button>
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
