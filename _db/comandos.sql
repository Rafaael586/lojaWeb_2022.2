/* DDL: linguagem de definição de dados */ 
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
    ativo boolean DEFAULT true
);

show tables;

desc usuario;

alter TABLE usuario add data_nasc date null;

CREATE TABLE Funcionario( 
    id_funcionario int AUTO_INCREMENT PRIMARY KEY,
    cargo varchar(50) NOT null,
    id_usuario int NOT Null,
    FOREIGN KEY(id_usuario) REFERENCES usuario(id_usuario)
);


/* DML: limguagem de manipulação de dados */
INSERT into usuario (nome, email, senha) 
VALUES ('Ana Maria', 'ana@email.com', '12345');

INSERT into usuario (nome, email, senha) 
VALUES
('Carlos Cunha', 'carlos@email.com', '333333'),
('Paulo Silva', 'paulo@email.com', '222222'),
('Maria da Silva', 'maria@email.com', '44444');

INSERT INTO funcionario (id_usuario, cargo) 
VALUES (1,"Gerente");

select * from usuario;

select usuario.nome, funcionario.cargo 
from usuario, funcionario;

select usuario.*, funcionario.cargo 
from usuario, funcionario
WHERE funcionario.cargo = "Gerente";

SELECT * 
FROM usuario,funcionario 
where usuario.id_usuario = funcionario.id_usuario
and usuario.data_nasc ='2022-12-01';

SELECT * 
FROM usuario,funcionario 
where usuario.id_usuario = funcionario.id_usuario 
and usuario.data_nasc BETWEEN '2022-12-01' and '2022-12-30';