<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {

  $la = $_GET["a"];
  $lb = $_GET["b"];
  $lc = $_GET["c"];

  $lab = $la+$lb;
  $lac = $la+$lc;
  $lbc = $lb+$lc;

  if(!empty($la) && !empty($lb) && !empty($lc)){
    $flag_msg = true; // Sucesso 
    if(($la < $lbc) && ($lb < $lac) && ($lc < $lab)){
      if($la === $lb && $la === $lc){
        $msg = "TRIANGULO ISÓSCELES";
      } else if ($la === $lb || $la === $lc || $lb === $lc){
        $msg = "TRIANGULO EQUILÁTERO";
      } else {
        $msg = "TRIANGULO ESCALENO";
      }
    } else {
      $msg = "NÃO É UM TRIÂNGULO!!!!!";
    }
  } else {
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>
  <title>TRIANGULOS</title>
</head>

<body>
  <div class="p-4 mb-4 bg-light">
    <h1 class="display-5">Cálculo Triângulo</h1>
    <hr class="my-3">
    <p class="lead">Esse exemplo verifica se é um triangulo e qual o tipo dele.</p>
  </div>

  <div class="container">
    <form method="GET">
      <div class="form-group col-md-2">
        <label for="a">Lado A:</label>
        <input type="number" class="form-control" id="a" name="a" required>
      </div>
      <br />
      <div class="form-group col-md-2">
        <label for="b">Lado B:</label>
        <input type="number" class="form-control" id="b" name="b" required>
      </div>
      <br />
      <div class="form-group col-md-2">
        <label for="c">Lado C:</label>
        <input type="number" class="form-control" id="c" name="c" required>
      </div>
      <br />
      <button type="submit" class="btn btn-primary mb-2" name="enviar">Enviar</button>
      <button type="reset" class="btn btn-primary mb-2" name="limpar">Limpar</button>
    </form>
    <?php
    if (!is_null($flag_msg)) {
      if ($flag_msg) {
        echo "<div class='alert alert-success' role='alert'>$msg</div>";
      } else {
        echo "<div class='alert alert-warning' role='alert'>$msg</div>";
      }
    }
    ?>
  </div>
</body>

</html>