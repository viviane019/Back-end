<?php
// 5. Alteração de dados
class Funcionario {
    private $nome;
    private $salario;

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setSalario($salario) {
        $this->salario = $salario;
    }          

    public function getSalario() {
        return $this->salario;
    }
}

// Teste Funcionario
$funcionario = new Funcionario();
$funcionario->setNome("Carlos");
$funcionario->setSalario(2500.00);

echo "Funcionário: " . $funcionario->getNome() . ", Salário: R$ " . number_format($funcionario->getSalario(), 2, ',', '.');

$funcionario->setNome("Ana");
$funcionario->setSalario(3200.00);

echo "Funcionário: " . $funcionario->getNome() . ", Salário: R$ " . number_format($funcionario->getSalario(), 2, ',', '.');
?>