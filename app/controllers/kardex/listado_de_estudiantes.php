<?php

$sql_kardexs = "SELECT * FROM kardexs AS K
INNER JOIN docentes AS D ON D.id_docente = K.docente_id
INNER JOIN personas AS P ON P.id_persona = D.persona_id
INNER JOIN usuarios AS U ON U.id_usuario = P.usuario_id
INNER JOIN materias AS M ON M.id_materia = K.materia_id
INNER JOIN estudiantes AS E ON E.id_estudiante = K.estudiante_id
";
$query_kardexs = $pdo->prepare($sql_kardexs);
$query_kardexs->execute();
$kardexs = $query_kardexs->fetchAll(PDO::FETCH_ASSOC);