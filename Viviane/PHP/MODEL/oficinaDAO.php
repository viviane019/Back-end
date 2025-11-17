<?php

namespace Oficina;

use Connection;
use PDO;

require_once 'oficina.php';
require_once 'Connection.php';

class oficinaDAO {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getInstance();
    }

    // CREATE
    public function criarCliente(cliente $cliente) {
        $stmt = $this->conn->prepare("
            INSERT INTO Cliente (nome, cpf, telefone, email )
            VALUES (:nome, :cpf, :telefone, :email)
        ");
        $stmt->execute([
            ':nome' => $cliente->getNome(),
            ':cpf' => $cliente->getCpf(),
            ':telefone' => $cliente->getTelefone(),
            ':email' => $cliente->getEmail()

        ]);
    }

    // READ
    public function lerClientes() {
        $stmt = $this->conn->query("SELECT * FROM Mecanico ORDER BY nome");
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new cliente(
                $row['nome'],
                $row['cpf'],
                $row['telefone'],
                $row['email']
            );
        }
        return $result;
    }

    // UPDATE
    public function atualizarCliente(string $novoNome, string $novoCpf, string $cpfOriginal, string $novoTelefone, string $novoEmail) {
        $stmt = $this->conn->prepare("
            UPDATE Mecanico
            SET nome = :novoNome, cpf = :novoCpf, telefone = :novoTelefone, email = :novoEmail
            WHERE cpf = :cpfOriginal
        ");
        $stmt->execute([
            ':novoNome' => $novoNome,
            ':novoCpf' => $novoCpf,
            ':cpfOriginal' => $cpfOriginal,
            ':novoTelefone' => $novoTelefone,
            ':novoEmail' => $novoEmail
        ]);
    }

    // DELETE
    public function excluirClientes(string $cpf) {
        $stmt = $this->conn->prepare("DELETE FROM Mecanico WHERE cpf = :cpf");
        $stmt->execute([':cpf' => $cpf]);
    }
}