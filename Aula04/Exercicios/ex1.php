<?php

$modelo_carro= "Versa";
$marca_carro="Nissan";
$ano_carro=2020;
$revisao_carro="Sim";
$ndonos_carro=2;

$modelo_carro2="M5";
$marca_carro2="BMW";
$ano_carro2=2018;
$revisao_carro2=false;
$ndonos_carro2=2;

$modelo_carro3="911";
$marca_carro3="Porsche";
$ano_carro3=2026;
$revisao_carro3=false;
$ndonos_carro3=1;

$modelo_carro4="Dolphin";
$marca_carro4="BYD";
$ano_carro4=2023;
$revisao_carro4=false;
$ndonos_carro4=1;

function exibirCarro($modelo, $marca, $ano, $revisao, $Ndonos) : void {
    echo "O carro $marca $modelo, ano $ano, já passou por revisão: $revisao, número de donos: $Ndonos";
}

exibirCarro($modelo_carro, $marca_carro, $ano_carro, $revisao_carro, $ndonos_carro);
exibirCarro($modelo_carro2, $marca_carro2, $ano_carro2, $revisao_carro2, $ndonos_carro2);
exibirCarro($modelo_carro3, $marca_carro3, $ano_carro3, $revisao_carro3, $ndonos_carro3);
exibirCarro($modelo_carro4, $marca_carro4, $ano_carro4, $revisao_carro4, $ndonos_carro4);
?>