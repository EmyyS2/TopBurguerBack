drop database BloodVine;

create database BloodVine;

use BloodVine;

create table alunos (
	id int not null auto_increment,
	nome varchar (255) not null,
	endereco varchar(120) not null,
    telefone varchar(11) not null,
    email varchar(255) not null,
	primary key(id)
);

create table produtos (
	id int not null auto_increment,
	nome varchar(45) not null unique,
	descricao varchar(500),
	valor decimal(15,2) not null,
	primary key(id)
);

create table status(
id int not null auto_increment,
status varchar(100),
primary key(id)
);

create table pedidos(
produtos_id int not null,
	clientes_id int not null,
	status_id int not null,
	primary key(produtos_id, clientes_id, status_id),
	constraint fk_produtos_pedidos
		foreign key (produtos_id)
		references produtos (id),
		constraint fk_clientes_pedidos
		foreign key (clientes_id)
		references clientes (id),
		constraint fk_status_pedidos
		foreign key (status_id)
		references status (id)
		
	);