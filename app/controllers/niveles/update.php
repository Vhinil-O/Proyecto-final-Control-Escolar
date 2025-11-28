<?php
include '../../../app/config.php';

$id_nivel = $_POST['id_nivel'];
$gestion_id = $_POST['gestion_id'];
$nivel = $_POST['nivel'];
$turno = $_POST['turno'];


$sentencia = $pdo->prepare('UPDATE niveles 
SET gestion_id=:gestion_id,
nivel=:nivel,
turno=:turno,
fyh_actualizacion=:fyh_actualizacion
WHERE id_nivel=:id_nivel');

$sentencia->bindParam(':gestion_id',$gestion_id);
$sentencia->bindParam(':nivel',$nivel);
$sentencia->bindParam(':turno',$turno);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_nivel',$id_nivel);

if ($sentencia->execute()) {
    //echo 'success';
        session_start();
            $_SESSION['mensaje'] = "Nivel Actualizado correctamente";
            $_SESSION['icono'] = "success";
            header(header: 'Location:'.APP_URL."/admin/niveles");
} else {
    //echo 'error';
    session_start();
            $_SESSION['mensaje'] = "Error: Intente de nuevo";
            $_SESSION['icono'] = "error";
            header(header: 'Location:'.APP_URL."/admin/niveles/update.php");
}