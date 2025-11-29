<?php

$sql_docentes = "SELECT * FROM usuarios AS U INNER JOIN roles R ON R.id_rol = U.rol_id
INNER JOIN personas AS P ON P.usuario_id = U.id_usuario
INNER JOIN docentes as D ON D.persona_id = P.id_persona WHERE D.estado = '1' AND D.id_docente = '$id_docente'";
$query_docentes = $pdo->prepare($sql_docentes);
$query_docentes->execute();
$docentes = $query_docentes->fetchAll(PDO::FETCH_ASSOC);

foreach ($docentes as $docente) {
    $id_usuario = $docente['id_usuario'];
    $id_persona = $docente['id_persona'];
    $id_docente = $docente['id_docente'];
    
    $nombres = $docente['nombres'];
    $apellidos = $docente['apellidos'];
    $nombre_rol = $docente['nombre_rol'];
    $NUE_NUA = $docente['NUE_NUA'];
    $fecha_nacimiento = $docente['fecha_nacimiento'];
    $celular = $docente['celular'];
    $profesion = $docente['profesion'];
    $email = $docente['email'];
    $especialidad = $docente['especialidad'];
    $antiguedad = $docente['antiguedad'];
    $direccion = $docente['direccion'];
    $fyh_creacion = $docente['fyh_creacion'];
    $estado = $docente['estado'];
}