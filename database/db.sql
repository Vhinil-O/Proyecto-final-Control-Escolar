CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(255) NOT NULL,
    cargo VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE KEY,
    password TEXT NOT NULL,

    fyh_creacion DATETIME,
    fyh_actualizacion DATETIME,
    estado VARCHAR(11)
)ENGINE=InnoDB;

INSERT INTO usuarios (nombres,cargo,email,password,fyh_creacion,estado) VALUES ('Diego Sanchez', 'ADMINISTRADOR', 'admin@admin.admin.com','$2y$10$cD2snHRX1kE0OhDg0iPvBODGRQ3TSgUDolFi2tw//sxV2JaWgw8D2','2025-11-14 19:23:15','1');

-- LA CONTRASEÑA PARA DEBUG ES 0123456789