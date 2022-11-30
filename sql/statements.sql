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
    nombre VARCHAR(50) NOT NULL,
    stock INT NOT NULL,
    precio INT NOT NULL,
    active BOOL DEFAULT true,
    FOREIGN KEY (unidad) REFERENCES unidades(id)
);

CREATE TABLE productos (
    id INT PRIMARY KEY AUTO_INCREMENT, 
    nombre VARCHAR (70) NOT NULL, 
    imagen VARCHAR (200),
    description VARCHAR(400) NOT NULL,
    comment VARCHAR(100) NOT NULL,
    active BOOL DEFAULT true
);

CREATE TABLE ingred_por_prod (
    active BOOL DEFAULT true,
    id_producto INT,
    id_ingrediente INT,
    cantidad INT NOT NULL,
    FOREIGN KEY (id_producto) REFERENCES productos (id),
    FOREIGN KEY (id_ingrediente) REFERENCES insumos(id),
    PRIMARY KEY (id_ingrediente, id_producto)
);

CREATE TABLE product_per_unity (
    id INT AUTO_INCREMENT,
    id_producto INT,
    precio INT NOT NULL,
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

CREATE TABLE ventas (
    id INT AUTO_INCREMENT, 
    id_usuario INT,
    total INT NOT NULL,
    PRIMARY KEY(id, id_usuario)
);

CREATE TABLE prod_per_venta(
    id_venta INT,
    id_producto INT,
    PRIMARY KEY(id_venta, id_producto),
    FOREIGN KEY (id_producto) REFERENCES productos(id),
    FOREIGN KEY (id_venta) REFERENCES ventas(id)
);

INSERT INTO user_roles (nombre) VALUES("admin"), ("user");
INSERT INTO usuarios (username, passwd, rol) VALUES("admin","admin","admin"), ("user", "user", "user");
INSERT INTO unidades (nombre)
VALUES 
    ("Kg"),
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
    ("Salsa de tomate", 3, 3000, 320),
    ("Huevo", 5, 24, 700);
INSERT INTO productos (nombre, imagen, description, comment ) 
VALUES 
    ("Pizza Con Mozzarella", "https://genrandom.com/6d8ac8b2-b4f2-4fc7-be93-c329e8e9cf83", "", ""),
    ("Pancho con Panceta", "https://genrandom.com/6d8ac8b2-b4f2-4fc7-be93-c329e8e9cf83", "", "");
INSERT INTO product_per_unity (id_producto, unidad, precio, stock) VALUES (1, "Porcion", 110, 12), (1, "Entera", 550, 4), (2, "Unidad", 230, 10);
INSERT INTO ingred_por_prod (id_producto, id_ingrediente, cantidad) VALUES (1, 1, 150), (1, 4, 500), (1, 7, 1000);
INSERT INTO eventos (titulo, tipo, servicio, fecha, ubicacion, cantidad_personas, contacto, image_name, mobiliario)
VALUES 
    ("mesa de dulces", "fiesta", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae perspiciatis cumque, magni quam debitis repellendus neque cupiditate in eum aspernatur explicabo, suscipit omnis ea aliquid, nam commodi excepturi beatae quas!",CURDATE(), "salon agua dulce", 60, 095123123, "https://images.pexels.com/photos/587741/pexels-photo-587741.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", "se dispondra de mesas y sillas para los invitados"),
    ();
