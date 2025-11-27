<?php
include '../../../../app/config.php';

$nombreInstitucion = $_POST['nombreInstitucion'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$email = $_POST['email'];

if ($_FILES['file']['name'] != null){
    //echo 'existe una imagen';

    $nombreArchivo = date( format:'Y-m-d-H-m-s').$_FILES['file']['name'];
    $location = "../../../../public/images/configuracion/".$nombreArchivo;
    move_uploaded_file($_FILES['file']['tmp_name'],$location);
    $logo = $nombreArchivo;
} else {
    //echo 'imagen no existe';
    $logo = "";
}


$sentencia = $pdo->prepare('INSERT INTO configuracion_instituciones (nombre_institucion,logo,direccion,telefono,celular,email,fyh_creacion,estado) VALUES (:nombre_institucion,:logo,:direccion,:telefono,:celular,:email,:fyh_creacion,:estado)');

$sentencia->bindParam(':nombre_institucion',$nombreInstitucion);
$sentencia->bindParam(':logo',$logo);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':email',$email);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->bindParam(':estado',$estadoRegistro);

if ($sentencia->execute()) {
    //echo 'success';
    session_start();
            $_SESSION['mensaje'] = "Institucion Registrada correctamente";
            $_SESSION['icono'] = "success";
            header(header: 'Location:'.APP_URL."/admin/configuraciones/institucion");
} else {
    //echo 'error';
    session_start();
            $_SESSION['mensaje'] = "Error: Intente de nuevo";
            $_SESSION['icono'] = "error";
            header(header: 'Location:'.APP_URL."/admin/configuraciones/institucion/create.php");
}