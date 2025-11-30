<?php

$sql_calificaciones = "SELECT * FROM calificaciones AS C 
INNER JOIN materias AS M ON C.materia_id = M.id_materia
WHERE C.estado = '1'";
$query_calificaciones = $pdo->prepare($sql_calificaciones);
$query_calificaciones->execute();
$calificaciones = $query_calificaciones->fetchAll(PDO::FETCH_ASSOC);