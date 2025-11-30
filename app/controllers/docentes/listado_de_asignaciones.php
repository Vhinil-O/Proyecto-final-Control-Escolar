<?php

$sql_asignaciones = "SELECT * FROM asignaciones AS A 
INNER JOIN docentes AS D ON D.id_docente = A.docente_id    
INNER JOIN niveles AS N ON N.id_nivel = A.nivel_id
INNER JOIN grados AS G ON G.id_grado = A.grado_id
INNER JOIN materias AS M ON M.id_materia = A.materia_id
WHERE A.estado = '1'";
$query_asignaciones = $pdo->prepare($sql_asignaciones);
$query_asignaciones->execute();
$asignaciones = $query_asignaciones->fetchAll(PDO::FETCH_ASSOC);