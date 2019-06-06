drop database if exists manter;
create database if not exists manter;

use manter;

-- DOWN
drop table if exists users;

-- UP
create table users(
    cliente_id   int primary key auto_increment,
    nome   varchar(100) not null,
    telefone varchar(14) not null,
    cidade 		varchar(100) not null,
    estado 		varchar(50) not null,
    email		varchar(80) not null,
    info_adicionais varchar(255),
    pessoa_tipo enum('fisica','juridica'),
    created_at timestamp,
    cpf_cnpj varchar(18)
);
