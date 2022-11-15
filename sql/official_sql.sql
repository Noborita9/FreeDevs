DROP DATABASE IF EXISTS gestornomia;
CREATE DATABASE gestornomia;
USE gestornomia;

CREATE TABLE personas (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(40) NOT NULL,
	apellido VARCHAR(40),
	ci VARCHAR(10)
);

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT,
  id_persona INT,
  nombre_usuario VARCHAR(50) NOT NULL,
  contrasena VARCHAR(50) NOT NULL,
  rol VARCHAR(40) NOT NULL,
  FOREIGN KEY (id_persona) REFERENCES personas(id),   
  PRIMARY KEY(id)
);

CREATE TABLE fichas_tecnicas (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL  
);

CREATE TABLE productos (
  id INT PRIMARY KEY AUTO_INCREMENT, 
  id_ficha_tecnica INT NOT NULL,
  nombre VARCHAR (50) NOT NULL, 
  precio INT NOT NULL,
  imagen VARCHAR (200) NOT NULL,
  unidad VARCHAR (30) NOT NULL,
  stock INT NOT NULL, 
  FOREIGN KEY(id_ficha_tecnica) REFERENCES fichas_tecnicas(id)
);


CREATE TABLE insumos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  unidad VARCHAR(30) NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  stock INT NOT NULL,
  precio INT NOT NULL
);

CREATE TABLE insumos_por_ficha (
  id_ingrediente INT NOT NULL,
  id_ficha INT NOT NULL,
  cantidad INT NOT NULL,
  PRIMARY KEY (id_ingrediente, id_ficha),
  FOREIGN KEY (id_ingrediente) REFERENCES insumos(id),
  FOREIGN KEY (id_ficha) REFERENCES fichas_tecnicas(id)
);

CREATE TABLE procedimiento_por_ficha (
  id INT PRIMARY KEY NOT NULL,
  num_paso INT NOT NULL,
  paso VARCHAR(200) NOT NULL,
  FOREIGN KEY (id) REFERENCES fichas_tecnicas(id) 
);

CREATE TABLE eventos (
  id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  titulo VARCHAR (200) NOT NULL,
  tipo VARCHAR (200) NOT NULL, 
  servicio VARCHAR (200) NOT NULL,
  fecha DATE NOT NULL,
  ubicacion VARCHAR (200) NOT NULL,
  link_ubicacion VARCHAR (200) ,
  cantidad_personas INT NOT NULL ,
  contacto VARCHAR (100) NOT NULL,
  image_name VARCHAR (100)
);

CREATE TABLE personal (
  id INT PRIMARY KEY,
  trabajo VARCHAR(30) NOT NULL,
  FOREIGN KEY (id) REFERENCES personas(id)
);

CREATE TABLE encargados(
  id_persona INT  ,
  id_evento INT  ,
  PRIMARY KEY(id_persona, id_evento),
  FOREIGN KEY (id_persona) REFERENCES personas(id),
  FOREIGN KEY (id_evento) REFERENCES eventos(id)
);

CREATE TABLE mobiliarios (
  id INT PRIMARY KEY AUTO_INCREMENT, 
  nombre VARCHAR (50) NOT NULL
);

CREATE TABLE mobiliarios_eventos (
	id_evento INT, 
  id_recurso INT,
	cantidad_necesaria INT NOT NULL,
  PRIMARY KEY(id_evento, id_recurso),
  FOREIGN KEY(id_evento) REFERENCES eventos(id),
  FOREIGN KEY(id_recurso) REFERENCES recursos(id)
);

CREATE TABLE menues_eventos (
  id_menu INT AUTO_INCREMENT NOT NULL,
  id_evento INT NOT NULL,
  PRIMARY KEY(id_menu,id_evento),
  FOREIGN KEY(id_evento) REFERENCES eventos(id)
);

CREATE TABLE platos(
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR (30) NOT NULL
);

CREATE TABLE productos_menues (
  id_menu_fk INT NOT NULL,
  id_producto_fk INT NOT NULL,
  id_tipo_comida INT NOT NULL,
  PRIMARY KEY (id_menu_fk,id_producto_fk),
  FOREIGN KEY(id_menu_fk) REFERENCES menues_eventos(id_menu),
  FOREIGN KEY(id_tipo_comida) REFERENCES menues_eventos(id_menu),
  FOREIGN KEY(id_producto_fk) REFERENCES productos(id)
);

CREATE TABLE roles(
  id_roles INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  nombre VARCHAR(40) NOT NULL
);


INSERT INTO usuarios (nombre_usuario, contrasena, rol) VALUES ('admin','admin','admin');
INSERT INTO usuarios (nombre_usuario, contrasena, rol) VALUES ('usuario','usuario','usuario');
INSERT INTO eventos (titulo, tipo, servicio,fecha, ubicacion, link_ubicacion, cantidad_personas, contacto, image_name) VALUES ('Dia de la madre', 'buffet', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint pariatur asperiores necessitatibus repellendus.', CURTIME(), 'ACA', 'https://github.com/noborita9/freedevs', 90, '096160022', 'pancakes.jpg');
INSERT INTO eventos (titulo, tipo, servicio,fecha, ubicacion, link_ubicacion, cantidad_personas, contacto, image_name) VALUES ('Fin de semana en familia', 'buffet', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint pariatur asperiores necessitatibus repellendus.', CURTIME(), 'ACA', 'https://github.com/noborita9/freedevs', 90, '096160022', 'pancakes.jpg');
INSERT INTO eventos (titulo, tipo, servicio,fecha, ubicacion, link_ubicacion, cantidad_personas, contacto, image_name) VALUES ('Cena de negocios', 'buffet', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint pariatur asperiores necessitatibus repellendus.', CURTIME(), 'ACA', 'https://github.com/noborita9/freedevs', 90, '096160022', 'pancakes.jpg');
INSERT INTO fichas_tecnicas (nombre) VALUES ('ficha_tecnica_placeholder');
INSERT INTO productos (id_ficha_tecnica, nombre, precio, stock, imagen, unidad) VALUES (1,'Hamburguesa completa', 320, 12, 'hamburger.jpg', 'Unidad' );
INSERT INTO productos (id_ficha_tecnica, nombre, precio, stock, imagen, unidad) VALUES (1,'Pancakes', 150, 34, 'pancakes.jpg', 'Unidad' );
INSERT INTO productos (id_ficha_tecnica, nombre, precio, stock, imagen, unidad) VALUES (1,'Torta', 210, 8, 'cake.jpg', 'Unidad' );
INSERT INTO productos (id_ficha_tecnica, nombre, precio, stock, imagen, unidad) VALUES (1,'Carne Ahumada', 240, 15, 'meatloaf.jpg', 'Unidad' );
