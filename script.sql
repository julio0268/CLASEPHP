/* Primero se determinan las tablas maestras = una tabla independiente */
CREATE TABLE asignaturas (
    id_asignatura INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre_asignatura VARCHAR(30) NOT NULL
);

CREATE TABLE estudiantes (
    id_estudiante INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    identificacion VARCHAR(10) NOT NULL,
    nombres VARCHAR(30) NOT NULL,
    apellidos VARCHAR(30) NOT NULL,
    correo VARCHAR(30) NOT NULL,
    telefono VARCHAR(10) NOT NULL
);

CREATE TABLE notas (
    id_nota INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    primera_nota DECIMAL(2,1) NOT NULL,
    segunda_nota DECIMAL(2,1) NOT NULL,
    tercera_nota DECIMAL(2,1) NOT NULL,
    definitiva DECIMAL(2,1) NOT NULL,
    estado BOOLEAN  NOT NULL,
    id_asignatura_nota INT NOT NULL,
    id_estudiante_nota INT NOT NULL
);

ALTER TABLE `notas` ADD CONSTRAINT `fk_notas_asignatura_id` FOREIGN KEY (`id_asignatura_nota`) REFERENCES `asignaturas`(`id_asignatura`) ON DELETE CASCADE ON UPDATE CASCADE;

SELECT * FROM estudiantes;
SELECT * FROM asignaturas;



CREATE TABLE asignaturas ();

