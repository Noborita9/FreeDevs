DROP DATABASE IF EXISTS gestornomia;
CREATE DATABASE gestornomia;
USE gestornomia;

CREATE TABLE usuarios (
  id_usuario INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR (50) NOT NULL,
  contrasena VARCHAR (20) NOT NULL,
  admin BOOLEAN NOT NULL
);

CREATE TABLE eventos (
  id_evento INT PRIMARY KEY AUTO_INCREMENT,
  titulo VARCHAR (120) NOT NULL,
  tipo VARCHAR (100) NOT NULL,
  servicio VARCHAR (100) NOT NULL,
  fecha VARCHAR (20) NOT NULL,
  ubicacion VARCHAR (100) NOT NULL,
  link_ubicacion VARCHAR (200) NOT NULL,
  cantidad_personas INT NOT NULL
);
