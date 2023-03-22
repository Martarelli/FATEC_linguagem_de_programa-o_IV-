<?php 
$numero = 100;

for($i = 0 ; $i <= $numero; $i++){
    if($i % 2 === 0){
        echo "<b>".$i."</b>";
    } else {
        echo "<span>".$i."</span>";
    }
}


?>