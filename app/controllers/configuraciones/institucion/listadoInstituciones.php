<?php
$sqlInstituciones = "SELECT * FROM configuracion_instituciones WHERE estado = '1';";
$queryInstituciones = $pdo->prepare($sqlInstituciones);
$queryInstituciones->execute();
$instituciones = $queryInstituciones->fetchAll(PDO::FETCH_ASSOC);
