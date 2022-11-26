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
    active BOOL DEFAULT true,
    nombre VARCHAR(25) 
);

CREATE TABLE insumos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    unidad INT ,
    nombre VARCHAR(50) NOT NULL, stock INT NOT NULL, precio INT NOT NULL, active BOOL DEFAULT true, FOREIGN KEY (unidad) REFERENCES unidades(id));
CREATE TABLE fichas_tecnicas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    active BOOL DEFAULT true,
    nombre VARCHAR(50) NOT NULL,
    description VARCHAR(400) NOT NULL
);

CREATE TABLE ingred_por_ficha (
    id_ingrediente INT,
    id_ficha INT,
    cantidad INT NOT NULL,
    FOREIGN KEY (id_ficha) REFERENCES fichas_tecnicas (id),
    FOREIGN KEY (id_ingrediente) REFERENCES insumos(id),
    PRIMARY KEY (id_ingrediente, id_ficha)
);

CREATE TABLE productos (
    id INT PRIMARY KEY AUTO_INCREMENT, 
    id_ficha_tecnica INT,
    nombre VARCHAR (70) NOT NULL, 
    imagen VARCHAR (200) NOT NULL,
    active BOOL DEFAULT true,
    FOREIGN KEY(id_ficha_tecnica) REFERENCES fichas_tecnicas(id)
);

CREATE TABLE product_per_unity (
    id INT AUTO_INCREMENT,
    id_producto INT,
    precio INT,
    unidad VARCHAR(30),
    active BOOL DEFAULT true,
    stock INT NOT NULL, 
    PRIMARY KEY (id, id_producto),
    FOREIGN KEY (id_producto) REFERENCES productos(id)
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
INSERT INTO insumos (nombre, unidad, stock, precio) 
VALUES
    ("Queso Mozzarella",1, 2000, 890),
    ("Jamon", 1, 15000, 500),
    ("Agua", 3, 12000, 300),
    ("Harina", 1, 10000, 1100),
    ("Aceite de girasol", 4, 60, 120),
    ("Polvo de hornear", 2, 100, 120),
    ("Huevo", 5, 24, 700);
INSERT INTO fichas_tecnicas (nombre, description) VALUES ("Pizza con Mozzarella", ""), ("Pancho con Panceta", "");
INSERT INTO productos (id_ficha_tecnica, nombre, imagen ) 
VALUES (1, "Pizza Con Mozzarella", "https://genrandom.com/6d8ac8b2-b4f2-4fc7-be93-c329e8e9cf83"),
    (2, "Pancho con Panceta", "https://genrandom.com/6d8ac8b2-b4f2-4fc7-be93-c329e8e9cf83");
INSERT INTO product_per_unity (id_producto, unidad, precio, stock) VALUES (1, "Porcion", 110, 12), (1, "Entera", 550, 4), (2, "Unidad", 230, 10);
