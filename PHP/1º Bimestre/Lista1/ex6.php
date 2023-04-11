<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {

  $kmIni = $_GET["inicio"];
  $kmFim = $_GET["final"];
  $preco = $_GET["preco"];
  $litros = $_GET["litros"];
  if(!empty($kmIni) && !empty($kmFim) && !empty($preco) && !empty($litros)){
    $flag_msg = true; // Sucesso 
    $km = $kmFim - $kmIni;
    $valorGasto = $litros * $preco;
  
    $mediaConsumo = $km / $litros;
    $msg = "**************** RESULTADOS ****************<br />Kilometros Rodados(Km): ";
    $msg .= number_format($km, 2);
    $msg .= "<br />Media de consumo(Km/L): ";
    $msg .= number_format($mediaConsumo, 2);
    $msg .= "<br />Total gasto: R$";
    $msg .= number_format($valorGasto, 2);

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
  <title>MÉDIA CONSUMO</title>
</head>

<body>
  <div class="p-4 mb-4 bg-light">
    <h1 class="display-5">Cálculo Consumo</h1>
    <hr class="my-3">
    <p class="lead">Esse exemplo calcula a distancia percorrida, valor gasto e media de consumo do carro.</p>
  </div>

  <div class="container">
    <form method="GET">
      <div class="form-group col-md-2">
        <label for="inicio">Kilometragem Inicial:</label>
        <input type="text" class="form-control" id="inicio" name="inicio" required>
      </div>
      <br />
      <div class="form-group col-md-2">
        <label for="final">Kilometragem Final:</label>
        <input type="text" class="form-control" id="final" name="final" required>
      </div>
      <br />
      <div class="form-group col-md-2">
        <label for="litros">Litros consumidos:</label>
        <input type="text" class="form-control" id="litros" name="litros" required>
      </div>
      <br />
      <div class="form-group col-md-2">
        <label for="preco">Preço por litro:</label>
        <input type="text" class="form-control" id="preco" name="preco" required>
      </div>
      <br />
      <button type="submit" class="btn btn-primary mb-2" name="enviar">Enviar</button>
      <a href="ex6.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>
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