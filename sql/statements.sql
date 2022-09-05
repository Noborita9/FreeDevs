DROP DATABASE IF EXISTS gestornomia;
CREATE DATABASE gestornomia;
USE gestornomia;

CREATE TABLE usuarios (
  id_usuario INT PRIMARY KEY AUTO_INCREMENT
  usuario VARCHAR(50) NOT NULL,
  constrasena VARCHAR(50) NOT NULL,
  rol VARCHAR(50) NOT NULL,
);

CREATE TABLE fichas_tecnicas (
  id_ficha_tecnica INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,  
);

CREATE TABLE ingredientes (
  id_ingrediente INT PRIMARY KEY AUTO_INCREMENT,
  unidad VARCHAR(30) NOT NULL,
  nombre VARCHAR(50) NOT NULL,
);

CREATE TABLE ingredientes_por_ficha (
  id_ingrediente INT NOT NULL,
  id_ficha_tecnica INT NOT NULL,
  cantidad INT NOT NULL,
  FOREIGN KEY (id_ingrediente) REFERENCES ingredientes(id_ingrediente),
);

CREATE TABLE procedimiento_por_ficha (
  id_ficha_tecnica INT NOT NULL,
  paso VARCHAR(200) NOT NULL,
  FOREIGN KEY (id_ingrediente) REFERENCES 
)
