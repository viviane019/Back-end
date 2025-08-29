p<?php
// 2. Pessoa com atributos
class Pessoa {
    private $nome;
    private $idade;
    private $email;

    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setIdade(int $idade) {
        if ($idade >= 0) {
            $this->idade = $idade;
        } else {
            $this->idade = 0;
        }
    }

    public function getIdade(): int {
        return $this->idade;
    }

    public function setEmail(string $email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            $this->email = "";
        }
    }

    public function getEmail(): string {
        return $this->email;
    }
}

// Teste Pessoa
$pessoa = new Pessoa();
$pessoa->setNome("Viviane");
$pessoa->setIdade(17);
$pessoa->setEmail("viviane99@gmail.com");
echo "O nome é " . $pessoa->getNome() . ", tem " . $pessoa->getIdade() . " anos e o email é " . $pessoa->getEmail();
?>