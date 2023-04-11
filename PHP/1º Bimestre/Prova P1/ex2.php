<?php

$vetor = array();

for ($i=0; $i < 3; $i++) { 
    $vet = array();
    for ($j=0; $j < 20; $j++) { 
        $n = random_int(0, 100);
        array_push($vet, $n);
    }
    array_push($vetor, $vet)
}


?>