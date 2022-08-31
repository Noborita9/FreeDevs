DROP DATABASE IF EXISTS gestornomia;
CREATE DATABASE gestornomia;
USE gestornomia;

CREATE TABLE personas (
	id_personas INT PRIMARY KEY AUTO_INCREMENT  
);

CREATE TABLE usuarios (
  id_usuario INT PRIMARY KEY ,
  usuario VARCHAR(50) NOT NULL,
  constrasena VARCHAR(50) NOT NULL,
  isadmin boolean NOT NULL, /*puesto dudoso num3*/
  FOREIGN KEY (id_usuario) REFERENCES personas(id_personas)
);

CREATE TABLE administradores (
	id_adminstradores INT PRIMARY KEY,
	usuario_admin VARCHAR(50) NOT NULL,
	contraseña_admin VARCHAR(50) NOT NULL,
	FOREIGN KEY (id_adminstradores) REFERENCES personas(id_personas)
);

CREATE TABLE personal (
 id_personal INT PRIMARY KEY,
 nombre VARCHAR(20) NOT NULL,
 apellido VARCHAR(20) NOT NULL, 
 trabajo VARCHAR(30) NOT NULL,
	FOREIGN KEY (id_personal) REFERENCES personas(id_personas)
);

CREATE TABLE encargados(
 id_encargados INT PRIMARY KEY,
 nombre VARCHAR(20) NOT NULL,
 apellido VARCHAR(20) NOT NULL,
	FOREIGN KEY (id_encargados) REFERENCES personas(id_personas)
);

CREATE TABLE producto (
 id_prod INT PRIMARY KEY AUTO_INCREMENT, 
 nombre VARCHAR NOT NULL, 
 precio INT NOT NULL,
 imagen NOT NULL,
 unidad NOT NULL,  
);

CREATE TABLE fichas_tecnicas (
  id_ficha_tecnica INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL  
);

CREATE TABLE ingredientes (
  id_ingrediente INT PRIMARY KEY AUTO_INCREMENT,
  unidad VARCHAR(30) NOT NULL,
  nombre VARCHAR(50) NOT NULL
);

CREATE TABLE ingredientes_por_ficha (
  id_ingrediente_fk INT NOT NULL,
  id_ingrediente_ficha INT NOT NULL,
  cantidad INT NOT NULL,
  primary key (id_ingrediente_ficha,id_ingrediente_fk ),
  FOREIGN KEY (id_ingrediente_fk) REFERENCES ingredientes(id_ingrediente),
  FOREIGN KEY (id_ingrediente_ficha) REFERENCES fichas_tecnicas(id_ficha_tecnica)
);

CREATE TABLE procedimiento_por_ficha (
  id_procedimiento_ficha INT PRIMARY KEY NOT NULL,
  num_paso INT NOT NULL,
  paso VARCHAR(200) NOT NULL,
  FOREIGN KEY (id_procedimiento_ficha) REFERENCES fichas_tecnicas(id_ficha_tecnica) 
);

CREATE TABLE evento (
	id_evento INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	titulo_evento VARCHAR NOT NULL,
	tipo_evento VARCHAR  NOT NULL,
	servicio VARCHAR NOT NULL,
	fecha DATE NOT NULL,
	ubicacion VARCHAR NOT NULL,
	link_ubicacion VARCHAR ,/*puesto dudoso num1*/
	cantidad_personas INT NOT NULL ,
	contacto evento VARCHAR /*puesto dudoso num2*/
);

CREATE TABLE recursos_eventos (
	id_recursos_eventos PRIMARY KEY AUTO_INCREMENT NOT NULL, 
	cantidad_necesaria NOT NULL
	

);

CREATE TABLE recursos (
 id_recurso PRIMARY KEY AUTO_INCREMENT NOT NULL, 
 Objeto VARCHAR NOT NULL,
 tipo_objeto VARCHAR NOT NULL,
 cantidad_disponible INT NOT NULL,
  
);

CREATE TABLE menues_eventos (
 id_menues INT AUTO_INCREMENT NOT NULL,
 id_eventofk INT AUTO_INCREMENT NOT NULL,
 id_prodfk INT AUTO_INCREMENT NOT NULL,
 
 
 PRIMARY KEY(id_menues,id_eventofk)
);





/**/
FOREIGN KEY () REFERENCES ()


