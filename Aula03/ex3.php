<?php
// Solicita ao usuário um número de 1 a 7
echo "Digite um número de 1 a 7: ";
$numero = intval(trim(fgets(STDIN)));

switch ($numero) {
    case 1:
        echo "Domingo\n";
        break;
    case 2:
        echo "Segunda\n";
        break;
    case 3:
        echo "Terça\n";
        break;
    case 4:
        echo "Quarta\n";
        break;
    case 5:
        echo "Quinta\n";
        break;
    case 6:
        echo "Sexta\n";
        break;
    case 7:
        echo "Sábado\n";
        break;
    default:
        echo "Número inválido. Digite um número de 1 a 7.\n";
        break;
}
?>