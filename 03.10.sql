CREATE DATABASE curso;
USE CURSO;	

-- Tabela Aluno
CREATE TABLE Aluno (
  Id_Aluno INT PRIMARY KEY AUTO_INCREMENT,
  Nome_Aluno VARCHAR(255),
  Email VARCHAR(255),
  Data_Nascimento DATE
);

-- Tabela Curso
CREATE TABLE Curso (
  Id_Curso INT PRIMARY KEY AUTO_INCREMENT,
  Titulo VARCHAR(255),
  Descricao VARCHAR(255),
  Carga_Horaria INT,
  Status VARCHAR(255)
);

-- Tabela Inscrições
CREATE TABLE Inscricoes (
  Id_Inscricao INT PRIMARY KEY AUTO_INCREMENT,
  Data_Inscricao DATE,
  Aluno_Id INT,
  Curso_Id INT,
  FOREIGN KEY (Aluno_Id) REFERENCES Aluno(Id_Aluno),
  FOREIGN KEY (Curso_Id) REFERENCES Curso(Id_Curso)
);

-- Tabela Avaliacoes
CREATE TABLE Avaliacoes (
  Id_Avaliacao INT PRIMARY KEY AUTO_INCREMENT,
  Inscricao_Id INT,
  Nota DECIMAL(5,2),
  Comentario TEXT,
  FOREIGN KEY (Inscricao_Id) REFERENCES Inscricoes(Id_Inscricao)
);

-- Inserindo 5 Alunos
INSERT INTO Aluno (Nome_Aluno, Email, Data_Nascimento) VALUES
('João Silva', 'joao.silva@email.com', '2000-05-12'),
('Maria Oliveira', 'maria.oliveira@email.com', '1999-08-23'),
('Pedro Santos', 'pedro.santos@email.com', '2001-01-15'),
('Ana Costa', 'ana.costa@email.com', '1998-11-30'),
('Lucas Lima', 'lucas.lima@email.com', '2002-07-05');

-- Inserindo 5 Cursos (1 deles inativo)
INSERT INTO Curso (Titulo, Descricao, Carga_Horaria, Status) VALUES
('Introdução à Programação', 'Curso básico de lógica e programação em Python', 40, 'Ativo'),
('Banco de Dados', 'Conceitos e práticas com MySQL', 60, 'Ativo'),
('Desenvolvimento Web', 'HTML, CSS e JavaScript', 80, 'Ativo'),
('Machine Learning', 'Introdução ao aprendizado de máquina', 100, 'Inativo'),
('Redes de Computadores', 'Fundamentos de redes e protocolos', 50, 'Ativo');

-- Inserindo 5 Inscrições
INSERT INTO Inscricoes (Data_Inscricao, Aluno_Id, Curso_Id) VALUES
('2025-01-10', 1, 1),  -- João em Programação
('2025-01-15', 2, 2),  -- Maria em Banco de Dados
('2025-01-20', 3, 3),  -- Pedro em Desenvolvimento Web
('2025-01-25', 4, 5),  -- Ana em Redes
('2025-02-01', 5, 4);  -- Lucas em Machine Learning (curso inativo)

-- Inserindo 3 Avaliações (somente de quem já fez)
INSERT INTO Avaliacoes (Inscricao_Id, Nota, Comentario) VALUES
(1, 9.5, 'Excelente curso, aprendi bastante.'),
(2, 8.0, 'Bom curso, mas poderia ter mais exercícios práticos.'),
(3, 7.5, 'Gostei, mas achei o conteúdo corrido.');

-- revisão
select * from aluno;
select * from curso;
select * from  Inscricoes;
select * from Avaliacoes;

-- Atualização de Dados
UPDATE Aluno
SET Email = 'joao.silva.novo@email.com'
WHERE Id_Aluno = 1;

UPDATE Curso
SET Carga_Horaria = 70
WHERE Id_Curso = 2; 

UPDATE Aluno
SET Nome_Aluno = 'Pedro dos Santos'
WHERE Id_Aluno = 3;

UPDATE Curso
SET Status = 'Ativo'
WHERE Id_Curso = 4; 

UPDATE Avaliacoes
SET Nota = 9.0
WHERE Id_Avaliacao = 2;

-- delete
DELETE FROM Inscricoes
WHERE Id_Inscricao = 4; 


DELETE FROM Inscricoes
WHERE Curso_Id = 4;

DELETE FROM Curso
WHERE Id_Curso = 4;

DELETE FROM Avaliacoes
WHERE Id_Avaliacao = 3;


-- Deletar
-- Excluir avaliações relacionadas ao aluno
DELETE FROM Avaliacoes
WHERE Inscricao_Id IN (SELECT Id_Inscricao FROM Inscricoes WHERE Aluno_Id = 5);

-- Excluir inscrições do aluno
DELETE FROM Inscricoes
WHERE Aluno_Id = 5;

-- Excluir o aluno
DELETE FROM Aluno
WHERE Id_Aluno = 5;

DELETE FROM Inscricoes
WHERE Curso_Id = 4;

-- listar todos alunos
SELECT * FROM Aluno;
SELECT Nome_Aluno 
FROM Aluno;





