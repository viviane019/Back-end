<?php
function precisaRevisao($revisao, $ano) {
    if (!$revisao && $ano < 2022) {
        return "Precisa de revisão";
    } else {
        return "Revisão em dia";
    }
}

// Exemplo de uso:
echo precisaRevisao(false, 2020); // Precisa de revisão
echo precisaRevisao(true, 2020);  // Revisão em dia
echo precisaRevisao(false, 2023); // Revisão em dia
?>