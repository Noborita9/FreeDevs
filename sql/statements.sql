DROP DATABASE IF EXISTS gestornomia;
CREATE DATABASE gestornomia;
USE gestornomia;

CREATE TABLE user_roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(20) NOT NULL UNIQUE
)

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    // Idealy this should be checked to not be replicated, We live in a simulation
    username VARCHAR(50) NOT NULL,
    passwd VARCHAR(50) NOT NULL,
    rol VARCHAR(20) NOT NULL,
    active BOOL NOT NULL,
    FOREIGN KEY (rol) REFERENCES user_roles(nombre)
);

CREATE TABLE unidades (
    id INT PRIMARY KEY AUTO_INCREMENT,
    active BOOL NOT NULL,
    nombre VARCHAR(30)
)

CREATE TABLE ingredientes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_unidad INT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    // Our Stock
    stock INT NOT NULL,
    precio INT NOT NULL,
    active BOOL NOT NULL,
    FOREIGN KEY(id_unidad) REFERENCES unidades(id)
);

CREATE TABLE fichas_tecnicas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    active BOOL NOT NULL,
    nombre VARCHAR(50) NOT NULL  
);

CREATE TABLE ingred_por_ficha (
    id_ingrediente INT NOT NULL,
    id_ficha INT NOT NULL,
    cantidad INT NOT NULL,
    PRIMARY KEY (id_ingrediente, id_ficha),
    FOREIGN KEY (id_ingrediente) REFERENCES insumos(id),
    FOREIGN KEY (id_ficha) REFERENCES fichas_tecnicas(id)
);

CREATE TABLE productos (
    id INT PRIMARY KEY AUTO_INCREMENT, 
    id_ficha_tecnica INT,
    nombre VARCHAR (70) NOT NULL, 
    precio INT NOT NULL,
    imagen VARCHAR (200) NOT NULL,
    unidad VARCHAR (30) NOT NULL,
    stock INT NOT NULL, 
    active BOOL NOT NULL,
    FOREIGN KEY(id_ficha_tecnica) REFERENCES fichas_tecnicas(id)
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

CREATE TABLE encargados(
  id_persona INT  ,
  id_evento INT  ,
  PRIMARY KEY(id_persona, id_evento),
  FOREIGN KEY (id_persona) REFERENCES personas(id),
  FOREIGN KEY (id_evento) REFERENCES eventos(id)
);

CREATE TABLE prod_order (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    active BOOL NOT NULL,
    desc VARCHAR(300) NOT NULL
)

CREATE TABLE platos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL
);

CREATE TABLE productos_menues (
    id_evento INT NOT NULL,
    id_producto INT NOT NULL,
    id_tipo_comida INT NOT NULL,
    PRIMARY KEY (id_evento,id_producto),
    FOREIGN KEY(id_evento) REFERENCES ,
    FOREIGN KEY(id_tipo_comida) REFERENCES menues_eventos(id_menu),
    FOREIGN KEY(id_producto) REFERENCES productos(id)
);



// Add base roles
INSERT INTO user_roles (nombre) VALUES("ADMIN"), ("USER");
INSERT INTO unidades (nombre, active) VALUES("KILOS", true), ("LITROS", true), ("GRAMOS", true), ("MILILITROS", true), ("UNIDAD", true);
