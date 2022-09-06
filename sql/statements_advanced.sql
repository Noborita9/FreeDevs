DROP DATABASE IF EXISTS gestornomia;
CREATE DATABASE gestornomia;
USE gestornomia;

CREATE TABLE personas (
	id INT PRIMARY KEY AUTO_INCREMENT,
	nombre NOT NULL,
	apellido NOT NULL ,
);

CREATE TABLE usuarios (
  id INT PRIMARY KEY ,
  nombre_usuario VARCHAR(50) NOT NULL,
  contrasena VARCHAR(50) NOT NULL,
  isadmin boolean NOT NULL, /*puesto dudoso num3*/
  FOREIGN KEY (id) REFERENCES personas(id)
);

CREATE TABLE administradores (
  id_adminstradore INT NOT NULL,
  id_usuario INT NOT NULL,
  usuario_admin VARCHAR(50) NOT NULL,
  contraseña_admin VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_adminstradores, id_usuario),
  FOREIGN KEY (id_adminstradores) REFERENCES personas(id),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

CREATE TABLE personal (
  id INT PRIMARY KEY,
  trabajo VARCHAR(30) NOT NULL,
  FOREIGN KEY (id) REFERENCES personas(id)
);

CREATE TABLE encargados(
  id INT PRIMARY KEY,
  FOREIGN KEY (id) REFERENCES personas(id)
);

CREATE TABLE productos (
   id INT PRIMARY KEY AUTO_INCREMENT, 
   nombre VARCHAR (50) NOT NULL, 
   precio INT NOT NULL,
   imagen VARCHAR (200) NOT NULL,
   unidad VARCHAR (30) NOT NULL,  
);

CREATE TABLE fichas_tecnicas (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL  
);

CREATE TABLE ingredientes (
  id INT PRIMARY KEY AUTO_INCREMENT,
  unidad VARCHAR(30) NOT NULL,
  nombre VARCHAR(50) NOT NULL
);

CREATE TABLE ingredientes_por_ficha (
  id_ingrediente INT NOT NULL,
  id_ficha INT NOT NULL,
  cantidad INT NOT NULL,
  PRIMARY KEY (id_ingrediente, id_ficha),
  FOREIGN KEY (id_ingrediente) REFERENCES ingredientes(id),
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
  tipo VARCHAR (200) NOT NULL, /* puesto dudoso num2*/
  servicio VARCHAR (200) NOT NULL,
  fecha DATE NOT NULL,
  ubicacion VARCHAR (200) NOT NULL,
  link_ubicacion VARCHAR (200) ,/*puesto dudoso num1*/
  cantidad_personas INT NOT NULL ,
  contacto VARCHAR (100) NOT NULL
);

CREATE TABLE recursos (
  id INT PRIMARY KEY AUTO_INCREMENT, 
  nombre VARCHAR (50) NOT NULL,
	cantidad_disponible INT NOT NULL
);

CREATE TABLE recursos_eventos (
	id_evento INT, 
  id_recurso INT,
	cantidad_necesaria INT NOT NULL,
  PRIMARY KEY(id_evento, id_recurso)
  FOREIGN KEY(id_evento) REFERENCES eventos(id),
  FOREIGN KEY(id_recurso) REFERENCES recursos(id)
);

CREATE TABLE menues_eventos (
  id_menu INT AUTO_INCREMENT NOT NULL,
  id_evento INT AUTO_INCREMENT NOT NULL,
  PRIMARY KEY(id_menu,id_evento),
  FOREIGN KEY(id_evento) REFERENCES eventos(id)
);

CREATE TABLE productos_menues ()





/**/
FOREIGN KEY () REFERENCES ()

