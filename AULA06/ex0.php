<?php

// Exercício 5 e 6
class Cachorro {
    public $nome;
    public $raca;

    public function __construct($nome, $raca) {
        $this->nome = $nome;
        $this->raca = $raca;
    }


    public function latir() {
        echo "O cachorro {$this->nome} está latindo!<br>";
    }

    public function marcarTerritorio() {
        echo "O cachorro {$this->nome} da raça {$this->raca} está marcando território.<br>";
    }
}>nome = $nome;
        $this->sexo = $sexo;
        $this->estadoCivil = $estadoCivil;
    }

    public function testandoReservista() {
        if (strtolower($this->sexo) === 'masculino') {
            echo "Apresente seu certificado de reservista do tiro de guerra!<br>";
        } else {
            echo "Tudo certo<br>";
        }
    }

    public function casame

// Exercício 7 e 8
class Usuarios {
    public $nome;
    public $sexo;
    public $estadoCivil;

    public function __construct($nome, $sexo, $estadoCivil) {
        $this-nto($anos_casado) {
        if (strtolower($this->estadoCivil) === 'casado') {
            echo "Parabéns pelo seu casamento de {$anos_casado} anos!<br>";
        } else {
            echo "oloco<br>";
        }
    }
}

// Exemplos de uso:
$cachorro = new Cachorro("Rex", "Labrador");
$cachorro->latir();
$cachorro->marcarTerritorio();

$usuario1 = new Usuarios("João", "Masculino", "Casado");
$usuario1->testandoReservista();
$usuario1->casamento(5);

$usuario2 = new Usuarios("Maria", "Feminino", "Solteiro");
$usuario2->testandoReservista();
$usuario2->casamento(0);
}
?>