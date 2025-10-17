<?php
class Destino {
    public $nome;
    public $comidasTipicas;
    public $lugaresParaNadar;

    public function __construct($nome, $comidasTipicas, $lugaresParaNadar) {
        $this->nome = $nome;
        $this->comidasTipicas = $comidasTipicas;
        $this->lugaresParaNadar = $lugaresParaNadar;
    }

    public function mostrarInformacoes() {
        echo "Destino: {$this->nome}\n";
        echo "Comidas típicas: " . implode(", ", $this->comidasTipicas) . "\n";
        echo "Locais para nadar: " . implode(", ", $this->lugaresParaNadar) . "\n\n";
    }
}

// Classe que representa um turista
class Turista {
    public $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function comer($comida) {
        echo "{$this->nome} está experimentando {$comida}.\n";
    }

    public function nadar($local) {
        echo "{$this->nome} está nadando em {$local}.\n";
    }
}

// Classe principal que representa a viagem
class Viagem {
    public $turistas = [];
    public $destinos = [];

    public function adicionarTurista(Turista $turista) {
        $this->turistas[] = $turista;
    }

    public function adicionarDestino(Destino $destino) {
        $this->destinos[] = $destino;
    }

    public function iniciarViagem() {
        foreach ($this->destinos as $destino) {
            echo "Visitando {$destino->nome}\n";
            $destino->mostrarInformacoes();

            foreach ($this->turistas as $turista) {
                // Escolhe aleatoriamente uma comida e um local para nadar
                $comida = $destino->comidasTipicas[array_rand($destino->comidasTipicas)];
                $local = $destino->lugaresParaNadar[array_rand($destino->lugaresParaNadar)];

                $turista->comer($comida);
                $turista->nadar($local);
                echo "\n";
            }
        }
    }
}

// --- Execução do cenário ---

// Criando destinos
$japao = new Destino("Japão", ["sushi", "ramen", "tempurá"], ["rio Sumida", "praia de Okinawa"]);
$brasil = new Destino("Brasil", ["feijoada", "acarajé", "churrasco"], ["praia de Copacabana", "rio Amazonas"]);
$acre = new Destino("Acre", ["tacacá", "peixe assado"], ["rio Acre"]);

// Criando turistas
$turista1 = new Turista("Ana");
$turista2 = new Turista("Carlos");

// Criando viagem
$viagem = new Viagem();
$viagem->adicionarDestino($japao);
$viagem->adicionarDestino($brasil);
$viagem->adicionarDestino($acre);
$viagem->adicionarTurista($turista1);
$viagem->adicionarTurista($turista2);

// Iniciando a viagem
$viagem->iniciarViagem();

?>
