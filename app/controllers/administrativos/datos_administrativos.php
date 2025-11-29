<?php

$sql_administrativos = "SELECT * FROM usuarios AS U INNER JOIN roles R ON R.id_rol = U.rol_id
INNER JOIN personas AS P ON P.usuario_id = U.id_usuario
INNER JOIN administrativos as A ON A.persona_id = P.id_persona WHERE A.estado = '1' AND A.id_administrativo = '$id_administrativo'";
$query_administrativos = $pdo->prepare($sql_administrativos);
$query_administrativos->execute();
$administrativos = $query_administrativos->fetchAll(PDO::FETCH_ASSOC);

foreach ($administrativos as $administrativo) {
    $id_administrativo = $administrativo['id_administrativo'];
    $id_usuario = $administrativo['id_usuario'];
    $id_persona = $administrativo['id_persona'];

    $nombres = $administrativo['nombres'];
    $apellidos = $administrativo['apellidos'];
    $nombre_rol = $administrativo['nombre_rol'];
    $NUE_NUA = $administrativo['NUE_NUA'];
    $fecha_nacimiento = $administrativo['fecha_nacimiento'];
    $celular = $administrativo['celular'];
    $profesion = $administrativo['profesion'];
    $email = $administrativo['email'];
    $direccion = $administrativo['direccion'];
}