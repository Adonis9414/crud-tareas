CREATE DATABASE IF NOT EXISTS gestion_empleados;
USE gestion_empleados;

CREATE TABLE empleados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    departamento VARCHAR(100) NOT NULL
);


CREATE TABLE equipos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_equipo VARCHAR(100) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    numero_serie VARCHAR(100) NOT NULL UNIQUE,
    empleado_id INT DEFAULT NULL,
    FOREIGN KEY (empleado_id) REFERENCES empleados(id) ON DELETE SET NULL
);