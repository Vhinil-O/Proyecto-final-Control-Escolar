<?php
include '../../../../app/config.php';

$gestion = $_POST['gestion'];
$estado = $_POST['estado'];
if ($estado == 'Activo') $estado = 1;

else $estado = 0;

$sentencia = $pdo->prepare('INSERT INTO gestiones (gestion,fyh_creacion,estado) VALUES (:gestion,:fyh_creacion,:estado)');

$sentencia->bindParam(':gestion',$gestion);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->bindParam(':estado',$estado);

if ($sentencia->execute()) {
    echo 'success';
        session_start();
            $_SESSION['mensaje'] = "Gestion Registrada correctamente";
            $_SESSION['icono'] = "success";
            header(header: 'Location:'.APP_URL."/admin/configuraciones/gestion");
} else {
    echo 'error';
    session_start();
            $_SESSION['mensaje'] = "Error: Intente de nuevo";
            $_SESSION['icono'] = "error";
            header(header: 'Location:'.APP_URL."/admin/configuraciones/gestion/create.php");
}