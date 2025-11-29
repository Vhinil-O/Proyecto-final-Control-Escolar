<?php

include '../../../app/config.php';


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

////////////////////////////////// INSERTAR A LA TABLA USUARIOS ////////////////////////////

$pdo->beginTransaction();
$password = password_hash($NUE_NUA, PASSWORD_DEFAULT);


$sentencia = $pdo->prepare('INSERT INTO usuarios
(rol_id,email,password, fyh_creacion, estado)
VALUES ( :rol_id,:email,:password,:fyh_creacion,:estado)');

$sentencia->bindParam(':rol_id', $rol_id);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':password', $password);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estadoRegistro);
$sentencia->execute();

$usuario_id = $pdo->lastInsertId();

////////////////////////////// INSERTAR A LA TABLA PERSONAS //////////////////////////


$sentencia = $pdo->prepare('INSERT INTO personas
(usuario_id,nombres,apellidos,NUE_NUA,fecha_nacimiento,celular,profesion,direccion, fyh_creacion, estado)
VALUES ( :usuario_id,:nombres,:apellidos,:NUE_NUA,:fecha_nacimiento,:celular,:profesion,:direccion,:fyh_creacion,:estado)');

$sentencia->bindParam(':usuario_id', $usuario_id);
$sentencia->bindParam(':nombres', $nombres);
$sentencia->bindParam(':apellidos', $apellidos);
$sentencia->bindParam(':NUE_NUA', $NUE_NUA);
$sentencia->bindParam(':fecha_nacimiento', $fecha_nacimiento);
$sentencia->bindParam(':celular', $celular);
$sentencia->bindParam(':profesion', $profesion);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estadoRegistro);
$sentencia->execute();

$persona_id = $pdo->lastInsertId();

/////////////////////////////// INSERTAR A LA TABLA DOCENTES //////////////////////
$sentencia = $pdo->prepare('INSERT INTO docentes
(persona_id, especialidad, antiguedad, fyh_creacion, estado)
VALUES ( :persona_id,:especialidad,:antiguedad,:fyh_creacion,:estado)');

$sentencia->bindParam(':persona_id', $persona_id);
$sentencia->bindParam(':especialidad', $especialidad);
$sentencia->bindParam(':antiguedad', $antiguedad);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estadoRegistro);

if ($sentencia->execute()) {
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se registró al personal docente de manera correcta";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/docentes");
    //echo 'success';
    //header('Location:' .$URL.'/');
} else {
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo registrar al personal docente, comuníquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php 
}