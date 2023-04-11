<?php

$vetor = array();
for ($i=0; $i < 20; $i++) { 
    $n = random_int(10, 1000);
    array_push($vetor, $n);
}

$min = 0;
$max = 0;
$somaVetor = 0;
$qtdPares = 0;

foreach ($vetor as $key => $value) {
    if ($key === 0) {
        $min = $value;
        $max = $value;
    }

    if ($value % 2 === 0) {
        $qtdPares++;
    }

    if ($value > $max) {
        $max = $value;
    }

    if ($value < $min) {
        $min = $value;
    }
    $somaVetor += $value;
}

echo "Maior = " . $max . "<br/>";
echo "Menor = " . $min . "<br/>";
echo "Média dos valores = " . number_format($somaVetor / 20, 2) . "<br/>";
echo "Percentual números pares = " . number_format($qtdPares / 20 * 100, 2) . "%<br/>";



?>