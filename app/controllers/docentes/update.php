<?php

include '../../../app/config.php';

$id_usuario = $_POST['id_usuario'];
$id_persona = $_POST['id_persona'];
$id_docente = $_POST['id_docente'];


$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$NUE_NUA = $_POST['ci'];
$email = $_POST['email'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$celular = $_POST['celular'];
$profesion = $_POST['profesion'];
$direccion = $_POST['direccion'];

$especialidad = $_POST['especialidad'];
$antiguedad = $_POST['antiguedad'];

////////////////////////////////// ACTUALIZAR A LA TABLA USUARIOS ////////////////////////////

$pdo->beginTransaction();
$password = password_hash($NUE_NUA, PASSWORD_DEFAULT);


$sentencia = $pdo->prepare('UPDATE usuarios SET
rol_id=:rol_id,
email=:email,
password=:password, 
fyh_actualizacion=:fyh_actualizacion
WHERE id_usuario=:id_usuario');

$sentencia->bindParam(':rol_id', $rol_id);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':password', $password);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_usuario', $id_usuario);
$sentencia->execute();

////////////////////////////// ACTUALIZAR A LA TABLA PERSONAS //////////////////////////


$sentencia = $pdo->prepare('UPDATE personas SET
nombres=:nombres,
apellidos=:apellidos,
NUE_NUA=:NUE_NUA,
fecha_nacimiento=:fecha_nacimiento,
celular=:celular,
profesion=:profesion,
direccion=:direccion, 
fyh_actualizacion=:fyh_actualizacion
WHERE id_persona =:id_persona');

$sentencia->bindParam(':nombres', $nombres);
$sentencia->bindParam(':apellidos', $apellidos);
$sentencia->bindParam(':NUE_NUA', $NUE_NUA);
$sentencia->bindParam(':fecha_nacimiento', $fecha_nacimiento);
$sentencia->bindParam(':celular', $celular);
$sentencia->bindParam(':profesion', $profesion);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_persona', $id_persona);
$sentencia->execute();


/////////////////////////////// ACTUALIZAR A LA TABLA DOCENTES //////////////////////
$sentencia = $pdo->prepare('UPDATE docentes SET
especialidad=:especialidad, 
antiguedad=:antiguedad, 
fyh_actualizacion=:fyh_actualizacion
WHERE id_docente=:id_docente');

$sentencia->bindParam(':id_docente', $id_docente);
$sentencia->bindParam(':especialidad', $especialidad);
$sentencia->bindParam(':antiguedad', $antiguedad);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);


if ($sentencia->execute()) {
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se actualizó los datos del personal docente de manera correcta";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/docentes");
    //echo 'success';
    //header('Location:' .$URL.'/');
} else {
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo actualizar al personal docente, comuníquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php 
}