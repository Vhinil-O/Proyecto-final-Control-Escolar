<?php

include '../app/config.php';

//Leer datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

//Consulta
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND estado = '1';";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
//print_r($usuarios);

$contador = 0;
$rol_id = null;
$password_tabla = null;

foreach ($usuarios as $usuario) {
    $password_tabla = $usuario['password'];
    $rol_id = $usuario['rol_id'];
    $contador++;
}

if (($contador>0) && (password_verify($password, $password_tabla))) {
    //echo "Los datos son correctos";
    //echo $rol_id;
    session_start(); 
    $_SESSION['sesionEmail'] = $email;
    
    if ( $rol_id == 1 ) {
        $_SESSION['mensaje'] = "Bienvenido al sistema";
        $_SESSION['icono'] = "success";
        header(header: 'Location:'.APP_URL."/admin");
        exit;
    } elseif ($rol_id == 6 ) {
        //echo $rol_id;
        $_SESSION['mensaje'] = "Bienvenido al sistema";
        $_SESSION['icono'] = "success";
        header(header: 'Location:'.APP_URL."/docente/calificaciones");
        exit;
    } elseif ($rol_id == 7) {
        //echo $rol_id;
        $_SESSION['mensaje'] = "Bienvenido al sistema";
        $_SESSION['icono'] = "success";
        header(header: 'Location:'.APP_URL."/alumno/kardex");
        exit;
    } else {
        $_SESSION['mensaje']= "El ROL al que se le fue asignado aun no tiene un espacio :( comuniquese con nuestro equipo de TI para solucionar la situacion";
        $_SESSION['icono']= "error";
        header('Location:'.APP_URL."/login");
        exit;
    }



    /*session_start();
    $_SESSION['mensaje'] = "Bienvenido al sistema";
    $_SESSION['icono'] = "success";
    $_SESSION['sesionEmail'] = $email;
    header(header: 'Location:'.APP_URL."/admin");*/
} else {
    //echo "Los datos no son correctos";
    session_start();
    $_SESSION['mensaje']= "Las credenciales son invalidas";
    $_SESSION['icono']= "error";
    header('Location:'.APP_URL."/login");

}