<?php

$id_grado = $_GET['id'];
include '../../app/config.php';
include '../../admin/layout/parte1.php';

include '../../app/controllers/grados/datos_grados.php';
include '../../app/controllers/niveles/listadoNiveles.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Modificación del grado: <?=$curso;?></h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-6">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/grados/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nivel</label>
                                            <input type="text" name="id_grado" value="<?=$id_grado;?>" hidden>
                                            <select name="nivel_id" id="" class="form-control">
                                                <?php
                                                foreach ($niveles as $nivele){
                                                    ?>
                                                    <option value="<?=$nivele['id_nivel'];?>"<?=$nivel_id==$nivele['id_nivel'] ? 'selected' : ''?>><?=$nivele['nivel']." - ".$nivele['turno'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Curso</label>
                                            <select name="curso" id="" class="form-control">
                                                <option value="Pre-Escolar - 1"<?=$curso=='Pre-Escolar - 1' ? 'selected' : ''?>>Pre-Escolar - 1</option>
                                                <option value="Pre-Escolar - 2"<?=$curso=='Pre-Escolar - 2' ? 'selected' : ''?>>Pre-Escolar - 2</option>
                                                <option value="Primaria - 1"<?=$curso=='Primaria - 1' ? 'selected' : ''?>>Primaria - 1</option>
                                                <option value="Primaria - 2"<?=$curso=='Primaria - 2' ? 'selected' : ''?>>Primaria - 2</option>
                                                <option value="Primaria - 3"<?=$curso=='Primaria - 3' ? 'selected' : ''?>>Primaria - 3</option>
                                                <option value="Primaria - 4"<?=$curso=='Primaria - 4' ? 'selected' : ''?>>Primaria - 4</option>
                                                <option value="Primaria - 5"<?=$curso=='Primaria - 5' ? 'selected' : ''?>>Primaria - 5</option>
                                                <option value="Primaria - 6"<?=$curso=='Primaria - 6' ? 'selected' : ''?>>Primaria - 6</option>
                                                <option value="Secundaria - 1"<?=$curso=='Secundaria - 1' ? 'selected' : ''?>>Secundaria - 1</option>
                                                <option value="Secundaria - 2"<?=$curso=='Secundaria - 2' ? 'selected' : ''?>>Secundaria - 2</option>
                                                <option value="Secundaria - 3"<?=$curso=='Secundaria - 3' ? 'selected' : ''?>>Secundaria - 3</option>
                                                <option value="Bachillerato - 1"<?=$curso=='Bachillerato - 1' ? 'selected' : ''?>>Bachillerato - 1</option>
                                                <option value="Bachillerato - 2"<?=$curso=='Bachillerato - 2' ? 'selected' : ''?>>Bachillerato - 2</option>
                                                <option value="Bachillerato - 3"<?=$curso=='Bachillerato - 3' ? 'selected' : ''?>>Bachillerato - 3</option>
                                                <option value="Bachillerato - 4"<?=$curso=='Bachillerato - 4' ? 'selected' : ''?>>Bachillerato - 4</option>
                                                <option value="Bachillerato - 5"<?=$curso=='Bachillerato - 5' ? 'selected' : ''?>>Bachillerato - 5</option>
                                                <option value="Bachillerato - 6"<?=$curso=='Bachillerato - 6' ? 'selected' : ''?>>Bachillerato - 6</option>
                                                <option value="Licenciatura - 1"<?=$curso=='Licenciatura - 1' ? 'selected' : ''?>>Licenciatura - 1</option>
                                                <option value="Licenciatura - 2"<?=$curso=='Licenciatura - 2' ? 'selected' : ''?>>Licenciatura - 2</option>
                                                <option value="Licenciatura - 3"<?=$curso=='Licenciatura - 3' ? 'selected' : ''?>>Licenciatura - 3</option>
                                                <option value="Licenciatura - 4"<?=$curso=='Licenciatura - 4' ? 'selected' : ''?>>Licenciatura - 4</option>
                                                <option value="Licenciatura - 5"<?=$curso=='Licenciatura - 5' ? 'selected' : ''?>>Licenciatura - 5</option>
                                                <option value="Licenciatura - 6"<?=$curso=='Licenciatura - 6' ? 'selected' : ''?>>Licenciatura - 6</option>
                                                <option value="Licenciatura - 7"<?=$curso=='Licenciatura - 7' ? 'selected' : ''?>>Licenciatura - 7</option>
                                                <option value="Licenciatura - 8"<?=$curso=='Licenciatura - 8' ? 'selected' : ''?>>Licenciatura - 8</option>
                                                <option value="Licenciatura - 9"<?=$curso=='Licenciatura - 9' ? 'selected' : ''?>>Licenciatura - 9</option>
                                                <option value="Licenciatura - 10"<?=$curso=='Licenciatura - 10' ? 'selected' : ''?>>Licenciatura - 10</option>
                                                <option value="Licenciatura - 11"<?=$curso=='Licenciatura - 11' ? 'selected' : ''?>>Licenciatura - 11</option>
                                                <option value="Licenciatura - 12"<?=$curso=='Licenciatura - 12' ? 'selected' : ''?>>Licenciatura - 12</option>
                                                <option value="Maestria"<?=$curso=='Maestria' ? 'selected' : ''?>>Maestria</option>
                                                <option value="Doctorado"<?=$curso=='Doctorado' ? 'selected' : ''?>>Doctorado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Turnos</label>
                                            <select name="paralelo" id="" class="form-control">
                                                <option value="A"<?=$paralelo=='A' ? 'selected' : ''?>>A</option>
                                                <option value="B"<?=$paralelo=='B' ? 'selected' : ''?>>B</option>
                                                <option value="C"<?=$paralelo=='C' ? 'selected' : ''?>>C</option>
                                                <option value="D"<?=$paralelo=='D' ? 'selected' : ''?>>D</option>
                                                <option value="E"<?=$paralelo=='E' ? 'selected' : ''?>>E</option>
                                                <option value="F"<?=$paralelo=='F' ? 'selected' : ''?>>F</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?=APP_URL;?>/admin/grados" class="btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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