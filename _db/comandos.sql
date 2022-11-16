create database lojaweb;

use lojaweb;

show databases;

CREATE TABLE usuario(
    id_usuario int AUTO_INCREMENT PRIMARY KEY,
    #id_usuario varchar(50) PRIMARY KEY,
    nome varchar(100) not null,
    foto varchar(150),
    cpf varchar(14),
    email varchar(150) not null,
    senha varchar(100) not null,
    telefone varchar(40),
    ativo boolean DEFAULT true );