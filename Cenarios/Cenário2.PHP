,<?php
//Heróis e Personagens
class Local {
    public $nome;
    public $atividade;

    public function __construct($nome, $atividade) {
        $this->nome = $nome;
        $this->atividade = $atividade;
    }

    public function descrever() {
        echo "Local: {$this->nome} — Atividade: {$this->atividade}\n";
    }
}

// Classe que representa um herói
class Heroi {
    public $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function treinar($local) {
        echo "{$this->nome} está fazendo treinamentos especiais no {$local}.\n";
    }

    public function doarBrinquedos($local) {
        echo "{$this->nome} está doando brinquedos às crianças no {$local}.\n";
    }
}

// Classe que representa a missão
class Missao {
    public $herois = [];
    public $locais = [];

    public function adicionarHeroi(Heroi $heroi) {
        $this->herois[] = $heroi;
    }

    public function adicionarLocal(Local $local) {
        $this->locais[] = $local;
    }

    public function iniciarMissao() {
        echo "Início da Missão dos Heróis\n\n";

        foreach ($this->locais as $local) {
            $local->descrever();

            foreach ($this->herois as $heroi) {
                if (strpos(strtolower($local->atividade), 'treinamento') !== false) {
                    $heroi->treinar($local->nome);
                } elseif (strpos(strtolower($local->atividade), 'doar') !== false) {
                    $heroi->doarBrinquedos($local->nome);
                }
            }
            echo "\n";
        }

        echo "Missão Concluída\n";
    }
}

// --- Execução do cenário ---

// Criando os heróis
$batman = new Heroi("Batman");
$superman = new Heroi("Superman");
$homemAranha = new Heroi("Homem-Aranha");

// Criando os locais
$cotil = new Local("Cotil", "treinamento especial");
$shopping = new Local("Shopping", "doar brinquedos às crianças");

// Criando a missão
$missao = new Missao();
$missao->adicionarHeroi($batman);
$missao->adicionarHeroi($superman);
$missao->adicionarHeroi($homemAranha);
$missao->adicionarLocal($cotil);
$missao->adicionarLocal($shopping);

// Iniciando a missão
$missao->iniciarMissao();

?>
