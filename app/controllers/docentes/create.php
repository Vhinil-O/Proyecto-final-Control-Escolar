<?php

include '../../../app/config.php';

// Recolección de datos
$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$NUE_NUA = $_POST['ci'];
$email = $_POST['email'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$celular = $_POST['celular'];
$profesion = $_POST['profesion'];
$direccion = $_POST['direccion'];
$especialidad = $_POST['especialidad'];
$antiguedad = $_POST['antiguedad'];

// Hash de contraseña
$password = password_hash($NUE_NUA, PASSWORD_DEFAULT);

try {
    // 1. Iniciar la transacción
    $pdo->beginTransaction();

    // ====================================================================
    // 2. INSERTAR EN USUARIOS
    // ====================================================================
    $sentencia = $pdo->prepare('INSERT INTO usuarios 
        (rol_id, email, password, fyh_creacion, estado) 
        VALUES (:rol_id, :email, :password, :fyh_creacion, :estado)');

    $sentencia->bindParam(':rol_id', $rol_id);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam(':fyh_creacion', $fechaHora); // Corregido: agregado :
    $sentencia->bindParam(':estado', $estadoRegistro);  // Corregido: agregado :
    $sentencia->execute(); // Si falla, saltará al catch

    $usuario_id = $pdo->lastInsertId();

    // ====================================================================
    // 3. INSERTAR EN PERSONAS
    // ====================================================================
    $sentencia = $pdo->prepare('INSERT INTO personas 
        (usuario_id, nombres, apellidos, NUE_NUA, fecha_nacimiento, celular, profesion, direccion, fyh_creacion, estado) 
        VALUES (:usuario_id, :nombres, :apellidos, :NUE_NUA, :fecha_nacimiento, :celular, :profesion, :direccion, :fyh_creacion, :estado)');

    $sentencia->bindParam(':usuario_id', $usuario_id);
    $sentencia->bindParam(':nombres', $nombres);
    $sentencia->bindParam(':apellidos', $apellidos);
    $sentencia->bindParam(':NUE_NUA', $NUE_NUA);
    $sentencia->bindParam(':fecha_nacimiento', $fecha_nacimiento);
    $sentencia->bindParam(':celular', $celular);
    $sentencia->bindParam(':profesion', $profesion);
    $sentencia->bindParam(':direccion', $direccion);
    $sentencia->bindParam(':fyh_creacion', $fechaHora); // Corregido
    $sentencia->bindParam(':estado', $estadoRegistro);  // Corregido
    $sentencia->execute();

    $persona_id = $pdo->lastInsertId();

    // ====================================================================
    // 4. INSERTAR EN DOCENTES
    // ====================================================================
    $sentencia = $pdo->prepare('INSERT INTO docentes 
        (persona_id, especialidad, antiguedad, fyh_creacion, estado) 
        VALUES (:persona_id, :especialidad, :antiguedad, :fyh_creacion, :estado)');

    $sentencia->bindParam(':persona_id', $persona_id);
    $sentencia->bindParam(':especialidad', $especialidad);
    $sentencia->bindParam(':antiguedad', $antiguedad);
    $sentencia->bindParam(':fyh_creacion', $fechaHora); // Corregido
    $sentencia->bindParam(':estado', $estadoRegistro);  // Corregido
    $sentencia->execute();

    // 5. Si todo salió bien, guardamos los cambios
    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Se registró al personal docente de manera correcta";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/docentes");
    exit; // Importante detener el script después de redireccionar

} catch (PDOException $e) {
    // 6. Si algo falló, revertimos todo
    $pdo->rollBack();
    
    session_start();
    // Puedes concatenar $e->getMessage() para ver el error real mientras desarrollas
    $_SESSION['mensaje'] = "Error al registrar en la base de datos: " . $e->getMessage(); 
    $_SESSION['icono'] = "error";
    
    // Script para volver atrás
    ?>
    <script>window.history.back();</script>
    <?php
}