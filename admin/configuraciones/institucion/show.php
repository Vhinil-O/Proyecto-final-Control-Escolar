<?php

$id_config_institucion = $_GET['id'];
  include '../../../app/config.php';
  include '../../../admin/layout/parte1.php';

  include '../../../app/controllers/configuraciones/institucion/datosInstitucion.php'
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
     <br>
    <div class="content">
      <div class="container">
        <div class="row">
          <h1>Institucion: <?=$nombreInstitucion;?></h1>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-secondary">
              <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nombre de la institucion </label>
                                        <p><?=$nombreInstitucion?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Correo de la institucion </label>
                                        <p><?=$email?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Telefono de la institucion </label>
                                        <p><?=$telefono?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Celular de la institucion </label>
                                        <p><?=$celular?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Direccion de la institucion </label>
                                        <p><?=$direccion?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Logo de la institucion</label>
                                    <center>
                                        <img src="<?=APP_URL."/public/images/configuracion/".$institucione['logo'] ?>" width="100px"  alt="">
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="<?=APP_URL;?>/admin/configuraciones/institucion/" class="btn btn-danger">Volver</a>
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

  <script>
    function archivo(evt) {
        var files = evt.target.files; // FileList object
        // Obtenemos la imagen del campo "file".
        for (var i = 0, f; f = files[i]; i++) {
            //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function (theFile) {
                return function (e) {
                    // Insertamos la imagen
                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="70%" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('file').addEventListener('change', archivo, false);
</script>