<?php
$sqlUsuarios = "SELECT * FROM usuarios as usu INNER JOIN roles AS rol ON rol.id_rol = usu.rol_id WHERE usu.estado = '1' and usu.id_usuario = '$idUser';";
$queryUsuarios = $pdo->prepare($sqlUsuarios);
$queryUsuarios->execute();
$usuarios = $queryUsuarios->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario) {
    $nombre_rol = $usuario['nombre_rol'];
    $email = $usuario['email'];
    $fyhCreacion = $usuario['fyh_creacion'];
    $estado = $usuario['estado'];
}
