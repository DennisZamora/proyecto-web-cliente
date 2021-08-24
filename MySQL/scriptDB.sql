create database proyecto;
use proyecto;


CREATE TABLE  rol (
  id INT NOT NULL AUTO_INCREMENT,
  idRol VARCHAR(15) NOT NULL,
  descripcionRol VARCHAR(30) NOT NULL,
  PRIMARY KEY (id));

CREATE TABLE usuario (
  idUsuario INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(30) NOT NULL,
  last_name VARCHAR(30) NOT NULL,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(80) NOT NULL,
  contrasena VARCHAR(40) NOT NULL,
  fecha_registro DATETIME NOT NULL DEFAULT current_timestamp,
  idRol int not null,
  PRIMARY KEY (idUsuario),
  CONSTRAINT FK_Usuario_Rol FOREIGN KEY (idRol) REFERENCES rol (id));

create table categoria(
idCategoria int not null auto_increment,
nombreCategoria varchar(50) not null,
constraint pk_categoria primary key(idCategoria));

CREATE TABLE blog (
idBlog int not null auto_increment,
tituloBlog varchar(100) not null,
contenidoBlog varchar(400) not null,
fecha_publicacion DATETIME NOT NULL DEFAULT current_timestamp,
idUsuario INT NOT NULL,
idCategoria int not null,
constraint PK_BLOG primary key(idBlog),
constraint FK_BLOG_CATEGORIA foreign key(idCategoria) references categoria (idCategoria),
constraint FK_BLOG_USUARIO foreign key(idUsuario) references usuario (idUsuario)
);

DELIMITER $$

DROP PROCEDURE IF EXISTS `proyecto`.`pGetCategoria`$$

CREATE PROCEDURE `proyecto`.`pGetCategoria`()
    BEGIN
	SELECT idCategoria,nombreCategoria FROM categoria;	
    END$$
    
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE proyecto.spInsertaBlog(in ptituloBlog varchar(100), in pcontenidoBlog varchar(400), in pidUsuario int, in pidCategoria int)
    BEGIN
    INSERT INTO blog (tituloBlog, contenidoBlog, idUsuario, idCategoria) VALUES (ptituloBlog, pcontenidoBlog, pidUsuario, pidCategoria);
    END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS `proyecto`.`pGetUsuario`$$

CREATE PROCEDURE `proyecto`.`pGetUsuario`()
    BEGIN
	SELECT idUsuario,username FROM usuario;	
    END$$
    
DELIMITER ;

insert into rol (idRol,descripcionRol) values 
('admin','Administrador'),
('usuario','Usuario regular');

insert into usuario (nombre,last_name,username,email,contrasena,idRol)values
('Dennis','Zamora','dennis','denniszamora@hotmail.com','dennis123',1);

insert into usuario (nombre,last_name,username,email,contrasena,idRol)values
('Jesus','Vargas','jesus','jesusvargas@hotmail.com','jesus123',2);

insert into categoria (nombreCategoria) values 
('MySQL'),
('JavaScript'),
('HTML5');

insert into blog (tituloBlog,contenidoBlog,idUsuario,idCategoria) values
('OPINION ABOUT MYSQL','MySQL is one of the best databases, very light,
 very easy to install and I disagree with the previous 
 comment about help, MySQL has hundreds and hundreds of
 help pages, you just have to enter the Mysql website. 
 The Payment Bases, it already has Stored Procedures, Triggers, Views, etc.',1,1);
 
 insert into blog (tituloBlog,contenidoBlog,idUsuario,idCategoria) values
('MYSQL NEEDS','MySQL was able to meet all my 
expectations in distinctive areas. Manage multiple tables
 for different services. Recover in disaster. 
 An agile and secure deployment of templates
 captured on the command line.',2,1);
 
 insert into blog (tituloBlog,contenidoBlog,idUsuario,idCategoria) values
('OPINION ABOUT HTML5 ','Excellent changes, the problem is who still uses IE6 
and that there are several and there is still time for it to be completely eradicated. 
The other browsers such as Opera and FF are sure to apply it and be guided according to 
the standards, on the other hand IE7 will surely come out with something proprietary. 
I hope not...',1,3);
 
 insert into blog (tituloBlog,contenidoBlog,idUsuario,idCategoria) values
('HTML5 ','I think that it will be very cool since it 
will simplify some things such as the new video tag and the footer, 
also remembering that not only can you use one h1 or h2 if not several
 in the same document but there is still a lot to be done for full
 compatibility but the best browser personally compatible is explorer
 and safari.',2,3);
 
  insert into blog (tituloBlog,contenidoBlog,idUsuario,idCategoria) values
('JAVASCRIPT DEFINITION','JavaScript is one of the most widely 
used and well-known programming languages, since it allows you 
to create dynamic and attractive pages in which you can interact 
more with users; for example, thanks to this language the most 
attractive visual experience of the user when updating your
 Facebook, Instagram, Twitter and other social networks status',1,2);
 
 insert into blog (tituloBlog,contenidoBlog,idUsuario,idCategoria) values
('JAVA ADVANTAGES','Javascript is a very simple language, 
it is fast, therefore it tends to execute the functions 
immediately, it also has multiple options for visual effects.
It is supported by the most popular browsers and is 
compatible with the most modern devices, including iPhone, mobiles and PS3. ',2,2);

