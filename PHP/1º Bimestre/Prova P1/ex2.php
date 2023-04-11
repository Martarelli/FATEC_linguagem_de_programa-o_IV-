<?php

$vetor = array();

for ($i=0; $i < 3; $i++) { 
    $vet = array();
    for ($j=0; $j < 20; $j++) { 
        $n = random_int(0, 100);
        array_push($vet, $n);
    }
    sort($vet);
    array_push($vetor, $vet);
}

$repetidos = array();
for ($i=0; $i < 1; $i++) {
    foreach ($vetor[$i] as $num) {
        $contem = 0;
        foreach($vetor[1] as $num1){
            if($num === $num1){
                $contem++;
                break;
            }
        }
        foreach($vetor[2] as $num2){
            if($num === $num2){
                $contem++;
                break;
            }
        }
        if($contem === 2){
            array_push($repetidos, $num);
        }
    }
}
foreach ($vetor as $key => $value) {
   print_r($value);
   echo "<br/>";
}
echo "VETOR NÚMEROS REPETIDOS: ";
print_r($repetidos);

?>