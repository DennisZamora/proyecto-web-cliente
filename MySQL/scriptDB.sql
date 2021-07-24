create database proyecto;
use proyecto;


CREATE TABLE  rol (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
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
  idRol VARCHAR(15) NOT NULL,
  PRIMARY KEY (idUsuario),
  CONSTRAINT FK_Usuario_Rol FOREIGN KEY (idRol) REFERENCES proyecto4.rol (idRol));

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

insert into rol (idRol,descripcionRol) values 
('admin','Administrador'),
('usuario','Usuario regular');

insert into usuario (nombre,last_name,username,email,contrasena,idRol)values
('Jesus','Vargas','jesus','jesusvargas@hotmail.com','jesus123','usuario');
    
insert into categoria (nombreCategoria) values 
('MySQL'),
('JavaScript'),
('HTML5');

insert into blog (tituloBlog,contenidoBlog,idUsuario,idCategoria) values
('Lorem','No his munere interesset. At soluta accusam gloriatur eos, ferri commodo sed id,
 ei tollit legere nec. Eum et iudico graecis, cu zzril instructior per, usu at augue epicurei.
 Saepe scaevola takimata vix id. Errem dictas posidonium id vis, ne modo affert incorrupte eos.',1,1);
 
 select * from blog;
 
 select b.nombre,a.tituloBlog,a.contenidoBlog,a.fecha_publicacion,c.nombreCategoria  from blog a,usuario b,categoria c
 where a.idUsuario = b.idUsuario and
 c.idCategoria = a.idCategoria;