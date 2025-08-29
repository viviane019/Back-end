<?php
// 4. Encapsulamento de Produto
class Produto {
    private $nome;
    private $preco;
    private $estoque;

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setEstoque($estoque) {
        $this->estoque = $estoque;
    }

    public function getEstoque() {
        return $this->estoque;
    }
}

// Teste Produto
$produto = new Produto();
$produto->setNome("Notebook");
$produto->setPreco(3500.00);
$produto->setEstoque(15);

echo "O produto " . $produto->getNome() . " custa R$ " . number_format($produto->getPreco(), 2, ',', '.') . " e possui " . $produto->getEstoque() . " unidades em estoque";
  
?>