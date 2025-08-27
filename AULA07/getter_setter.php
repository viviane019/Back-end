<?php 
class Pessoa {
    private $nome;
    private $cpf;
    private $telefone;
    private $idade;
    private $email;
    private $senha;

    // Construtor
    public function __construct($nome, $cpf, $telefone, $idade, $email, $senha) {
        $this->setNome($nome);
        $this->setCpf($cpf);
        $this->setTelefone($telefone);
        $this->setIdade($idade);
        $this->email = $email;
        $this->senha = $senha;
    }

    // Getter e Setter para $nome
    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = ucwords(strtolower($nome));
    }

    // Getter e Setter para $cpf
    public function getCpf() {
        return $this->cpf;
    }
    public function setCpf($cpf) {
        $this->cpf = preg_replace('/\D/', '', $cpf);
    }

    // Getter e Setter para $telefone
    public function getTelefone() {
        return $this->telefone;
    }
    public function setTelefone($telefone) {
        $this->telefone = preg_replace('/\D/', '', $telefone);
    }

    // Getter e Setter para $idade
    public function getIdade() {
        return $this->idade;
    }
    public function setIdade($idade) {
        $this->idade = abs((int)$idade);
    }
 
    }
}

$aluno1 = new Pessoa("Viviane Vitoria", "123.456.789-00", "(11) 91234-5678", 20, "teste@teste.com", "senha123");

echo $aluno1->getNome();
?>