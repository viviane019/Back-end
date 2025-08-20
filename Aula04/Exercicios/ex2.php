<?php
// Modelagem de dados sem POO
$modelo_carro1 = "versa";
$marca_carro1 = "nissan";
$ano_carro1 = 2020;
$revisao_carro1 = true;
$Ndonos_carro1 = 2;

$modelo_carro2 = "M5";
$marca_carro2 = "BMW";
$ano_carro2 = 2018;
$revisao_carro2 = false;
$Ndonos_carro2 = 2;

$modelo_carro3 = "911";
$marca_carro3 = "porsche";
$ano_carro3 = 2026;
$revisao_carro3 = false;
$Ndonos_carro3 = 1;

$modelo_carro4 = "Dolphin";
$marca_carro4 = "BYD";
$ano_carro4 = 2023;
$revisao_carro4 = true;
$Ndonos_carro4 = 1;

function passouRevisao($revisaoF) {
    $revisaoF = false;
    return $revisaoF;
}

$revisao_carro4 = passouRevisao($revisao_carro4);

function novoDono($donos) {
    return $donos + 1;
}

$Ndonos_carro4 = novoDono($Ndonos_carro4);

// Função para verificar se é seminovo
function ehSeminovo($ano) {
    $anoAtual = date("Y");
    return ($anoAtual - $ano) <= 3;
}

// Testando a função com os carros fornecidos
echo "Carro 1 (" . $modelo_carro1 . "): " . (ehSeminovo($ano_carro1) ? "Seminovo" : "Não é seminovo") . "<br>";
echo "Carro 2 (" . $modelo_carro2 . "): " . (ehSeminovo($ano_carro2) ? "Seminovo" : "Não é seminovo") . "<br>";
echo "Carro 3 (" . $modelo_carro3 . "): " . (ehSeminovo($ano_carro3) ? "Seminovo" : "Não é seminovo") . "<br>";
echo "Carro 4 (" . $modelo_carro4 . "): " . (ehSeminovo($ano_carro4) ? "Seminovo" : "Não é seminovo") . "<br>";
?>