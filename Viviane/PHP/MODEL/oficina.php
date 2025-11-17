<?php

namespace Oficina; 
 
class Clientes {
    private $id_Cliente;
    private $nome;
    private $cpf;
    private $telefone;
    private $email;

    public function __construct(string $id_Cliente, string $nome, string $cpf, string $telefone, string $email) {
        $this->id_Cliente = $id_Cliente;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->email = $email;
    }

    public function getId_Cliente(): string {
        return $this->id_Cliente;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getCpf(): string {
        return $this->cpf;
    }

    public function getTelefone(): string {
        return $this->telefone;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setCpf(string $cpf): void {
        $this->cpf = $cpf;
    }

    public function setTelefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }
}