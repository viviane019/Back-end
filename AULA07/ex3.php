<?php
// 3. Validação em setter
class Aluno {
    private $nome;
    private $nota;

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNota($nota) {
        if ($nota >= 0 && $nota <= 10) {
            $this->nota = $nota;
        } else {
            $this->nota = 0;
        }
    }

    public function getNota() {
        return $this->nota;
    }
}

// Teste Aluno
$aluno1 = new Aluno();
$aluno1->setNome("vitoria");
$aluno1->setNota(8.5);

$aluno2 = new Aluno();
$aluno2->setNome("Viviane");
$aluno2->setNota(12); // inválido

echo "Aluno: " . $aluno1->getNome() . ", Nota: " . $aluno1->getNota();
echo "Aluno: " . $aluno2->getNome() . ", Nota: " . $aluno2->getNota();
?>