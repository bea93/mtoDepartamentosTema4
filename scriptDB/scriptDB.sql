/* Creación de la Base de Datos */
    CREATE DATABASE if NOT EXISTS DAW213DBdepartamentos;
    
/* Creación del usuario */
    CREATE USER IF NOT EXISTS 'usuarioDAW213Departamentos'@'%' identified BY 'paso'; 
    
/* Usar la base de datos creada */
    USE DAW213DBdepartamentos;

/* Creación de la table departamento */
CREATE TABLE Departamento (
            CodDepartamento VARCHAR(3) PRIMARY KEY,
            DescDepartamento VARCHAR(255) NOT NULL,
            FechaBaja INT DEFAULT NULL,
            VolumenNegocio FLOAT DEFAULT NULL
    ) ENGINE=INNODB;

/* Dar permisos al usuario creado */
    GRANT ALL PRIVILEGES ON DAW213DBdepartamentos.* TO 'usuarioDAW213Departamentos'@'%'; 

/* Base de datos a usar */
USE DAW213DBdepartamentos;

/* Introduccion de datos dentro de la tabla creada */
INSERT INTO Departamento(CodDepartamento,DescDepartamento,FechaBaja, VolumenNegocio) VALUES
        ('INF', 'Departamento de informatica',1574772123, 50),
        ('VEN', 'Departamento de ventas',1574772123, 800000),
        ('CON', 'Departamento de contabilidad',1574772123, 900000),
        ('MAT', 'Departamento de matematicas',1574772123, 80000000),
        ('CAT', 'Departamento de gatos',1574772123, 12584631268);

/* Borrar base de datos */
DROP database DAW213DBdepartamentos;

/* Borrar usuario asociado a esa base de datos */
DROP USER usuarioDAW213Departamentos;