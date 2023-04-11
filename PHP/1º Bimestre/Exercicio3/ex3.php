<?php 
$numero = 100;

for($i = 0 ; $i <= $numero; $i++){
    if($i % 2 === 0){
        echo "<b>".$i."</b>";
    } else {
        echo "<span>".$i."</span>";
    }
}

$arr = array(1,2,3,4,5);
foreach ( $arr as &$valor){
    $valor *= 2;
}


?>