<?php
$flag_msg = true;
$msg = "";
$a = 15;
while ($a <= 200) {
  $quad = $a ** 2;
  $msg.= $a . "² = ";
  $msg.= "<span>".number_format($quad)."</span></br>";

  $a++;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <title>TROCO</title>
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Exibe o quadrado de 15 a 200</h1>
  <hr class="my-3">
  <p class="lead">Esse exercicio apresenta os quadrados dos números inteiros de 15 a 200.</p>
</div>

<div class="container">
    <?php 
    if (!is_null($flag_msg)) {
      if ($flag_msg) {
        echo "<div class='alert alert-success' role='alert'>$msg</div>"; 
      }else{
        echo "<div class='alert alert-warning' role='alert'>$msg</div>"; 
      }
    }
?>
</div>
</body>
</html>