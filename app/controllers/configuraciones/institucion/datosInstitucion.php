<?php
$sqlInstituciones = "SELECT * FROM configuracion_instituciones WHERE id_config_institucion = '$id_config_institucion' AND estado = '1';";
$queryInstituciones = $pdo->prepare($sqlInstituciones);
$queryInstituciones->execute();
$instituciones = $queryInstituciones->fetchAll(PDO::FETCH_ASSOC);

foreach ($instituciones as $institucione) {
    $nombreInstitucion = $institucione['nombre_institucion'];
    $direccion = $institucione['direccion'];
    $telefono = $institucione['telefono'];
    $celular = $institucione['celular'];
    $email = $institucione['email'];
    $logo = $institucione['logo'];
}
