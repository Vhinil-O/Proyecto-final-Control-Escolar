<?php

$sql_docentes = "SELECT * FROM usuarios AS U INNER JOIN roles R ON R.id_rol = U.rol_id
INNER JOIN personas AS P ON P.usuario_id = U.id_usuario
INNER JOIN docentes as D ON D.persona_id = P.id_persona WHERE D.estado = '1'";
$query_docentes = $pdo->prepare($sql_docentes);
$query_docentes->execute();
$docentes = $query_docentes->fetchAll(PDO::FETCH_ASSOC);