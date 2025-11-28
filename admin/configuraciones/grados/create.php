<?php
include '../../app/config.php';
include '../../admin/layout/parte1.php';

include '../../app/controllers/niveles/listadoNiveles.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Registro de nuevo grado</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-6">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/grados/create.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nivel</label>
                                            <select name="nivel_id" id="" class="form-control">
                                                <?php
                                                foreach ($niveles as $nivele){
                                                    ?>
                                                    <option value="<?=$nivele['id_nivel'];?>"><?=$nivele['nivel']." - ".$nivele['turno'];?></option>
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
                                                <option value="Pre-Escolar - 1">Pre-Escolar - 1</option>
                                                <option value="Pre-Escolar - 2">Pre-Escolar - 2</option>
                                                <option value="Primaria - 1">Primaria - 1</option>
                                                <option value="Primaria - 2">Primaria - 2</option>
                                                <option value="Primaria - 3">Primaria - 3</option>
                                                <option value="Primaria - 4">Primaria - 4</option>
                                                <option value="Primaria - 5">Primaria - 5</option>
                                                <option value="Primaria - 6">Primaria - 6</option>
                                                <option value="Secundaria - 1">Secundaria - 1</option>
                                                <option value="Secundaria - 2">Secundaria - 2</option>
                                                <option value="Secundaria - 3">Secundaria - 3</option>
                                                <option value="Bachillerato - 1">Bachillerato - 1</option>
                                                <option value="Bachillerato - 2">Bachillerato - 2</option>
                                                <option value="Bachillerato - 3">Bachillerato - 3</option>
                                                <option value="Bachillerato - 4">Bachillerato - 4</option>
                                                <option value="Bachillerato - 5">Bachillerato - 5</option>
                                                <option value="Bachillerato - 6">Bachillerato - 6</option>
                                                <option value="Licenciatura - 1">Licenciatura - 1</option>
                                                <option value="Licenciatura - 2">Licenciatura - 2</option>
                                                <option value="Licenciatura - 3">Licenciatura - 3</option>
                                                <option value="Licenciatura - 4">Licenciatura - 4</option>
                                                <option value="Licenciatura - 5">Licenciatura - 5</option>
                                                <option value="Licenciatura - 6">Licenciatura - 6</option>
                                                <option value="Licenciatura - 7">Licenciatura - 7</option>
                                                <option value="Licenciatura - 8">Licenciatura - 8</option>
                                                <option value="Licenciatura - 9">Licenciatura - 9</option>
                                                <option value="Licenciatura - 10">Licenciatura - 10</option>
                                                <option value="Licenciatura - 11">Licenciatura - 11</option>
                                                <option value="Licenciatura - 12">Licenciatura - 12</option>
                                                <option value="Maestria">Maestria</option>
                                                <option value="Doctorado">Doctorado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Turnos</label>
                                            <select name="paralelo" id="" class="form-control">
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                                <option value="F">F</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Registrar</button>
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

include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');

?>
