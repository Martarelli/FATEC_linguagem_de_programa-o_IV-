<?php
$flag_msg = true;
$msg = "";
$numeros = array();
$qtdPares = 0;
$qtdPrimos = 0;
for ($i=0; $i < 50 ; $i++) { 
  $n = random_int(0,100);
  array_push($numeros, $n);
}

sort($numeros);

foreach ($numeros as $key => $value) {
  $msg .= $value . " ";
}

foreach ($numeros as $key => $value) {
  $divisores = 0;
  for($i=2; $i<$value; $i++){
    if($n % $i == 0){
        $divisores++;
    }
  }
  if($divisores != 0) {
    $qtdPrimos++;
  };
  if ($value % 2 === 0) {
    $qtdPares++;
  }
}

$msg .= "<br/>Quantidade Números Primos = " . $qtdPrimos;
$msg .= "<br/>Quantidade Números Pares = " . $qtdPares;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <title>ARRAY</title>
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Exibe a array de números inteiros</h1>
  <hr class="my-3">
  <p class="lead">Esse exercicio apresenta exibir a soma dos elementos do array, a média dos elementos, o menor e o maior elemento e a suas respectivas posições do array.</p>
</div>

<div class="container">
<form method="GET">
  <div class="form-group col-md-2">
    <label for="numero">Informe um número:</label>
    <input type="text" class="form-control" id="num" name="num" required>
  </div>
  <br />
  <button type="submit" class="btn btn-primary mb-2" name="enviar">Enviar</button>
  <a href="ex6.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>
</form>
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