<?php

include '../../../../app/config.php';

$id_config_institucion = $_POST['id_config_institucion'];


$sentencia = $pdo->prepare("DELETE FROM configuracion_instituciones where id_config_institucion=:id_config_institucion");

$sentencia->bindParam(':id_config_institucion',$id_config_institucion);

    if ($sentencia->execute()) {
    //echo "Todo bien";
    session_start();
    $_SESSION['mensaje'] = "Datos ELIMINADOS con exito";
    $_SESSION['icono'] = "success";
    header(header: 'Location:'.APP_URL."/admin/configuraciones/institucion/");
} else {
    //echo "Todo mal";
    session_start();
    $_SESSION['mensaje'] = "Datos NO ELIMINADOS";
    $_SESSION['icono'] = "error";
    header(header: 'Location:'.APP_URL."/admin/configuraciones/institucion/");
}
