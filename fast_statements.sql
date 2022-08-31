DROP DATABASE IF EXISTS gestornomia;
CREATE DATABASE gestornomia;
USE gestornomia;

CREATE TABLE usuarios (
  id_usuario INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR (50) NOT NULL,
  contrasena VARCHAR (20) NOT NULL,
  admin BOOLEAN NOT NULL
)
