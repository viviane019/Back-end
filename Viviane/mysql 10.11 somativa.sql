CREATE DATABASE oficina;

DROP DATABASE IF EXISTS oficina_mecanica;
CREATE DATABASE oficina_mecanica CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE oficina_mecanica;

CREATE TABLE Cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    telefone VARCHAR(15),
    email VARCHAR(100) 
);


CREATE TABLE Veiculo (
    id_veiculo INT AUTO_INCREMENT PRIMARY KEY,
    placa VARCHAR(10) UNIQUE NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    marca VARCHAR(50) NOT NULL,
    ano INT,
    id_cliente INT NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES Cliente(id_cliente)
);

CREATE TABLE Mecanico (
    id_mecanico INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE 
);


CREATE TABLE Servico (
    id_servico INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(100) UNIQUE NOT NULL,
    mao_obra DECIMAL(10, 2) NOT NULL
);

CREATE TABLE Peca (
    id_peca INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) UNIQUE NOT NULL,
    valor_unitario DECIMAL(10, 2) NOT NULL,
    estoque INT NOT NULL DEFAULT 0
);


CREATE TABLE OrdemServico (
    id_os INT AUTO_INCREMENT PRIMARY KEY,
    data_abertura DATE NOT NULL,
    data_fechamento DATE NULL, 
    valor_total DECIMAL(10, 2) DEFAULT 0.00, 

    id_veiculo INT NOT NULL,
    FOREIGN KEY (id_veiculo) REFERENCES Veiculo(id_veiculo)
);