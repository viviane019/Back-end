<?php

    namespace Aula_15;
    require_once __DIR__ . '\..\model\BebidaDAO.php';
    require_once __DIR__ . '\..\model\Bebidas.php';

    class BebidaController {

        private $dao;

        public function __construct() {
            $this->dao = new BebidaDAO();
        }

        public function ler() {
            return $this->dao->lerBebida();
        }

        public function criar($nome, $categoria, $volume, $valor, $qtde) {
            $bebidas = new Bebidas($nome,$categoria, $volume, $valor, $qtde);
            $this->dao->criarBebida($bebidas);
        }

        public function excluir($nome) {
            $this->dao->excluirBebida($nome);
        }

        public function atualizar($nome, $novoNome, $novaCategoria, $novoVolume, $novoValor, $novaQtde) {
            $this->dao->atualizarBebida($nome, $novoNome, $novaCategoria, $novoVolume, $novoValor, $novaQtde);
        }
    }
?>