<?php

$sql_estudiantes = "SELECT * FROM usuarios AS U 
INNER JOIN roles R ON R.id_rol = U.rol_id
INNER JOIN personas AS P ON P.usuario_id = U.id_usuario
INNER JOIN estudiantes as E ON E.persona_id = P.id_persona
INNER JOIN niveles as N ON N.id_nivel = E.nivel_id
INNER JOIN grados as G ON G.id_grado = E.grado_id
INNER JOIN ppffs PF ON PF.estudiante_id = E.id_estudiante
WHERE E.estado = '1'";
$query_estudiantes = $pdo->prepare($sql_estudiantes);
$query_estudiantes->execute();
$estudiantes = $query_estudiantes->fetchAll(PDO::FETCH_ASSOC);