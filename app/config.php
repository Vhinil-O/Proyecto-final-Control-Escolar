<?php
//Conexion con MAMP
define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','root');  
define('BD','KARDEX_by_DIEGO');
define('PUERTO','8889');   

//API Y GENERALES
define('APP_NAME','SISTEMA DE GESTION PROPIO');
define('APP_URL','http://localhost:8888/KARDEX_by_DIEGO');
//SUEÑOOS
define('KEY_API_MAPS',''); //A un futuro para incluir maps como api

//Conexion a la base de datos
$servidor = "mysql:dbname=".BD.";host=".SERVIDOR.";port=8889";

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión exitosa a la base de datos";
} catch (PDOException $e) {
    echo "Error no se pudo conectar a la base de datos: " . $e->getMessage();
}

//Zona horaria y fecha
date_default_timezone_set("America/Monterrey");
$fechaHora = date( format:'Y-m-d H:m:s');

$fechaActual = date( format:'Y-m-d');
$diaActual = date( format:'d');
$mesActual = date( format:'m');
$anoActual = date( format:'Y');

$estadoRegistro = '1';
