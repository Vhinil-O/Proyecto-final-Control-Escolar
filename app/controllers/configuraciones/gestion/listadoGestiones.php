<?php
$sqlGestiones = "SELECT * FROM gestiones ;";
$queryGestiones = $pdo->prepare($sqlGestiones);
$queryGestiones->execute();
$gestiones = $queryGestiones->fetchAll(PDO::FETCH_ASSOC);
