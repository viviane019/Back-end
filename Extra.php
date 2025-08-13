<?php

echo "Digite o primeiro valor: ";
$valor1 = trim(fgets(STDIN));


echo "Digite o segundo valor: ";
$valor2 = trim(fgets(STDIN));


if (is_numeric($valor1)) {
    $valor1 = $valor1 + 0; 
}
if (is_numeric($valor2)) {
    $valor2 = $valor2 + 0;
}


$tipo1 = gettype($valor1);
$tipo2 = gettype($valor2);


if ($tipo1 === $tipo2) {
    echo "Variáveis de tipos iguais! Primeiro valor do tipo $tipo1 e segundo valor do tipo $tipo2\n";
} else {
    echo "ERRO! Variáveis de tipos diferentes. Primeiro valor do tipo $tipo1 e segundo valor do tipo $tipo2\n";
}

?>