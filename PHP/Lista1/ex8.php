<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {

  $totalPrestacao = $_GET["totalPrestacao"];
  $prestacaoPagas = $_GET["prestacaoPagas"];
  $valor = $_GET["valor"];


  if(!empty($totalPrestacao) && !empty($prestacaoPagas) && !empty($valor)){
    $flag_msg = true; // Sucesso 
    $qtdPrestacoes = $totalPrestacao - $prestacaoPagas;
    $saldoDevedor = $qtdPrestacoes * $valor;

    $msg = "Quantidade de prestações a pagar: ";
    $msg .= number_format($qtdPrestacoes,0);
    $msg .= "<br />Saldo devedor: R$";
    $msg .= number_format($saldoDevedor, 2);

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
  <title>PRESTAÇÕES</title>
</head>

<body>
  <div class="p-4 mb-4 bg-light">
    <h1 class="display-5">Cálculo Prestações</h1>
    <hr class="my-3">
    <p class="lead">Esse exemplo calcula o saldo devedor atual e a quantidade de prestações a pagar.</p>
  </div>

  <div class="container">
    <form method="GET">
      <div class="form-group col-md-2">
        <label for="totalPrestacao">Total de Prestações:</label>
        <input type="number" class="form-control" id="totalPrestacao" name="totalPrestacao" required>
      </div>
      <br />
      <div class="form-group col-md-2">
        <label for="prestacaoPagas">Prestacao Pagas:</label>
        <input type="number" class="form-control" id="prestacaoPagas" name="prestacaoPagas" required>
      </div>
      <br />
      <div class="form-group col-md-2">
        <label for="valor">Valor Prestação:</label>
        <input type="number" class="form-control" id="valor" name="valor" required>
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