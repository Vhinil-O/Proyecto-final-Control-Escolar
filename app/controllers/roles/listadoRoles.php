<?php
$sqlRoles = "SELECT * FROM roles WHERE estado = '1';";
$queryRoles = $pdo->prepare($sqlRoles);
$queryRoles->execute();
$roles = $queryRoles->fetchAll(PDO::FETCH_ASSOC);