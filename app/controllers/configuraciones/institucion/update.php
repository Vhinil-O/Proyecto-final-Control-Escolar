<?php
include '../../../../app/config.php';

$logo = $_POST['logo'];
$nombreInstitucion = $_POST['nombreInstitucion'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$id_config_institucion = $_POST['id_config_institucion'];


if ($_FILES['file']['name'] != null){
    //echo 'existe una imagen';

    $nombreArchivo = date( format:'Y-m-d-H-i-s').$_FILES['file']['name'];
    $location = "../../../../public/images/configuracion/".$nombreArchivo;
    move_uploaded_file($_FILES['file']['tmp_name'],$location);
    $logo = $nombreArchivo;
} else {
    //echo 'imagen no existe'; 
    if ($logo == "" ) {
    $logo = "";
    }else {
    $logo = $_POST['logo'];
    }

}


$sentencia = $pdo->prepare('UPDATE configuracion_instituciones SET nombre_institucion=:nombre_institucion,logo=:logo,direccion=:direccion,telefono=:telefono,celular=:celular,email=:email,fyh_actualizacion=:fyh_actualizacion WHERE id_config_institucion=:id_config_institucion');

$sentencia->bindParam(':nombre_institucion',$nombreInstitucion);
$sentencia->bindParam(':logo',$logo);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':email',$email);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_config_institucion',$id_config_institucion);

if ($sentencia->execute()) {
    //echo 'success';
    session_start();
            $_SESSION['mensaje'] = "Institucion Actualizada correctamente";
            $_SESSION['icono'] = "success";
            header(header: 'Location:'.APP_URL."/admin/configuraciones/institucion");
} else {
    //echo 'error';
    session_start();
            $_SESSION['mensaje'] = "Error: Intente de nuevo";
            $_SESSION['icono'] = "error";
            header(header: 'Location:'.APP_URL."/admin/configuraciones/institucion/update.php");
}