insert into personas (id_personas) values (1);
insert into personas (id_personas) values (2);
insert into personas (id_personas) values (3);
insert into personas (id_personas) values (4);
insert into personas (id_personas) values (5);
insert into personas (id_personas) values (6);
insert into personas (id_personas) values (7);
insert into personas (id_personas) values (8);
insert into personas (id_personas) values (9);
insert into personas (id_personas) values (10);
insert into personas (id_personas) values (11);
insert into personas (id_personas) values (12);
insert into personas (id_personas) values (13);
insert into personas (id_personas) values (14);
insert into personas (id_personas) values (15);
insert into personas (id_personas) values (16);
insert into personas (id_personas) values (17);
insert into personas (id_personas) values (18);
insert into personas (id_personas) values (19);
insert into personas (id_personas) values (20);
insert into personas (id_personas) values (21);
insert into personas (id_personas) values (22);
insert into personas (id_personas) values (23);
insert into personas (id_personas) values (24);
insert into personas (id_personas) values (25);
insert into personas (id_personas) values (26);
insert into personas (id_personas) values (27);
insert into personas (id_personas) values (28);
insert into personas (id_personas) values (29);
insert into personas (id_personas) values (30);
insert into personas (id_personas) values (31);
insert into personas (id_personas) values (32);
insert into personas (id_personas) values (33);
insert into personas (id_personas) values (34);
insert into personas (id_personas) values (35);
insert into personas (id_personas) values (36);
insert into personas (id_personas) values (37);
insert into personas (id_personas) values (38);
insert into personas (id_personas) values (39);
insert into personas (id_personas) values (40);
insert into personas (id_personas) values (41);
insert into personas (id_personas) values (42);
insert into personas (id_personas) values (43);
insert into personas (id_personas) values (44);
insert into personas (id_personas) values (45);
insert into personas (id_personas) values (46);
insert into personas (id_personas) values (47);
insert into personas (id_personas) values (48);
insert into personas (id_personas) values (49);
insert into personas (id_personas) values (50);
insert into personas (id_personas) values (51);
insert into personas (id_personas) values (52);
insert into personas (id_personas) values (53);
insert into personas (id_personas) values (54);
insert into personas (id_personas) values (55);
insert into personas (id_personas) values (56);
insert into personas (id_personas) values (57);
insert into personas (id_personas) values (58);
insert into personas (id_personas) values (59);
insert into personas (id_personas) values (60);
insert into personas (id_personas) values (61);
insert into personas (id_personas) values (62);
insert into personas (id_personas) values (63);
insert into personas (id_personas) values (64);
insert into personas (id_personas) values (65);
insert into personas (id_personas) values (66);
insert into personas (id_personas) values (67);
insert into personas (id_personas) values (68);
insert into personas (id_personas) values (69);
insert into personas (id_personas) values (70);
insert into personas (id_personas) values (71);
insert into personas (id_personas) values (72);
insert into personas (id_personas) values (73);
insert into personas (id_personas) values (74);
insert into personas (id_personas) values (75);
insert into personas (id_personas) values (76);
insert into personas (id_personas) values (77);
insert into personas (id_personas) values (78);
insert into personas (id_personas) values (79);
insert into personas (id_personas) values (80);
insert into personas (id_personas) values (81);
insert into personas (id_personas) values (82);
insert into personas (id_personas) values (83);
insert into personas (id_personas) values (84);
insert into personas (id_personas) values (85);
insert into personas (id_personas) values (86);
insert into personas (id_personas) values (87);
insert into personas (id_personas) values (88);
insert into personas (id_personas) values (89);
insert into personas (id_personas) values (90);
insert into personas (id_personas) values (91);
insert into personas (id_personas) values (92);
insert into personas (id_personas) values (93);
insert into personas (id_personas) values (94);
insert into personas (id_personas) values (95);
insert into personas (id_personas) values (96);
insert into personas (id_personas) values (97);
insert into personas (id_personas) values (98);
insert into personas (id_personas) values (99);
insert into personas (id_personas) values (100);
insert into personas (id_personas) values (101);
insert into personas (id_personas) values (102);
insert into personas (id_personas) values (103);
insert into personas (id_personas) values (104);
insert into personas (id_personas) values (105);
insert into personas (id_personas) values (106);
insert into personas (id_personas) values (107);
insert into personas (id_personas) values (108);
insert into personas (id_personas) values (109);
insert into personas (id_personas) values (110);
insert into personas (id_personas) values (111);
insert into personas (id_personas) values (112);
insert into personas (id_personas) values (113);
insert into personas (id_personas) values (114);
insert into personas (id_personas) values (115);
insert into personas (id_personas) values (116);
insert into personas (id_personas) values (117);
insert into personas (id_personas) values (118);
insert into personas (id_personas) values (119);
insert into personas (id_personas) values (120);
insert into personas (id_personas) values (121);
insert into personas (id_personas) values (122);
insert into personas (id_personas) values (123);
insert into personas (id_personas) values (124);
insert into personas (id_personas) values (125);
insert into personas (id_personas) values (126);
insert into personas (id_personas) values (127);
insert into personas (id_personas) values (128);
insert into personas (id_personas) values (129);
insert into personas (id_personas) values (130);
insert into personas (id_personas) values (131);
insert into personas (id_personas) values (132);
insert into personas (id_personas) values (133);
insert into personas (id_personas) values (134);
insert into personas (id_personas) values (135);
insert into personas (id_personas) values (136);
insert into personas (id_personas) values (137);
insert into personas (id_personas) values (138);
insert into personas (id_personas) values (139);
insert into personas (id_personas) values (140);
insert into personas (id_personas) values (141);
insert into personas (id_personas) values (142);
insert into personas (id_personas) values (143);
insert into personas (id_personas) values (144);
insert into personas (id_personas) values (145);
insert into personas (id_personas) values (146);
insert into personas (id_personas) values (147);
insert into personas (id_personas) values (148);
insert into personas (id_personas) values (149);
insert into personas (id_personas) values (150);
insert into personas (id_personas) values (151);
insert into personas (id_personas) values (152);
insert into personas (id_personas) values (153);
insert into personas (id_personas) values (154);
insert into personas (id_personas) values (155);
insert into personas (id_personas) values (156);
insert into personas (id_personas) values (157);
insert into personas (id_personas) values (158);
insert into personas (id_personas) values (159);
insert into personas (id_personas) values (160);
insert into personas (id_personas) values (161);
insert into personas (id_personas) values (162);
insert into personas (id_personas) values (163);
insert into personas (id_personas) values (164);
insert into personas (id_personas) values (165);
insert into personas (id_personas) values (166);
insert into personas (id_personas) values (167);
insert into personas (id_personas) values (168);
insert into personas (id_personas) values (169);
insert into personas (id_personas) values (170);
insert into personas (id_personas) values (171);
insert into personas (id_personas) values (172);
insert into personas (id_personas) values (173);
insert into personas (id_personas) values (174);
insert into personas (id_personas) values (175);
insert into personas (id_personas) values (176);
insert into personas (id_personas) values (177);
insert into personas (id_personas) values (178);
insert into personas (id_personas) values (179);
insert into personas (id_personas) values (180);
insert into personas (id_personas) values (181);
insert into personas (id_personas) values (182);
insert into personas (id_personas) values (183);
insert into personas (id_personas) values (184);
insert into personas (id_personas) values (185);
insert into personas (id_personas) values (186);
insert into personas (id_personas) values (187);
insert into personas (id_personas) values (188);
insert into personas (id_personas) values (189);
insert into personas (id_personas) values (190);
insert into personas (id_personas) values (191);
insert into personas (id_personas) values (192);
insert into personas (id_personas) values (193);
insert into personas (id_personas) values (194);
insert into personas (id_personas) values (195);
insert into personas (id_personas) values (196);
insert into personas (id_personas) values (197);
insert into personas (id_personas) values (198);
insert into personas (id_personas) values (199);
insert into personas (id_personas) values (200);



insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (1, 'favory0', 'jBuhb07Bq', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (2, 'lsoper1', 'SQtQtA3QB6', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (3, 'abrunning2', 'Ud7kX9xQ', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (4, 'lfolonin3', 'XAiY21fuGC0V', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (5, 'wboydell4', 'JeMyrvl1', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (6, 'fgeach5', 'FDIJIa3RZ', false);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (7, 'eackenson6', 'Cxvm9Zbr0k', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (8, 'jlordon7', 'y5eTALlp6mkf', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (9, 'baspland8', 'U0o7Eny74mMe', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (10, 'tfenny9', 'QLvKiFSIF7id', false);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (11, 'froebucka', 'hxMTtJf9at', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (12, 'sfarrandb', 'kNB5gRyQmxg', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (13, 'tristec', 'b1ZwJKTu', false);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (14, 'irussand', 'sSZc2YzAuU', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (15, 'hcoldhame', 'hZVPacivz', false);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (16, 'rikinf', 'zfOxWL', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (17, 'cgingoldg', 'YvTOnyGqR', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (18, 'asnasdellh', '602OMET1', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (19, 'vbesantiei', 'aGcc2aOxYERS', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (20, 'drubraj', 'z57TUO', false);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (21, 'wskupinskik', 'xUsmER', false);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (22, 'kstothertl', '3HXtVRPq8hu6', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (23, 'hrosenfarbm', '2P4p0l6hp3q', false);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (24, 'bdrillingcourtn', '5jXEczkmE8', false);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (25, 'goriordano', 'ouK9edwbM', false);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (26, 'dcluleep', 'elOPIh', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (27, 'jcheesmanq', 'E81MmzKj0', false);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (28, 'rvestyr', 'TC0Fy5VGh', false);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (29, 'ahailys', 'SBR6XFkcyLW', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (30, 'jgaleat', 'LLaXsdav', false);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (31, 'zwigfallu', 'LtT2M0M4', false);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (32, 'anavarrev', '80dDiu', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (33, 'iaccumw', 'ewZlNtb9GrDd', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (34, 'iaspinellx', 'QlzArM', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (35, 'mladbrooky', 'VUOHPkhPl5T', false);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (36, 'akubicaz', 'aNK8O8fQ', false);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (37, 'bocarney10', 'p27iRij9vI', false);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (38, 'rmarquot11', 'wYqnj0m', true);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (39, 'claphorn12', 'sy632B', false);
insert into usuarios (id_usuario, nombre_usuario, contrasena, isadmin) values (40, 'mwildt13', 'bfNDOQ49mPs', TRUE);

SELECT id_usuario FROM usuarios
	WHERE isadmin = TRUE;
