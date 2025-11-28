<?php
include '../../../app/config.php';

$gestion_id = $_POST['gestion_id'];
$nivel = $_POST['nivel'];
$turno = $_POST['turno'];


$sentencia = $pdo->prepare('INSERT INTO niveles (gestion_id,nivel,turno,fyh_creacion,estado) VALUES (:gestion_id,:nivel,:turno,:fyh_creacion,:estado)');

$sentencia->bindParam(':gestion_id',$gestion_id);
$sentencia->bindParam(':nivel',$nivel);
$sentencia->bindParam(':turno',$turno);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->bindParam(':estado',$estadoRegistro);

if ($sentencia->execute()) {
    //echo 'success';
        session_start();
            $_SESSION['mensaje'] = "Nivel Registrado correctamente";
            $_SESSION['icono'] = "success";
            header(header: 'Location:'.APP_URL."/admin/niveles");
} else {
    //echo 'error';
    session_start();
            $_SESSION['mensaje'] = "Error: Intente de nuevo";
            $_SESSION['icono'] = "error";
            header(header: 'Location:'.APP_URL."/admin/niveles/create.php");
}