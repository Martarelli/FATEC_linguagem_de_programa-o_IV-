<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {

  $validos = $_GET["validos"];
  $brancos = $_GET["brancos"];
  $nulos = $_GET["nulos"];


  if(!empty($validos) && !empty($brancos) && !empty($nulos)){
    $flag_msg = true; // Sucesso 
    $votosTotais = $validos + $nulos + $brancos;

    $msg = "**************** RESULTADOS ****************<br />Votos válidos(%): ";
    $msg .= number_format($validos/$votosTotais*100, 2);
    $msg .= "<br />Votos brancos(%): ";
    $msg .= number_format($brancos/$votosTotais*100, 2);
    $msg .= "<br />Votos nulos(%): ";
    $msg .= number_format($nulos/$votosTotais*100, 2);

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
  <title>VOTOS</title>
</head>

<body>
  <div class="p-4 mb-4 bg-light">
    <h1 class="display-5">Cálculo Votação</h1>
    <hr class="my-3">
    <p class="lead">Esse exemplo calcula a percentagem de votos validos, brancos e nulos.</p>
  </div>

  <div class="container">
    <form method="GET">
      <div class="form-group col-md-2">
        <label for="validos">Votos Validos:</label>
        <input type="number" class="form-control" id="validos" name="validos" required>
      </div>
      <br />
      <div class="form-group col-md-2">
        <label for="brancos">Votos brancos:</label>
        <input type="number" class="form-control" id="brancos" name="brancos" required>
      </div>
      <br />
      <div class="form-group col-md-2">
        <label for="nulos">Votos nulos:</label>
        <input type="number" class="form-control" id="nulos" name="nulos" required>
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