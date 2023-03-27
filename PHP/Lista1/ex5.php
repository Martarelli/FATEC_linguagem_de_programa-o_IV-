<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {
  
  $nome = $_GET["nome"];
  $p1 = $_GET["p1"];
  $p2 = $_GET["p2"];
  $p3 = $_GET["p3"];
  $p4 = $_GET["p4"];

  if (!empty($nome) && !empty($p1) && !empty($p2) && !empty($p3)&& !empty($p4) && 
      is_string($nome) && is_numeric($p1) && is_numeric($p2) && is_numeric($p3) && is_numeric($p4) &&
      $nome != "" && $p1 >= 0  && $p2 >= 0 && $p3 >= 0 && $p4 >= 0) {
  
    $media = ($p1+$p2+$p3+$p4)/4;

    if ($media >= 7) {
      $flag_msg = true; // Sucesso 
      $msg = "**************** APROVADO ****************<br />Aluno = "; 
      $msg .= $nome; 
      $msg .= "<br />MEDIA = ";
      $msg .= number_format($media,2);
    } else {
      $flag_msg = true;
      $msg = "**************** REPROVADO ****************<br />Aluno = "; 
      $msg .= $nome;    
      $msg .= "<br />MEDIA = ";
      $msg .= number_format($media,2);
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
    <title>MÉDIA</title>
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Cálculo Média</h1>
  <hr class="my-3">
  <p class="lead">Esse exemplo calcula a média de uma pessoa.</p>
</div>

<div class="container">
  <form method="GET">
    <div class="form-group col-md-2">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="p1">P1:</label>
      <input type="text" class="form-control" id="p1" name="p1" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="p2">P2:</label>
      <input type="text" class="form-control" id="p2" name="p2" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="p3">P3:</label>
      <input type="text" class="form-control" id="p3" name="p3" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="p4">P4:</label>
      <input type="text" class="form-control" id="p4" name="p4" required>
    </div>
    <br />
    <button type="submit" class="btn btn-primary mb-2" name="enviar">Enviar</button>
    <a href="ex12.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>
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