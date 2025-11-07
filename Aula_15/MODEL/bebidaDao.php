<?php

namespace Aula_15;

class BebidaDAO {

    private $bebidas = [];

    private $arquivo = 'bebidas.json';

    public function __construct() {
        if (file_exists($this->arquivo)) {
            $conteudo = file_get_contents($this->arquivo);

            $dados = json_decode($conteudo, true);

            if ($dados) {
                foreach ($dados as $nome => $info) {
                    $this->bebidas[$nome] = new Bebidas(
                        $info ['nome'],
                        $info ['categoria'],
                        $info ['volume'],
                        $info ['valor'],
                        $info ['qtde']
                    );
                }
            }
        }
    }

    private function salvarEmArquivo() {
        $dados = [];

        foreach ($this->bebidas as $nome => $bebidas) {
            $dados[$nome] = [
                'nome' => $bebidas->getNome(),
                'categoria'=> $bebidas->getCategoria(),
                'volume' => $bebidas->getVolume(),
                'valor' => $bebidas->getValor(),
                'qtde' => $bebidas->getQtde()
            ];
        }

        file_put_contents($this->arquivo, json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }

    public function criarBebida(Bebidas $bebidas) {
        $this->bebidas[$bebidas->getNome()] = $bebidas;
        $this->salvarEmArquivo();
    }

    public function lerBebida() {
        return $this->bebidas;
    }

    public function atualizarBebida($nome, $novoNome, $novaCategoria, $novoVolume, $novoValor, $novaQtde) {
        if (isset($this->bebidas[$nome])) {
            $this->bebidas[$nome]->setNome($novoNome);
            $this->bebidas[$nome]->setCategoria($novaCategoria);
            $this->bebidas[$nome]->setVolume($novoVolume);
            $this->bebidas[$nome]->setValor($novoValor);
            $this->bebidas[$nome]->setQtde($novaQtde);
        }
        $this->salvarEmArquivo();
    }

    public function excluirBebida($nome) {
        unset($this->bebidas[$nome]);
        $this->salvarEmArquivo();
    }
    
}

?>