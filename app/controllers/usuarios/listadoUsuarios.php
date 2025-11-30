<?php
$sqlUsuarios = "SELECT * FROM usuarios as usu INNER JOIN roles AS rol ON rol.id_rol = usu.rol_id WHERE usu.estado = '1';";
$queryUsuarios = $pdo->prepare($sqlUsuarios);
$queryUsuarios->execute();
$usuarios = $queryUsuarios->fetchAll(PDO::FETCH_ASSOC);
