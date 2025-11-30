<?php 

include '../../../app/config.php';

$id_usuario = $_POST['idUser'];
$rol_id = $_POST['rol_id'];
$email = $_POST['email'];

$password = $_POST['password'];
$passwordRepeat = $_POST['passwordRepeat'];

if ($password == "") {
    $sentencia = $pdo->prepare("UPDATE usuarios SET 
    rol_id=:rol_id,
    email=:email,
    fyh_actualizacion=:fyh_actualizacion WHERE id_usuario=:id_usuario");

    $sentencia->bindParam(':rol_id',$rol_id);
    $sentencia->bindParam(':email',$email);
    $sentencia->bindParam(':fyh_actualizacion',$fechaHora);
    $sentencia->bindParam(':id_usuario',$id_usuario);

    try {
        if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Usuario Actualizado correctamente";
        $_SESSION['icono'] = "success";
        header(header: 'Location:'.APP_URL."/admin/usuarios");
        } else {
            //echo 'Error al registrar a la base de datos';
            session_start();
            $_SESSION['mensaje'] = "Error: Intente de nuevo";
            $_SESSION['icono'] = "error";
            header(header: 'Location:'.APP_URL."/admin/usuarios/create.php");
        }
    } catch (Exception $exception) {
        session_start();
    $_SESSION['mensaje'] = "Email ya Ingresado";
    $_SESSION['icono'] = "error";
    header(header: 'Location:'.APP_URL."/admin/usuarios/create.php");
    }

} else {
    if ($password == $passwordRepeat) {
    //echo "Bien";
    $password = password_hash($password, PASSWORD_DEFAULT);


    $sentencia = $pdo->prepare("UPDATE usuarios SET 
    rol_id=:rol_id,
    email=:email,
    password=:password,
    fyh_actualizacion=:fyh_actualizacion WHERE id_usuario=:id_usuario");

    $sentencia->bindParam(':rol_id',$rol_id);
    $sentencia->bindParam(':email',$email);
    $sentencia->bindParam(':password',$password);
    $sentencia->bindParam(':fyh_actualizacion',$fechaHora);
    $sentencia->bindParam(':id_usuario',$id_usuario);

    try {
        if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Usuario Actualizado correctamente";
        $_SESSION['icono'] = "success";
        header(header: 'Location:'.APP_URL."/admin/usuarios");
        } else {
            //echo 'Error al registrar a la base de datos';
            session_start();
            $_SESSION['mensaje'] = "Error: Intente de nuevo";
            $_SESSION['icono'] = "error";
            header(header: 'Location:'.APP_URL."/admin/usuarios/create.php");
        }
    } catch (Exception $exception) {
        session_start();
    $_SESSION['mensaje'] = "Email ya Ingresado";
    $_SESSION['icono'] = "error";
    header(header: 'Location:'.APP_URL."/admin/usuarios/create.php");
    }

} else {
    //echo "Mal";
    session_start();
    $_SESSION['mensaje'] = "Verifique que las constraeñas sean iguales";
    $_SESSION['icono'] = "error";
    header(header: 'Location:'.APP_URL."/admin/usuarios/create.php");
}
}

