<?php
$flag_msg = true;
$msg = "";
$jogos = array();

for ($i=0; $i < 10; $i++) { 
  $jogo = array();
  for ($j=0; $j < 6 ; $j++) { 
    $n = random_int(1,60);
    array_push($jogo, $n);
  }
  sort($jogo);
  array_push($jogos, $jogo);
}

$sorteio = array();
for ($i=0; $i < 6 ; $i++) { 
  $n = random_int(1,60);
  array_push($sorteio, $n);
}
sort($sorteio);
$msg .= "SORTEIO = ";

foreach ($sorteio as $key => $value) {
  $msg .= $value . " " ;
}
$msg .= "<br/><br/> ";

foreach ($jogos as $index => $jogo) {
  $acertos = 0;
  foreach ($jogo as $key => $value) {
    foreach ($sorteio as $num) { 
      if($value === $num){
        $acertos++;
      }
    }
  }
  

  $msg .= "JOGO = " . $index+1 . " = ";
  foreach ($jogo as $key => $value) {
    $msg .= $value. " ";
  }
  $msg .= "<br/> ACERTOS = " . $acertos . "<br/><br/>";
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
    <title>MEGA SENA</title>
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Jogos Mega Sena</h1>
  <hr class="my-3">
  <p class="lead">Esse exercicio sorteia 6 dezenas e exiba a quantidade de acertos de cada jogo.</p>
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