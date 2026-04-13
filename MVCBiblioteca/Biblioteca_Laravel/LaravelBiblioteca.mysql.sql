create database LaravelBiblioteca;
use LaravelBiblioteca;

create table Livros(
	id int auto_increment primary key,
    nome varchar(100),
    autor varchar(100),
    descricao varchar(255),
    created_at timestamp null,
    updated_at timestamp null
);

ALTER TABLE Livros 
ADD COLUMN editora_id INT,
ADD CONSTRAINT fk_Livros_Editora
FOREIGN KEY (editora_id) REFERENCES Editora(id);

ALTER TABLE Livros
ADD COLUMN detalhe_id INT,
ADD CONSTRAINT fk_Livros_Detalhe
FOREIGN KEY (detalhe_id) REFERENCES Detalhe(id);

select * from Livros;

create table Editora(
	id int auto_increment primary key,
    nomeEd varchar(100),
    cnpj int,
    pais varchar(255),
    cidade varchar(255),
    created_at timestamp null,
    updated_at timestamp null
);
select * from Editora;

create table Detalhe(
	id int auto_increment primary key,
    custo varchar(100),
    preco_venda varchar(100),
    imposto varchar(100),
    created_at timestamp null,
    updated_at timestamp null
);
select * from Detalhe;



