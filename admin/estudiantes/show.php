<?php

$id_estudiante = $_GET['id'];
include '../../app/config.php';
include '../../admin/layout/parte1.php';
include '../../app/controllers/estudiantes/datos_del_estudiante.php';
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
                <h1>Datos del estudiante: <?=$apellidos." ".$nombres?></h1>
            </div>
            <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">Datos del estudiante</h3>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombre del rol</label>
                                            <p><?=$nombre_rol;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <p><?=$nombres;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                            <p><?=$apellidos;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">NUA</label>
                                            <p><?=$NUE_NUA;?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento</label>
                                            <p><?=$fecha_nacimiento;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <p><?=$celular;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Correo electrónico</label>
                                            <p><?=$email;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Dirección</label>
                                            <p><?=$direccion;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Fecha y hora de registro</label>
                                            <p><?=$fyh_creacion;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Estado</label>
                                        <p><?php
                                            if ($estado == '1') echo "ACTIVO";
                                            else echo "INACTIVO";
                                            ?></p>
                                    </div>
                                </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">Datos académicos</h3>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nivel</label>
                                            <p><?=$nivel." - ".$turno;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Grado</label>
                                            <p><?=$curso." | ".$paralelo;?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">Datos del padre de familia</h3>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres y Apellidos</label>
                                            <p><?=$nombres_apellidos_ppff;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Carnet de Identidad</label>
                                            <p><?=$ci_ppff;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <p><?=$celular_ppff;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Ocupación</label>
                                            <p><?=$ocupacion_ppff;?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombres y apellidos de referencia</label>
                                            <p><?=$ref_nombre;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Parenteso de la referencia</label>
                                            <p><?=$ref_parentesco;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Celular de la referencia</label>
                                            <p><?=$ref_celular;?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="<?= APP_URL ?>/admin/estudiantes" class="btn btn-secondary btn-lg">Volver</a>
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
include '../layout/parte2.php';
include '../../layout/mensajes.php';
?>