insert into personal (id_personas) values (1);
insert into personal (id_personas) values (2);
insert into personal (id_personas) values (3);
insert into personal (id_personas) values (4);
insert into personal (id_personas) values (5);
insert into personal (id_personas) values (6);
insert into personal (id_personas) values (7);
insert into personal (id_personas) values (8);
insert into personal (id_personas) values (9);
insert into personal (id_personas) values (10);
insert into personal (id_personas) values (11);
insert into personal (id_personas) values (12);
insert into personal (id_personas) values (13);
insert into personal (id_personas) values (14);
insert into personal (id_personas) values (15);
insert into personal (id_personas) values (16);
insert into personal (id_personas) values (17);
insert into personal (id_personas) values (18);
insert into personal (id_personas) values (19);
insert into personal (id_personas) values (20);
insert into personal (id_personas) values (21);
insert into personal (id_personas) values (22);
insert into personal (id_personas) values (23);
insert into personal (id_personas) values (24);
insert into personal (id_personas) values (25);
insert into personal (id_personas) values (26);
insert into personal (id_personas) values (27);
insert into personal (id_personas) values (28);
insert into personal (id_personas) values (29);
insert into personal (id_personas) values (30);
insert into personal (id_personas) values (31);
insert into personal (id_personas) values (32);
insert into personal (id_personas) values (33);
insert into personal (id_personas) values (34);
insert into personal (id_personas) values (35);
insert into personal (id_personas) values (36);
insert into personal (id_personas) values (37);
insert into personal (id_personas) values (38);
insert into personal (id_personas) values (39);
insert into personal (id_personas) values (40);
insert into personal (id_personas) values (41);
insert into personal (id_personas) values (42);
insert into personal (id_personas) values (43);
insert into personal (id_personas) values (44);
insert into personal (id_personas) values (45);
insert into personal (id_personas) values (46);
insert into personal (id_personas) values (47);
insert into personal (id_personas) values (48);
insert into personal (id_personas) values (49);
insert into personal (id_personas) values (50);
insert into personal (id_personas) values (51);
insert into personal (id_personas) values (52);
insert into personal (id_personas) values (53);
insert into personal (id_personas) values (54);
insert into personal (id_personas) values (55);
insert into personal (id_personas) values (56);
insert into personal (id_personas) values (57);
insert into personal (id_personas) values (58);
insert into personal (id_personas) values (59);
insert into personal (id_personas) values (60);
insert into personal (id_personas) values (61);
insert into personal (id_personas) values (62);
insert into personal (id_personas) values (63);
insert into personal (id_personas) values (64);
insert into personal (id_personas) values (65);
insert into personal (id_personas) values (66);
insert into personal (id_personas) values (67);
insert into personal (id_personas) values (68);
insert into personal (id_personas) values (69);
insert into personal (id_personas) values (70);
insert into personal (id_personas) values (71);
insert into personal (id_personas) values (72);
insert into personal (id_personas) values (73);
insert into personal (id_personas) values (74);
insert into personal (id_personas) values (75);
insert into personal (id_personas) values (76);
insert into personal (id_personas) values (77);
insert into personal (id_personas) values (78);
insert into personal (id_personas) values (79);
insert into personal (id_personas) values (80);
insert into personal (id_personas) values (81);
insert into personal (id_personas) values (82);
insert into personal (id_personas) values (83);
insert into personal (id_personas) values (84);
insert into personal (id_personas) values (85);
insert into personal (id_personas) values (86);
insert into personal (id_personas) values (87);
insert into personal (id_personas) values (88);
insert into personal (id_personas) values (89);
insert into personal (id_personas) values (90);
insert into personal (id_personas) values (91);
insert into personal (id_personas) values (92);
insert into personal (id_personas) values (93);
insert into personal (id_personas) values (94);
insert into personal (id_personas) values (95);
insert into personal (id_personas) values (96);
insert into personal (id_personas) values (97);
insert into personal (id_personas) values (98);
insert into personal (id_personas) values (99);
insert into personal (id_personas) values (100);
insert into personal (id_personas) values (101);
insert into personal (id_personas) values (102);
insert into personal (id_personas) values (103);
insert into personal (id_personas) values (104);
insert into personal (id_personas) values (105);
insert into personal (id_personas) values (106);
insert into personal (id_personas) values (107);
insert into personal (id_personas) values (108);
insert into personal (id_personas) values (109);
insert into personal (id_personas) values (110);
insert into personal (id_personas) values (111);
insert into personal (id_personas) values (112);
insert into personal (id_personas) values (113);
insert into personal (id_personas) values (114);
insert into personal (id_personas) values (115);
insert into personal (id_personas) values (116);
insert into personal (id_personas) values (117);
insert into personal (id_personas) values (118);
insert into personal (id_personas) values (119);
insert into personal (id_personas) values (120);
insert into personal (id_personas) values (121);
insert into personal (id_personas) values (122);
insert into personal (id_personas) values (123);
insert into personal (id_personas) values (124);
insert into personal (id_personas) values (125);
insert into personal (id_personas) values (126);
insert into personal (id_personas) values (127);
insert into personal (id_personas) values (128);
insert into personal (id_personas) values (129);
insert into personal (id_personas) values (130);
insert into personal (id_personas) values (131);
insert into personal (id_personas) values (132);
insert into personal (id_personas) values (133);
insert into personal (id_personas) values (134);
insert into personal (id_personas) values (135);
insert into personal (id_personas) values (136);
insert into personal (id_personas) values (137);
insert into personal (id_personas) values (138);
insert into personal (id_personas) values (139);
insert into personal (id_personas) values (140);
insert into personal (id_personas) values (141);
insert into personal (id_personas) values (142);
insert into personal (id_personas) values (143);
insert into personal (id_personas) values (144);
insert into personal (id_personas) values (145);
insert into personal (id_personas) values (146);
insert into personal (id_personas) values (147);
insert into personal (id_personas) values (148);
insert into personal (id_personas) values (149);
insert into personal (id_personas) values (150);
insert into personal (id_personas) values (151);
insert into personal (id_personas) values (152);
insert into personal (id_personas) values (153);
insert into personal (id_personas) values (154);
insert into personal (id_personas) values (155);
insert into personal (id_personas) values (156);
insert into personal (id_personas) values (157);
insert into personal (id_personas) values (158);
insert into personal (id_personas) values (159);
insert into personal (id_personas) values (160);
insert into personal (id_personas) values (161);
insert into personal (id_personas) values (162);
insert into personal (id_personas) values (163);
insert into personal (id_personas) values (164);
insert into personal (id_personas) values (165);
insert into personal (id_personas) values (166);
insert into personal (id_personas) values (167);
insert into personal (id_personas) values (168);
insert into personal (id_personas) values (169);
insert into personal (id_personas) values (170);
insert into personal (id_personas) values (171);
insert into personal (id_personas) values (172);
insert into personal (id_personas) values (173);
insert into personal (id_personas) values (174);
insert into personal (id_personas) values (175);
insert into personal (id_personas) values (176);
insert into personal (id_personas) values (177);
insert into personal (id_personas) values (178);
insert into personal (id_personas) values (179);
insert into personal (id_personas) values (180);
insert into personal (id_personas) values (181);
insert into personal (id_personas) values (182);
insert into personal (id_personas) values (183);
insert into personal (id_personas) values (184);
insert into personal (id_personas) values (185);
insert into personal (id_personas) values (186);
insert into personal (id_personas) values (187);
insert into personal (id_personas) values (188);
insert into personal (id_personas) values (189);
insert into personal (id_personas) values (190);
insert into personal (id_personas) values (191);
insert into personal (id_personas) values (192);
insert into personal (id_personas) values (193);
insert into personal (id_personas) values (194);
insert into personal (id_personas) values (195);
insert into personal (id_personas) values (196);
insert into personal (id_personas) values (197);
insert into personal (id_personas) values (198);
insert into personal (id_personas) values (199);
insert into personal (id_personas) values (200);

