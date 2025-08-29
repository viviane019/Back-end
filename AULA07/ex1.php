<?php
// 1. Criação básica
class Carro {
    private $marca;
    private $modelo;

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getModelo() {
        return $this->modelo;
    }
}

// Teste Carro
$carro = new Carro();
$carro->setMarca("Toyota");
$carro->setModelo("Corolla");
echo "Carro: " . $carro->getMarca() . " " . $carro->getModelo();
?> 