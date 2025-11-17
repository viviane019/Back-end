<?php

namespace Oficina;
require_once __DIR__ . '/../model/oficinaDAO.php';
require_once __DIR__ . '/../model/oficina.php';
require_once __DIR__ . '/../model/Connection.php';

class OficinaController {

    private $dao;

    public function __construct() {
        $this->dao = new OficinaDAO();
    }

    public function ler() {
        return $this->dao->lerOficina();
    }

    public function criar(string $nome, string $cpf, string $telefone, string $email): Oficina {
        $oficina = new Oficina($nome, $cpf, $telefone, $email);
        $this->dao->criarOficina($oficina);
        return $oficina;
    }

    public function excluir(string $cpf) {
        $this->dao->excluirOficina($cpf);
    }

    public function atualizar(string $cpfOriginal, string $novoNome, string $novoCpf) {
        $this->dao->atualizarOficina($cpfOriginal, $novoNome, $novoCpf);
    }
}