insert into personal (id_personas, usuario, contraseña, isadmin) values (1, 'bizkoveski0', 'JqwBbtM', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (2, 'cchastan1', 'WRuP0WIP', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (3, 'gcarlson2', 'HaEYIcqR', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (4, 'emccolley3', 'vOeHtRPjC', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (5, 'jtortoishell4', '0xuXy6b', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (6, 'skeir5', 'c25JxzQo6', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (7, 'cditt6', '6hfSOt', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (8, 'lsall7', 'zrmeQ2XM', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (9, 'rduckfield8', 'geXq42L3DhU6', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (10, 'dkorf9', 'EG7myXiLq', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (11, 'nbeininga', 'B9qxs6Gkxpc', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (12, 'fcasleyb', 'ayIyMwJ', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (13, 'ovitallc', 'J2pzlpup', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (14, 'achimentid', 'YgsGjZD', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (15, 'hmcraee', 'nXCNdh0', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (16, 'dwavellf', 'AVEXksz', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (17, 'mfarnesg', 'SXl0E8oqKf5', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (18, 'ahumpageh', 'UR54pjCXS', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (19, 'mbastoni', 'AUQwaZMLGw', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (20, 'ncastanej', 'zCFwIWnZtbI4', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (21, 'vcaseleyk', 'aPjrma', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (22, 'aurquhartl', 'yPb9KJcJ58', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (23, 'dreekiem', 'gs8ojw1TW', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (24, 'madhamsn', 'wlzAXVLBS', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (25, 'bacreso', 'YH0h9w', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (26, 'olillemanp', '0Xg7rwgHIWC', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (27, 'rjamrowiczq', 'xmN5enO0', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (28, 'jcaliforniar', 'HI8j07a6', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (29, 'deastups', 'LSlzRdvPMqP', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (30, 'bwelbandt', 'qXnSSCFFt1nK', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (31, 'dtrinkeu', 'j3iVnc', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (32, 'uexerv', '0SSVssnRo8', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (33, 'mvinecombew', 'A3BD7W', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (34, 'ggrendonx', 'XZeiTeZu9', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (35, 'nlatliffy', 'xqlIBSsZFoF', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (36, 'cwaytez', 'hNCK0yIECwpo', false);
insert into personal (id_personas, usuario, contraseña, isadmin) values (37, 'fleyden10', 'SNuyDZN8', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (38, 'pdeamaya11', 'NdhHFga1AXWo', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (39, 'doleszczak12', 'lHGP9un1lLcf', true);
insert into personal (id_personas, usuario, contraseña, isadmin) values (40, 'abartoszek13', 'y8goVdfZue', true);
 