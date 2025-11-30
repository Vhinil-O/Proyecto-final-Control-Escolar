<?php

$sql_estudiantes = "SELECT *, E.nivel_id as nivel_id FROM usuarios AS U 
INNER JOIN roles R ON R.id_rol = U.rol_id
INNER JOIN personas AS P ON P.usuario_id = U.id_usuario
INNER JOIN estudiantes as E ON E.persona_id = P.id_persona
INNER JOIN niveles as N ON N.id_nivel = E.nivel_id
INNER JOIN grados as G ON G.id_grado = E.grado_id
INNER JOIN ppffs PF ON PF.estudiante_id = E.id_estudiante
WHERE E.estado = '1' AND E.id_estudiante = '$id_estudiante'";
$query_estudiantes = $pdo->prepare($sql_estudiantes);
$query_estudiantes->execute();
$estudiantes = $query_estudiantes->fetchAll(PDO::FETCH_ASSOC);

foreach ($estudiantes as $estudiante) {
    $id_usuario = $estudiante['id_usuario'];
    $id_persona = $estudiante['id_persona'];
    $id_estudiante = $estudiante['id_estudiante'];
    $id_ppff = $estudiante['id_ppff'];
    $rol_id = $estudiante['rol_id'];
    $nombre_rol = $estudiante['nombre_rol'];
    $nombres = $estudiante['nombres'];
    $apellidos = $estudiante['apellidos'];
    $NUE_NUA = $estudiante['NUE_NUA'];
    $fecha_nacimiento = $estudiante['fecha_nacimiento'];
    $celular = $estudiante['celular'];
    $email = $estudiante['email'];
    $direccion = $estudiante['direccion'];
    $nivel_id = $estudiante['nivel_id'];
    $nivel = $estudiante['nivel'];
    $turno = $estudiante['turno'];
    $grado_id = $estudiante['grado_id'];
    $curso = $estudiante['curso'];
    $paralelo = $estudiante['paralelo'];
    $rude = $estudiante['rude'];
    $nombres_apellidos_ppff = $estudiante['nombres_apellidos_ppff'];
    $ci_ppff = $estudiante['ci_ppff'];
    $celular_ppff = $estudiante['celular_ppff'];
    $ocupacion_ppff = $estudiante['ocupacion_ppff'];
    $ref_nombre = $estudiante['ref_nombre'];
    $ref_parentesco = $estudiante['ref_parentesco'];
    $ref_celular = $estudiante['ref_celular'];
    $profesion = "ESTUDIANTE";
    $fyh_creacion = $estudiante['fyh_creacion'];
    $estado = $estudiante['estado'];
}