-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE , (
Cod_Livros  int auto_increment  PRIMARY KEY,
Titulo int Not Null(255),
Autor varchar(100),
genero varchar(100),
preço varchar(255),
quantidade int Not Null(255),
Editora varchar(100)
)

CREATE TABLE autor (
cod_autor int auto_increment  PRIMARY KEY,
nome  varchar(255),
nascionalidade varchar(100),
data_nascimento  varchar(10)
)

CREATE TABLE Editora (
cod_editores int auto_increment PRIMARY KEY,
cnpj varchar(14),
endereço varchar(255),
-- Erro: nome do campo duplicado nesta tabela!
endereço varchar(255),
nome_Editora varchar(255),
contato varchar(9),
telefone varchar(8),
Cidade varchar(100),
cod_autor int auto_increment ,
FOREIGN KEY(cod_autor) REFERENCES autor (cod_autor)
)

CREATE TABLE Clientes  (
Cod_Cliente int auto_increment PRIMARY KEY,
nome_Cliente varchar(255),
CPF varchar(14),
data_Nascimento varchar(10),
telefone varchar(8),
e-mail varchar(255)
)

CREATE TABLE vendas (
data_Vendas varchar(10),
Cod_Vendas int auto_increment  PRIMARY KEY,
quantidade int Not Null100),
valor_total varchar(100),
Cod_Cliente int auto_increment,
Cod_Livros  int auto_increment ,
FOREIGN KEY(Cod_Cliente) REFERENCES Clientes  (Cod_Cliente),
FOREIGN KEY(Cod_Livros ) REFERENCES , (Cod_Livros)
)

CREATE TABLE Produz (
Cod_Produz Texto(1) PRIMARY KEY,
cod_autor int auto_increment ,
Cod_Livros  int auto_increment ,
FOREIGN KEY(cod_autor) REFERENCES autor (cod_autor),
FOREIGN KEY(Cod_Livros ) REFERENCES , (Cod_Livros)
)

