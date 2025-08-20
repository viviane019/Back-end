<?php
class Carro {
    public $marca;
    public $modelo;
    public $ano;
    public $revisao;
    public $N_Donos;

    public function __construct($marca, $modelo, $ano, $revisao, $N_Donos) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->revisao = $revisao;
        $this->N_Donos = $N_Donos;
    }
}

$carro1 = new Carro("Porche", "911", 2020, false, 3);
$carro2 = new Carro("Ford", "Mustang", 2018, true, 4);
$Carro3 = new Carro( "Toyota", "Corolla", 2021, false, N_Donos: 2 );
$Carro4 = new Carro( "Ford", "Mustang", 2019, true, N_Donos: 4 );
$Carro5 = new Carro( "Chevrolet", "Camaro", 2022, false, N_Donos: 1 );
$Carro6 = new Carro( "Honda", "Civic", 2020, true, N_Donos: 3 );