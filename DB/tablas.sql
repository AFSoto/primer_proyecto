CREATE DATABASE proyecto_php;
USE proyecto_php;

CREATE TABLE usuarios(
id          int(255) auto_increment not null,
nombre      varchar(100) not null,
apellidos   varchar(100) not null,
email       varchar(255) not null,
password    varchar(255) not null,
fecha       date not null,
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

CREATE TABLE categorias(
id      int(255) auto_increment not null,
nombre  varchar(100),
CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE entradas(
id              int(255) auto_increment not null,
usuario_id      int(255) not null,
categoria_id    int(255) not null,
titulo          varchar(255) not null,
descripcion     MEDIUMTEXT,
fecha           date not null,
CONSTRAINT pk_entradas PRIMARY KEY(id),
CONSTRAINT fk_entrada_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
CONSTRAINT fk_entrada_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id) ON DELETE NO ACTION
)ENGINE=InnoDb;


INSERT INTO usuarios (nombre, apellidos, email, passw, fecha)  VALUES 
('juan','perez gomez','juan.perez@gmail.com','1234','2025-08-14'),
('carlos','garcia torrez','carlos.garcia@gmail.com','1234','2025-08-12'),
('ana','martinez ruiz','ana.martinez@gmail.com','1234','2025-08-11'),
('luis',NULL,'luis.fernandez@gmail.com','1234','2025-08-10'),
('carlos',NULL,'carlos2.garcia@gmail.com','1234','2025-08-12');

INSERT INTO categorias (nombre) VALUES 
('tecnologia'),
('programacion'),
('ciencia'),
('viajes'),
('gastronomia');

desc entradas;

INSERT INTO entradas (usuario_id,categoria_id,titulo,descripcion,fecha) VALUES
(1,1,'la evolucion de la IA','un analisis de la inteligencia artificial','2025-08-14'),
(2,2,'aprendiendo PHP desde cero','guia basica para iniciar con PHP','2025-08-13'),
(3,3,'el telescopio james web','detalles del nuevo telescopio espacial','2025-08-12'),
(4,4,'vieaje a japon','experiencia viajando por tokio','2025-08-11'),
(5,5,'receta de paella','paso a paso para preparar','2025-08-10');