<?php

namespace Aula17;

use PDO;

require_once 'Livro.php';
require_once 'Connection.php';

class LivroDAO {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getInstance();

        // Cria a tabela se não existir
        $this->conn->exec("
            CREATE TABLE IF NOT EXISTS Livros (
                id INT AUTO_INCREMENT PRIMARY KEY,
                titulo VARCHAR(200) NOT NULL,
                autor VARCHAR(150) NOT NULL,
                ano INT,
                genero VARCHAR(100) NOT NULL,
                quantidade INT 
            )
        ");
    }
    
    // CREATE
    public function criarLivro(Livro $livro) {
        $stmt = $this->conn->prepare("
            INSERT INTO livros (titulo, autor, ano, genero, quantidade)
            VALUES (:titulo, :autor, :ano, :genero, :quantidade)
        ");
        $stmt->execute([
            ':titulo' =>trim( $livro->getTitulo()),
            ':autor' => trim($livro->getAutor()),
            ':ano' => trim($livro->getAno()),
            ':genero' => trim($livro->getGenero()),
            ':quantidade' => trim($livro->getQuantidade())
        ]);
        return $this->conn->lastInsertId();
    }

    // READ 
    public function lerLivros() { 
        $stmt = $this->conn->prepare("SELECT * FROM livros ORDER BY titulo");
        
        // CORREÇÃO ESSENCIAL: EXECUTAR a query
        $stmt->execute(); 
        
        $result = [];
      
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $livro = new Livro(
                $row['titulo'],
                $row['autor'],
                $row['ano'],
                $row['genero'],
                $row['quantidade']
            );
            $result[] = ['id' => $row['id'], 'livro' => $livro];
        }
        return $result;
    }

    // UPDATE
    public function atualizarLivro($id, $titulo, $autor, $ano, $genero, $quantidade) {
        $stmt = $this->conn->prepare("
            UPDATE livros
            SET titulo = :titulo, autor = :autor, ano = :ano, genero = :genero, quantidade = :quantidade
            WHERE id = :id
        ");
        $stmt->execute([
            ':id' => $id,
            ':titulo' => $titulo,
            ':autor' => $autor,
            ':ano' => $ano,
            ':genero' => $genero,
            ':quantidade' => $quantidade // ESTE PARÂMETRO ESTÁ CORRETO
        ]);
    }

    // DELETE
    public function excluirLivro($id) {
        $stmt = $this->conn->prepare("DELETE FROM livros WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    // BUSCAR POR ID 
    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM livros WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return [
                'id' => $row['id'],
                'livro' => new Livro(
                    $row['titulo'],
                    $row['autor'],
                    $row['ano'],
                    $row['genero'],
                    $row['quantidade']
                )
            ];
        }
        return null;
    }
    
    
    public function buscarPorTitulo($titulo) {
        $stmt = $this->conn->prepare("SELECT * FROM livros WHERE titulo = :titulo LIMIT 1");
        $stmt->execute([':titulo' => $titulo]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return [
                'id' => $row['id'],
                'livro' => new Livro(
                    $row['titulo'],
                    $row['autor'],
                    $row['ano'],
                    $row['genero'],
                    $row['quantidade']
                )
            ];
        }
        return null;
    }
}