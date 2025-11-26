<?php

include '../../../app/config.php';

$idRol = $_POST['idRol'];


$sentencia = $pdo->prepare("DELETE FROM roles where id_rol=:id_rol");

$sentencia->bindParam('id_rol',$idRol);

    if ($sentencia->execute()) {
    //echo "Todo bien";
    session_start();
    $_SESSION['mensaje'] = "Rol ELIMINADO con exito";
    $_SESSION['icono'] = "success";
    header(header: 'Location:'.APP_URL."/admin/roles");
} else {
    //echo "Todo mal";
    session_start();
    $_SESSION['mensaje'] = "Rol NO ELIMINADO";
    $_SESSION['icono'] = "error";
    header(header: 'Location:'.APP_URL."/admin/roles");
}