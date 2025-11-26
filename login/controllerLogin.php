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

foreach ($usuarios as $usuario) {
    $password_tabla = $usuario['password'];
    $contador++;
}

if (($contador>0) && (password_verify($password, $password_tabla))) {
    //echo "Los datos son correctos";
    session_start();
    $_SESSION['mensaje'] = "Bienvenido al sistema";
    $_SESSION['icono'] = "success";
    $_SESSION['sesionEmail'] = $email;
    header(header: 'Location:'.APP_URL."/admin");
} else {
    //echo "Los datos no son correctos";
    session_start();
    $_SESSION['mensaje']= "Las credenciales son invalidas";
    $_SESSION['icono']= "error";
    header('Location:'.APP_URL."/login");

}