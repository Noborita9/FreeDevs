DROP DATABASE IF EXISTS gestornomia;
CREATE DATABASE gestornomia;
USE gestornomia;

CREATE TABLE user_roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(20) NOT NULL UNIQUE
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    passwd VARCHAR(50) NOT NULL,
    rol VARCHAR(20) NOT NULL,
    active BOOL DEFAULT true,
    FOREIGN KEY (rol) REFERENCES user_roles(nombre)
);

CREATE TABLE unidades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(25) 
);

CREATE TABLE ingredientes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    unidad INT ,
    nombre VARCHAR(50) NOT NULL,
    stock INT NOT NULL,
    precio INT NOT NULL,
    active BOOL DEFAULT true,
    FOREIGN KEY (unidad) REFERENCES unidades(id)
);

CREATE TABLE fichas_tecnicas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    active BOOL DEFAULT true,
    nombre VARCHAR(50) NOT NULL  
);

CREATE TABLE ingred_por_ficha (
    id_ingrediente INT,
    id_ficha INT,
    cantidad INT NOT NULL,
    FOREIGN KEY (id_ficha) REFERENCES fichas_tecnicas (id),
    FOREIGN KEY (id_ingrediente) REFERENCES ingredientes(id),
    PRIMARY KEY (id_ingrediente, id_ficha)
);

CREATE TABLE productos (
    id INT PRIMARY KEY AUTO_INCREMENT, 
    id_ficha_tecnica INT,
    nombre VARCHAR (70) NOT NULL, 
    precio INT NOT NULL,
    imagen VARCHAR (200) NOT NULL,
    unidad VARCHAR (30) NOT NULL,
    stock INT NOT NULL, 
    active BOOL DEFAULT true,
    FOREIGN KEY(id_ficha_tecnica) REFERENCES fichas_tecnicas(id)
);

CREATE TABLE eventos (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    titulo VARCHAR (200) NOT NULL,
    tipo VARCHAR (200) NOT NULL, 
    servicio VARCHAR (200) NOT NULL,
    fecha DATE NOT NULL,
    ubicacion VARCHAR (200) NOT NULL,
    cantidad_personas INT NOT NULL ,
    contacto VARCHAR (100) NOT NULL,
    image_name VARCHAR (100),
    mobiliario VARCHAR (200),
    active BOOL DEFAULT true
);

CREATE TABLE encargados(
  id_evento INT,
  nombre VARCHAR(40),
  PRIMARY KEY(nombre, id_evento),
  FOREIGN KEY (id_evento) REFERENCES eventos(id)
);

CREATE TABLE platos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL
);

CREATE TABLE productos_menues (
    id_evento INT NOT NULL,
    id_producto INT NOT NULL,
    PRIMARY KEY (id_evento,id_producto),
    FOREIGN KEY(id_evento) REFERENCES eventos(id),
    FOREIGN KEY(id_producto) REFERENCES productos(id)
);

CREATE TABLE prod_order (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    active BOOL DEFAULT true,
    description VARCHAR(300) NOT NULL
);

CREATE TABLE producto_per_prod_order (
    id_producto INT ,
    id_prod_order INT,
    nombre VARCHAR(100) NOT NULL,
    PRIMARY KEY(id_producto, id_prod_order),
    FOREIGN KEY (id_prod_order) REFERENCES prod_order(id),
    FOREIGN KEY (id_producto) REFERENCES productos(id)
);

INSERT INTO user_roles (nombre) VALUES("admin"), ("user");
INSERT INTO usuarios (username, passwd, rol) VALUES("admin","admin","admin"), ("user", "user", "user");
INSERT INTO unidades (nombre)
VALUES ("Kg"),
    ("Gr"),
    ("L"),
    ("Ml"),
    ("Unidad"),
    ("Porcion"),
    ("Entera"),
    ("Media"),
    ("Cuarto");
INSERT INTO ingredientes (nombre, unidad, stock, precio) 
VALUES("Queso Mozzarella","Kg", 2, 890),
    ("Jamon", "Kg", 15000, 500),
    ("Agua", "L", 12000, 300),
    ("Harina", "Kg", 10000, 1100),
    ("Aceite de girasol", "Ml", 60, 120),
    ("Polvo de hornear", "Gr", 100, 120),
    ("Huevo", "Unidad", 24, 700);
INSERT INTO fichas_tecnicas (nombre) VALUES ("Pizza con Mozzarella"), ("Torta");
INSERT INTO productos (id_ficha_tecnica, nombre, precio, imagen, unidad, stock) 
VALUES (1, "Pizza Con Mozzarella", 550, "https://genrandom.com/6d8ac8b2-b4f2-4fc7-be93-c329e8e9cf83", "Entera", 3);
