<?php

    namespace Aula_15;
    
    class Bebidas {
        private $nome;
        private $categoria;
        private $volume;
        private $valor;
        private $qtde;

        public function __construct($nome, $categoria, $volume, $valor, $qtde) {
            $this->setNome($nome);
            $this->setCategoria($categoria);
            $this->setVolume($volume);
            $this->setValor($valor);
            $this->setQtde($qtde);
        }

        public function setNome(string $nome){
            $this->nome = $nome;
        }

        public function setCategoria(string $categoria){
            $this->categoria = $categoria;
        }

        public function setVolume(string $volume){
            $this->volume = $volume;
        }

        public function setValor(string $valor) {
            $this->valor = $valor;
        }

        public function setQtde(int $qtde){
            $this->qtde = $qtde;
        }


        public function getNome() : string {
            return $this->nome;
        }

        public function getCategoria() : string {
            return $this->categoria;
        }

        public function getVolume() : string {
            return $this->volume;
        }

        public function getValor() : string {
            return $this->valor;
        }

        public function getQtde() : int {
            return $this->qtde;
        }

    }
?>