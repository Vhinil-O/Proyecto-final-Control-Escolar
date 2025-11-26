<?php

include '../../../app/config.php';

$nombre_rol = $_POST['nombre_rol'];
$nombre_rol = mb_strtoupper($nombre_rol, 'UTF-8');

if ($nombre_rol == "") {
    session_start();
    $_SESSION['mensaje'] = "Ingrese los datos requeridos";
    $_SESSION['icono'] = "error";
    header(header: 'Location:'.APP_URL."/admin/roles/create.php");

} else {
$sentencia = $pdo->prepare("INSERT INTO roles (
    nombre_rol,
    fyh_creacion,
    estado
    ) VALUES (:nombre_rol, :fyh_creacion, :estado)");

$sentencia->bindParam('nombre_rol',$nombre_rol);
$sentencia->bindParam('fyh_creacion',$fechaHora);
$sentencia->bindParam('estado',$estadoRegistro);

try {
    if ($sentencia->execute()) {
    //echo "Todo bien";
    session_start();
    $_SESSION['mensaje'] = "Rol registrado con exito";
    $_SESSION['icono'] = "success";
    header(header: 'Location:'.APP_URL."/admin/roles");
} else {
    //echo "Todo mal";
    session_start();
    $_SESSION['mensaje'] = "Rol NO registrado";
    $_SESSION['icono'] = "error";
    header(header: 'Location:'.APP_URL."/admin/roles/create.php");
}
} catch (Exception $exception) {
session_start();
    $_SESSION['mensaje'] = "Rol YA REGISTRADO";
    $_SESSION['icono'] = "error";
    header(header: 'Location:'.APP_URL."/admin/roles/create.php");
}


}