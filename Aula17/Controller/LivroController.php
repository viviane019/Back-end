<?php
namespace Aula17;

require_once __DIR__. "/../Model/LivroDAO.php"; 
require_once __DIR__. "/../Model/Livro.php";

class LivroController {
    private $dao;

    public function __construct() {
        $this->dao = new LivroDAO();
    }

    // READ
    public function ler() {
        return $this->dao->lerLivros(); 
    }

    // CREATE
    public function criar($titulo, $autor, $ano, $genero, $quantidade) {
    
        $livro = new Livro( $titulo, $autor, $ano, $genero, $quantidade);
        $this->dao->criarLivro($livro);
    }

    // UPDATE
    public function atualizar($id, $titulo, $autor, $ano, $genero, $quantidade) {
        $this->dao->atualizarLivro($id, $titulo, $autor, $ano, $genero, $quantidade);
    }

    // DELETE
    public function deletar($id) { 
        $this->dao->excluirLivro($id);
    }


    public function buscarPorId($id) {
        return $this->dao->buscarPorId($id);
    }
    

    public function buscarPorTitulo($titulo) {
        return $this->dao->buscarPorTitulo($titulo);
    }
}