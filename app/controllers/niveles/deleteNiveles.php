<?php

include '../../../app/config.php';

$id_nivel = $_POST['id_nivel'];


$sentencia = $pdo->prepare("DELETE FROM niveles where id_nivel=:id_nivel");

$sentencia->bindParam('id_nivel',$id_nivel);

    if ($sentencia->execute()) {
    //echo "Todo bien";
    session_start();
    $_SESSION['mensaje'] = "Datos ELIMINADOS con exito";
    $_SESSION['icono'] = "success";
    header(header: 'Location:'.APP_URL."/admin/niveles/");
} else {
    //echo "Todo mal";
    session_start();
    $_SESSION['mensaje'] = "Datos NO ELIMINADOS";
    $_SESSION['icono'] = "error";
    header(header: 'Location:'.APP_URL."/admin/niveles/");
}
