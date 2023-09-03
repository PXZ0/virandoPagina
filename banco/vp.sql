CREATE DATABASE vp;
 
USE vp;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
	id_usuario int auto_increment primary key,
	nome varchar(100) not null,
	email varchar(100) not null,
	senha varchar(40) not null,
	ft_usu varchar(100)
);

DROP TABLE IF EXISTS livros;
CREATE TABLE livros(
	id_livro int auto_increment primary key,
	nome varchar(100) not null,
	capa varchar(100)
);