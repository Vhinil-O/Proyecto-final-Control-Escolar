<?php

$sql_administrativos = "SELECT * FROM usuarios AS U INNER JOIN roles R ON R.id_rol = U.rol_id
INNER JOIN personas AS P ON P.usuario_id = U.id_usuario
INNER JOIN administrativos as A ON A.persona_id = P.id_persona WHERE A.estado = '1'";
$query_administrativos = $pdo->prepare($sql_administrativos);
$query_administrativos->execute();
$administrativos = $query_administrativos->fetchAll(PDO::FETCH_ASSOC);