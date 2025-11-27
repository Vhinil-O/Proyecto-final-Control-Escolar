<?php

include '../../../app/config.php';

$id_usuario = $_POST['idUser'];


$sentencia = $pdo->prepare("DELETE FROM usuarios where id_usuario=:id_usuario");

$sentencia->bindParam(':id_usuario',$id_usuario);

    if ($sentencia->execute()) {
    //echo "Todo bien";
    session_start();
    $_SESSION['mensaje'] = "Usuario ELIMINADO con exito";
    $_SESSION['icono'] = "success";
    header(header: 'Location:'.APP_URL."/admin/usuarios");
} else {
    //echo "Todo mal";
    session_start();
    $_SESSION['mensaje'] = "Usuario NO ELIMINADO";
    $_SESSION['icono'] = "error";
    header(header: 'Location:'.APP_URL."/admin/usuarios");
}
