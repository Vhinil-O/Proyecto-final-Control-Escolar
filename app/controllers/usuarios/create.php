<?php 

include '../../../app/config.php';

$nombres = $_POST['nombres'];
$rol_id = $_POST['rol_id'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordRepeat = $_POST['passwordRepeat'];

if ($password == $passwordRepeat) {
    //echo "Bien";
    $password = password_hash($password, PASSWORD_DEFAULT);


    $sentencia = $pdo->prepare("INSERT INTO usuarios (nombres,rol_id,email,password,fyh_creacion,estado) VALUES (:nombres,:rol_id,:email,:password,:fyh_creacion,:estado)");

    $sentencia->bindParam(':nombres',$nombres);
    $sentencia->bindParam(':rol_id',$rol_id);
    $sentencia->bindParam(':email',$email);
    $sentencia->bindParam(':password',$password);
    $sentencia->bindParam(':fyh_creacion',$fechaHora);
    $sentencia->bindParam(':estado',$estadoRegistro);

    try {
        if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Usuario Registrado correctamente";
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