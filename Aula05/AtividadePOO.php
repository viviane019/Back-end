<?php
//Crie uma classe (Molde de objetos) chamada 'Cachorro com os seguintes atributos: nome, idade, raça, castrado e sexo .
// Apos a criação de clsse, crie 10 cachorros(10 objetos)
Class Cachorro {
    public $nome;
    public $idade;
    public $raca;
    public $castrado;
    public $sexo;

    public function __construct($nome, $idade, $raca, $castrado, $sexo) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->raca = $raca;
        $this->castrado = $castrado;
        $this->sexo = $sexo;
    }
}

$Cachorro1 = new Cachorro("Rex", 5, "Labrador", true, "Macho");
$Cachorro2 = new Cachorro( "Bella", 3, "Poodle", false, "Fêmea");
$cachorro3 = new Cachorro( "Max", 4, "Bulldog", true, "Macho");
$Cachorro4 = new Cachorro( "Lucy", 2, "Beagle", false, "Fêmea");
$Cachorro5 = new Cachorro( "Duke", 6, "Boxer", true, "Macho");
$Cachorro5 = new Cachorro( "Molly", 1, "Dachshund", false, "Fêmea");
$Cachorro6 = new Cachorro( "Rocky", 7, "Rottweiler", true, "Macho");
$Cachorro7 = new Cachorro( "Luna", 2, "Chihuahua", false, "Fêmea");
$Cachorro8 = new Cachorro( "Charlie", 3, "Golden Retriever", true, "Macho");
$Cachorro9 = new Cachorro( "Sadie", 4, "Shih Tzu", false, "Fêmea");
$Cachorro10 = new Cachorro( "Buddy", 5, "Cocker Spaniel", true, "Macho");
?>