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


    CREATE TABLE IF NOT EXISTS configuracion_instituciones (
        id_config_institucion INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        nombre_institucion VARCHAR(255) NOT NULL,
        logo VARCHAR(255) NULL,
        direccion VARCHAR(255) NOT NULL,
        telefono VARCHAR(100) NULL,
        celular VARCHAR(100) NULL,
        email VARCHAR(100) NULL,

        fyh_creacion DATETIME NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR(11)

    )ENGINE=InnoDB;

    INSERT INTO configuracion_instituciones (nombre_institucion,logo,direccion,telefono,celular,email,fyh_creacion,estado) VALUES ('Universidad de Guanajuato', 'logo.png', 'Carretera Salamanca - Valle de Santiago km 3.5 + 1.8 Comunidad de, Palo Blanco, 36787 Salamanca, Gto.','4646479940','4646479940','cis.tramites@ugto.mx','2025-11-17 21:11:11','1');

    CREATE TABLE IF NOT EXISTS gestiones (
        id_gestion INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        gestion VARCHAR(255) NOT NULL,

        fyh_creacion DATETIME NULL,
        fyh_actualizacion DATETIME NULL,
        estado VARCHAR(11)

    )ENGINE=InnoDB;

    INSERT INTO gestiones (gestion,fyh_creacion,estado) VALUES ('2025/2026','2025-11-17 21:11:11','1');

CREATE TABLE IF NOT EXISTS niveles (
    id_nivel INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gestion_id INT(11) NOT NULL,
    nivel VARCHAR(255) NOT NULL,
    turno VARCHAR(255) NOT NULL,

    fyh_creacion DATETIME,
    fyh_actualizacion DATETIME,
    estado VARCHAR(11),

    FOREIGN KEY (gestion_id) REFERENCES gestiones (id_gestion) on delete no action on update cascade 
)ENGINE=InnoDB;

INSERT INTO niveles (gestion_id,nivel,turno,fyh_creacion,estado) 
VALUES ('1', 'Licenciatura','Matutino','2025-11-14 19:23:15','1');

CREATE TABLE grados (

  id_grado       INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nivel_id       INT (11) NOT NULL,
  curso          VARCHAR (255) NOT NULL,
  paralelo       VARCHAR (255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade

)ENGINE=InnoDB;
INSERT INTO grados (nivel_id,curso,paralelo,fyh_creacion,estado)
VALUES ('1','Pre-Escolar - 1','A','2023-12-28 20:29:10','1');

CREATE TABLE materias (

  id_materia      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_materia         VARCHAR (255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11)

)ENGINE=InnoDB;
INSERT INTO materias (nombre_materia,fyh_creacion,estado)
VALUES ('MATEMÁTICAS','2023-12-28 20:29:10','1');

CREATE TABLE personas (

  id_persona      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuario_id             INT (11) NOT NULL,
  nombres            VARCHAR (50) NOT NULL,
  apellidos          VARCHAR (50) NOT NULL,
  NUE_NUA            VARCHAR (20) NOT NULL,
  fecha_nacimiento   VARCHAR (20) NOT NULL,
  profesion          VARCHAR (50) NOT NULL,
  direccion          VARCHAR (255) NOT NULL,
  celular            VARCHAR (20) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuario) on delete no action on update cascade

)ENGINE=InnoDB;
INSERT INTO personas (usuario_id,nombres,apellidos,NUE_NUA,fecha_nacimiento,profesion,direccion,celular,fyh_creacion,estado)
VALUES ('1','Diego Emmanuel','Sanchez Padilla','148587','20/08/2004','DOCTOR EN OPTICA','Zona Los Pinos Av. Las Rosas Nro 100','75657007','2023-12-28 20:29:10','1');

CREATE TABLE administrativos (

  id_administrativo      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  persona_id             INT (11) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE docentes (

  id_docente             INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  persona_id             INT (11) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE estudiantes (

  id_estudiante             INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  persona_id             INT (11) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE ppffs (

  id_ppff             INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  persona_id             INT (11) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade

)ENGINE=InnoDB;
