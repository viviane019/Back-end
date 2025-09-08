-- BIBLIOTECA

CREATE DATABASE Biblioteca;
USE Biblioteca;

-- CODIGO 
CREATE TABLE Livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100),
    autor VARCHAR(100),
    ano_publicacao INT
);

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100)
);

  -- ALTERAR
ALTER TABLE Livros ADD genero VARCHAR(50);
ALTER TABLE Clientes ADD telefone VARCHAR(20);

-- TESTE
select * from livros;
select * from Clientes;



-- ATUALIZADOS
INSERT INTO Livros (titulo, autor, ano_publicacao, genero)
VALUES ('Dom Casmurro', 'Machado de Assis', 1899, 'Romance');

INSERT INTO clientes (nome, email, telefone)
VALUES ('Ana Souza', 'ana@email.com', '11 9 9999-9999');

-- DELETE
DELETE FROM LIVROS WHERE ID = 1;
DELETE FROM CLIENTES WHERE ID = 1;


