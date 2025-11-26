CREATE TABLE IF NOT EXISTS roles (
    id_rol INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(255) NOT NULL UNIQUE KEY,

    fyh_creacion DATETIME,
    fyh_actualizacion DATETIME,
    estado VARCHAR(11)
)ENGINE=InnoDB;

INSERT INTO roles (
 nombre_rol, fyh_creacion, estado
) VALUES ('ADMINISTRADOR', '2025-11-15 01:12:26','1');
INSERT INTO roles (
 nombre_rol, fyh_creacion, estado
) VALUES ('DIRECTOR ACADEMICO', '2025-11-15 01:12:26','1');
INSERT INTO roles (
 nombre_rol, fyh_creacion, estado
) VALUES ('DIRECTOR ADMINISTRATIVO', '2025-11-15 01:12:26','1');
INSERT INTO roles (
 nombre_rol, fyh_creacion, estado
) VALUES ('CONTADOR', '2025-11-15 01:12:26','1');
INSERT INTO roles (
 nombre_rol, fyh_creacion, estado
) VALUES ('SECRETARIA', '2025-11-15 01:12:26','1');


CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(255) NOT NULL,
    rol_id INT(11) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE KEY,
    password TEXT NOT NULL,

    fyh_creacion DATETIME,
    fyh_actualizacion DATETIME,
    estado VARCHAR(11),

    FOREIGN KEY (rol_id) REFERENCES roles (id_rol) on delete no action on update cascade 
)ENGINE=InnoDB;

INSERT INTO usuarios (nombres,rol_id,email,password,fyh_creacion,estado) VALUES ('Diego Sanchez', '1', 'admin@admin.com','$2y$10$cD2snHRX1kE0OhDg0iPvBODGRQ3TSgUDolFi2tw//sxV2JaWgw8D2','2025-11-14 19:23:15','1');

-- LA CONTRASEÑA PARA DEBUG ES 0123456789