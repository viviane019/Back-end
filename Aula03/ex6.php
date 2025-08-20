<?php
// Solicita um número inicial ao usuário
echo "Digite um número inicial: ";
$numero = (int)trim(fgets(STDIN));

// Exibe a contagem regressiva até 1 usando for
for ($i = $numero; $i >= 1; $i--) {
    echo $i . PHP_EOL;
}
?>