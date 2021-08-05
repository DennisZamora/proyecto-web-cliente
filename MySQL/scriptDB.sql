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
('Lorem','No his munere interesset. At soluta accusam gloriatur eos, ferri commodo sed id,
 ei tollit legere nec. Eum et iudico graecis, cu zzril instructior per, usu at augue epicurei.
 Saepe scaevola takimata vix id. Errem dictas posidonium id vis, ne modo affert incorrupte eos.',1,1);

insert into blog (tituloBlog,contenidoBlog,idUsuario,idCategoria) values
('Improved Command Line Integration','Integrating the shell functionality in DevOps operations is a key feature and this release has introduced a big improvement on this area being the most remarkable improvements the following:

No longer need to execute APIs using the –execute (-e) command line argument: all of the data required for any API available in CLI can be defined through command line arguments (including lists).',1,1);

insert into blog (tituloBlog,contenidoBlog,idUsuario,idCategoria) values
('SkySQL, MariaDB-as-a-service, launches on Google Cloud','Today MariaDB Corporation officially launched SkySQL, a cloud-hosted version of the MariaDB database management system supported and managed by MariaDB’s own creators.

Aside from providing convenient access to MariaDB on Google Cloud Platform starting at $0.45 per hour, SkySQL strikes back at services like Google Cloud SQL and Amazon RDS — managed database solutions that feature forks of MySQL or MariaDB, but are often multiple versions behind the latest releases. Amazon RDS, for instance, only supports up to MariaDB 10.3, whereas MariaDB 10.4.12 is the most recent version.',1,1);

insert into blog (tituloBlog,contenidoBlog,idUsuario,idCategoria) values
('SolidJS creator: JavaScript innovation isn’t slowing down','One of the most interesting JavaScript frameworks gaining traction these days is SolidJS. Solid is interesting because it takes JSX (React’s templating language) in novel directions. It decorates JSX with a handful of reactive primitives. It is compiled (similar to Svelte). It layers on higher-order services (like a central store and events). And for good measure, it tosses in full-featured SSR (server-side rendering) and Suspense.

I talked to Solid’s creator, Ryan Carniato, about how he and the Solid team pulled this off, how Solid relates to industry developments, how innovative front-end features (like partial hydration, streaming SSR, and Suspense) are implemented, and what motivates him to keep pushing the limits of front-end JavaScript performance.',1,2);

insert into blog (tituloBlog,contenidoBlog,idUsuario,idCategoria) values
('TypeScript 4.4 brings performance boosts
','Microsoft has released a beta version of TypeScript 4.4, the latest planned version of its popular typed version of JavaScript, with capabilities including performance improvements and control flow analysis.

For faster declaration emits, TypeScript now caches whether internal symbols are accessible in different contexts, along with how specific types are to be printed. This improves general performance in code with fairly complex types. Other performance enhancements in TypeScript 4.4 promise faster path normalization and path mapping, along with faster incremental builds. Also, an optimization has been added for source map generation of very large output files.',1,2);

insert into blog (tituloBlog,contenidoBlog,idUsuario,idCategoria) values
('The case for HTML5 over mobile apps','There is no better time than now to test mobile marketing.

Mobile marketing is delivering great results and valuable data for many categories of marketers. Part of remaining relevant is having a mobile marketing strategy that allows users to engage with marketing content across multiple platforms.

Mobile can extend the conversation from traditional channels, help to activate prospects and customers, and provide mechanisms for tracking effectiveness across channels.',1,3);

insert into blog (tituloBlog,contenidoBlog,idUsuario,idCategoria) values
('Lorem','No his munere interesset. At soluta accusam gloriatur eos, ferri commodo sed id,
 ei tollit legere nec. Eum et iudico graecis, cu zzril instructior per, usu at augue epicurei.
 Saepe scaevola takimata vix id. Errem dictas posidonium id vis, ne modo affert incorrupte eos.',1,1);

select * from blog;
 
 select b.nombre,a.tituloBlog,a.contenidoBlog,a.fecha_publicacion,c.nombreCategoria  from blog a,usuario b,categoria c
 where a.idUsuario = b.idUsuario and
 c.idCategoria = a.idCategoria;