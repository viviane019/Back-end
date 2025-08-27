<?php

// 1. Classe Moto com 4 atributos sem construtor
class Moto {
    public $marca;
    public $modelo;
    public $cor;
    public $ano;
}

// 2. Criando 3 objetos da classe Moto
$moto1 = new Moto();
$moto1->marca = "Honda";
$moto1->modelo = "CG 160";
$moto1->cor = "Vermelha";
$moto1->ano = 2022;

$moto2 = new Moto();
$moto2->marca = "Yamaha";
$moto2->modelo = "Fazer 250";
$moto2->cor = "Azul";
$moto2->ano = 2021;

$moto3 = new Moto();
$moto3->marca = "Suzuki";
$moto3->modelo = "GSX-S750";
$moto3->cor = "Preta";
$moto3->ano = 2023;

// 3. Classe com 3 construtores diferentes
class Pessoa {
    public $dia;
    public $mes;
    public $ano;
    public $nome;
    public $idade;
    public $cpf;
    public $telefone;
    public $endereco;
    public $estado_civil;
    public $sexo;
    public $marca;
    public $categoria;
    public $data_fabricacao;
    public $data_venda;

    // 1° Construtor: 3 parâmetros
    public static function criarPorData($dia, $mes, $ano) {
        $obj = new self();
        $obj->dia = $dia;
        $obj->mes = $mes;
        $obj->ano = $ano;
        return $obj;
    }

    // 2° Construtor: 7 parâmetros
    public static function criarPorDadosPessoais($nome, $idade, $cpf, $telefone, $endereco, $estado_civil, $sexo) {
        $obj = new self();
        $obj->nome = $nome;
        $obj->idade = $idade;
        $obj->cpf = $cpf;
        $obj->telefone = $telefone;
        $obj->endereco = $endereco;
        $obj->estado_civil = $estado_civil;
        $obj->sexo = $sexo;
        return $obj;
    }

    // 3° Construtor: 5 parâmetros
    public static function criarPorMoto($marca, $nome, $categoria, $data_fabricacao, $data_venda) {
        $obj = new self();
        $obj->marca = $marca;
        $obj->nome = $nome;
        $obj->categoria = $categoria;
        $obj->data_fabricacao = $data_fabricacao;
        $obj->data_venda = $data_venda;
        return $obj;
    }
}

// Exemplos de uso dos construtores
$pessoa1 = Pessoa::criarPorData(10, 6, 2024);
$pessoa2 = Pessoa::criarPorDadosPessoais("João", 30, "123.456.789-00", "11999999999", "Rua A, 123", "Solteiro", "M");
$pessoa3 = Pessoa::criarPorMoto("Honda", "CG 160", "Street", "2022-01-01", "2024-06-10");