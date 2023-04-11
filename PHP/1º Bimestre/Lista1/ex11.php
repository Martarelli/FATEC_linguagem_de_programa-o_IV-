<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {
  
  $idade = $_GET["idade"];

  if (!empty($idade) && is_numeric($idade) && $idade != 0 ) {

    $flag_msg = true; // Sucesso 
    if ($idade >= 5 && $idade <= 7) {
      $msg = "**************** INFANTIL A ****************"; 
    } else if ($idade >= 8 && $idade <= 11) {
      $msg = "**************** INFANTIL B ****************"; 
    } else if ($idade >= 12 && $idade <= 13) {
      $msg = "**************** JUVENIL A ****************"; 
    } else if ($idade >= 14 && $idade <= 17) {
      $msg = "**************** JUVENIL B ****************"; 
    } else if ($idade >= 18 ) {
      $msg = "**************** ADULTOS ****************"; 
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
    <title>CATEGORIAS</title>
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">CATEGORIAS</h1>
  <hr class="my-3">
  <p class="lead">Esse exemplo verifica a categoria de um nadador.</p>
</div>

<div class="container">
  <form method="GET">
    <div class="form-group col-md-2">
      <label for="idade">Idade:</label>
      <input type="text" class="form-control" id="idade" name="idade" required>
    </div>
    <br />
    <button type="submit" class="btn btn-primary mb-2" name="enviar">Enviar</button>
    <a href="ex11.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>
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