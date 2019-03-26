CREATE DATABASE IF NOT EXISTS db_redeSocial;


CREATE TABLE tbl_usuarios(
	id integer auto_increment primary key,
	nome varchar(100),
	sobrenome varchar(100),
	cpf varchar(20),
	email varchar(50),
	cientista_dados varchar(3),
	telefone varchar(20),
	celular varchar (20),
	data_nascimento date,
	status varchar(10),
	foto varchar(300),
	data_cadastro timestamp default CURRENT_TIMESTAMP,
	data_alteracao timestamp
);
	
	
	