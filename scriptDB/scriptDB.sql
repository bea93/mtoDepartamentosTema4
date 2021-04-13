/* Creación de la Base de Datos */
    CREATE DATABASE if NOT EXISTS DAW213DBdepartamentos;
    
/* Creación del usuario */
    CREATE USER IF NOT EXISTS 'usuarioDAW213Departamentos'@'%' identified BY 'paso'; 
    
/* Usar la base de datos creada */
    USE DAW213DBdepartamentos;

/* Creación de la table departamento */
CREATE TABLE IF NOT EXISTS Departamento (
    CodDepartamento CHAR(3) PRIMARY KEY,
    DescDepartamento VARCHAR(255) NOT NULL
)  ENGINE=INNODB;

/* Dar permisos al usuario creado */
    GRANT ALL PRIVILEGES ON DAW213DBdepartamentos.* TO 'usuarioDAW213Departamentos'@'%'; 

/* Base de datos a usar */
USE DAW213DBdepartamentos;

/* Introduccion de datos dentro de la tabla creada */
INSERT INTO Departamento(CodDepartamento,DescDepartamento) VALUES
('INF', 'Departamento de informatica'),
('VEN', 'Departamento de ventas'),
('CON', 'Departamento de contabilidad'),
('COC', 'Departamento de cocina'),
('MEC', 'Departamento de mecanica'),
('MAT', 'Departamento de matematicas');

/* Borrar base de datos */
DROP database DAW213DBdepartamentos;

/* Borrar usuario asociado a esa base de datos */
DROP USER usuarioDAW213Departamentos;