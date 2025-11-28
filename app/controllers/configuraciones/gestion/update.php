<?php
include '../../../../app/config.php';

$gestion = $_POST['gestion'];
$estado = $_POST['estado'];
$id_gestion = $_POST['id_gestion'];

if ($estado == 'Activo') $estado = 1;

else $estado = 0;

$sentencia = $pdo->prepare('UPDATE gestiones SET gestion=:gestion,fyh_actualizacion=:fyh_actualizacion,estado=:estado WHERE id_gestion=:id_gestion');

$sentencia->bindParam(':gestion',$gestion);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':estado',$estado);
$sentencia->bindParam(':id_gestion',$id_gestion);

if ($sentencia->execute()) {
    echo 'success';
        session_start();
            $_SESSION['mensaje'] = "Gestion Actualizo correctamente";
            $_SESSION['icono'] = "success";
            header(header: 'Location:'.APP_URL."/admin/configuraciones/gestion");
} else {
    echo 'error';
    session_start();
            $_SESSION['mensaje'] = "Error: Intente de nuevo";
            $_SESSION['icono'] = "error";
            header(header: 'Location:'.APP_URL."/admin/configuraciones/gestion/create.php");
}