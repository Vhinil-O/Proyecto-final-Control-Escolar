<?php

$id_administrativo = $_GET['id'];
include '../../app/config.php';
include '../../admin/layout/parte1.php';
include '../../app/controllers/roles/listadoRoles.php';
include '../../app/controllers/administrativos/datos_administrativos.php';
if ($rol_usuario_sesion != 1) {
    //echo "No tienes permisos para ver esta página.";
    // Opcional: Redirigirlo a su panel correspondiente
    header('Location: '.APP_URL.'/login'); 
    exit;
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Personal administrativo: <?=$nombres." ".$apellidos?></h1>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?= APP_URL ?>/app/controllers/administrativos/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" value="<?=$id_administrativo?>" name="id_administrativo" hidden>
                                            <input type="text" value="<?=$id_usuario?>" name="id_usuario" hidden>
                                            <input type="text" value="<?=$id_persona?>" name="id_persona" hidden>
                                            <label for="">Nombre del rol</label>
                                            <a href="<?= APP_URL ?>/admin/roles/create.php" style="margin-left: 3px;" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i></a>
                                            <div class="form-inline">
                                                <select name="rol_id" id="" class="form-control">
                                                    <?php
                                                    foreach ($roles as $role) { ?>
                                                        <option value="<?= $role['id_rol']; ?>" <?=$nombre_rol == $role['nombre_rol'] ? 'selected' : ''?>><?= $role['nombre_rol']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <input type="text" name="nombres" class="form-control" value="<?=$nombres;?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                            <input type="text" name="apellidos" class="form-control" value="<?=$apellidos;?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">NUE</label>
                                            <input type="number" name="ci" class="form-control" value="<?=$NUE_NUA;?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" class="form-control" value="<?=$fecha_nacimiento;?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="number" name="celular" class="form-control" value="<?=$celular;?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Profesión</label>
                                            <input type="text" name="profesion" class="form-control" value="<?=$profesion;?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Correo electrónico</label>
                                            <input type="text" name="email" class="form-control" value="<?=$email;?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="">Dirección</label>
                                            <input type="text" name="direccion" class="form-control" value="<?=$direccion;?>" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?= APP_URL ?>/admin/administrativos" class="btn btn-secondary">Cancelar</a>
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
include '../layout/parte2.php';
include '../../layout/mensajes.php';
?>