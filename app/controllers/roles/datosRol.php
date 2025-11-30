<?php
$sqlRoles = "SELECT * FROM roles WHERE estado = '1' AND id_rol = '$idRol';";
$queryRoles = $pdo->prepare($sqlRoles);
$queryRoles->execute();
$datosRoles = $queryRoles->fetchAll(PDO::FETCH_ASSOC);

foreach ($datosRoles as $datosRole) {
    $nombreRol = $datosRole['nombre_rol'];
}
