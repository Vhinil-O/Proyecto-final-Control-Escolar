<?php

include '../../../app/config.php';

$idRol = $_POST['idRol'];
$rolNombre = $_POST['rolNombre'];
$nombre_rol = mb_strtoupper($rolNombre, 'UTF-8');

if ($nombre_rol == "") {
    session_start();
    $_SESSION['mensaje'] = "Ingrese los datos requeridos";
    $_SESSION['icono'] = "error";
    header(header: 'Location:'.APP_URL."/admin/roles/edit.php?=".$idRol);
} else {
$sentencia = $pdo->prepare("UPDATE roles SET nombre_rol=:nombre_rol, fyh_actualizacion=:fyh_actualizacion WHERE id_rol=:id_rol");

$sentencia->bindParam('nombre_rol',$nombre_rol);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_rol',$idRol);

try {
    if ($sentencia->execute()) {
    //echo "Todo bien";
    session_start();
    $_SESSION['mensaje'] = "Rol actualizado con exito";
    $_SESSION['icono'] = "success";
    header(header: 'Location:'.APP_URL."/admin/roles");
} else {
    //echo "Todo mal";
    session_start();
    $_SESSION['mensaje'] = "Rol NO actualizado";
    $_SESSION['icono'] = "error";
    header(header: 'Location:'.APP_URL."/admin/roles/edit.php?=".$idRol);
}
} catch (Exception $exception) {
session_start();
    $_SESSION['mensaje'] = "Rol YA REGISTRADO";
    $_SESSION['icono'] = "error";
    header(header: 'Location:'.APP_URL."/admin/roles/edit.php?=".$idRol);
}


}

