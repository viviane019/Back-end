<?php
// Solicita ao usuário um número
echo "Digite um número para ver sua tabuada: ";
$numero = (int)fgets(STDIN);

// Exibe a tabuada de 1 a 10
for ($i = 1; $i <= 10; $i++) {
    $resultado = $numero * $i;
    echo "$numero x $i = $resultado\n";
}
?>