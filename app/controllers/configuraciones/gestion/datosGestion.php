<?php
$sqlGestiones = "SELECT * FROM gestiones WHERE id_gestion='$id_gestion';";
$queryGestiones = $pdo->prepare($sqlGestiones);
$queryGestiones->execute();
$gestiones = $queryGestiones->fetchAll(PDO::FETCH_ASSOC);

foreach ($gestiones as $gestione) {
    $gestion = $gestione['gestion'];
    $estado = $gestione['estado'];
    $fyh_creacion = $gestione['fyh_creacion'];
}