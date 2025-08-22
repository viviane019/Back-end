<?php
// Crie uma classe "produtos" com ao menos 4 atributos sem a utilização de um construtor 
class produtos {
    public $nome;
    public $preco;
    public $quantidade;
    public $categoria;
}

// Crie ao menos 3 objetos para cada classe 
$objeto1 = new produtos();
$objeto1->nome = "Notebook";
$objeto1->preco = 3500.00;
$objeto1->quantidade = 10;
$objeto1->categoria = "Informática";

$objeto2 = new produtos();
$objeto2->nome = "Smartphone";
$objeto2->preco = 2000.00;
$objeto2->quantidade = 25;
$objeto2->categoria = "Eletrônicos";

$objeto3 = new produtos(); 
$objeto3->nome = "Cadeira Gamer";
$objeto3->preco = 800.00;
$objeto3->quantidade = 5;
$objeto3->categoria = "Móveis";