<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {
  
  $peso = $_GET["peso"];
  $altura = $_GET["altura"];

  if (!empty($peso) && !empty($altura) && 
      is_numeric($peso) && is_numeric($altura) &&
      $peso >=0 && $altura >= 0) {
  
    $imc = $peso / pow($altura/100,2);

    $flag_msg = true; // Sucesso 
    $msg = "Cálculo efetuado com sucesso:<br />Peso = "; 
    $msg .= number_format($peso,2);
    $msg .= "<br />Altura = "; 
    $msg .= number_format($altura,2);
    $msg .= "<br />IMC: ";
    $msg .= number_format($imc,2);
    if ($imc < 18.5) {
      $msg .= "<br />MAGREZA";
    } else if ($imc >= 18.5 && $imc <= 24.9){
      $msg .= "<br />NORMAL";
    } else if ($imc >= 25 && $imc <= 29.9){
      $msg .= "<br />SOBREPESO";
    } else if ($imc >= 30 && $imc <= 29.9){
      $msg .= "<br />OBESIDADE";
    } else {
      $msg .= "<br />OBESIDADE GRAVE";
    }
  }else{  
    $flag_msg = false; //Erro 
    $msg = "Dados incorretos, preencha o formulário corretamente!";
  }
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
    <title>IMC</title>
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Cálculo IMC</h1>
  <hr class="my-3">
  <p class="lead">Esse exemplo calcula o IMC de uma pessoa.</p>
</div>

<div class="container">
  <form method="GET">
    <div class="form-group col-md-2">
      <label for="peso">Peso(kg):</label>
      <input type="text" class="form-control" id="peso" name="peso" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="altura">Altura(cm):</label>
      <input type="text" class="form-control" id="altura" name="altura" required>
    </div>
    <br />
    <button type="submit" class="btn btn-primary mb-2" name="enviar">Enviar</button>
    <a href="ex13.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>
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