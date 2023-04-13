<!-- Crie um documento HTML que permita ao usuário digitar cinco nomes de times de futebol. Faça um script PHP com uma função que receba os nomes dos times submetidos a partir do documento HTML anterior e salve-os em um arquivo “times.txt”. O script deverá ser capaz de imprimir os nomes salvos no arquivo. -->
<?php
$flag_msg = null;
$msg = "";

if (isset($_GET['enviar'])) {
  
  $timeUm = $_GET["timeUm"];
  $timeDois = $_GET["timeDois"];
  $timeTres = $_GET["timeTres"];
  $timeQuatro = $_GET["timeQuatro"];
  $timeCinco = $_GET["timeCinco"];

  if (!empty($timeUm) && !empty($timeDois) && !empty($timeTres) && !empty($timeQuatro) && !empty($timeCinco)){
    $flag_msg = true; // Sucesso 
    $times = array($timeUm, $timeDois, $timeTres, $timeQuatro, $timeCinco);
    $arquivo = fopen('times.txt','w');
    foreach ($times as $t) {
      $frase = $t . "\n";
      fwrite($arquivo, $frase);
    }
    fclose($arquivo);

    $arquivo = fopen('times.txt','r'); 
    while (!feof($arquivo)) {
      $msg .= fgets($arquivo)."<br/>";
    }
    fclose($arquivo);

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
    <title>TIMES</title>
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Salva 5 times de futebol.</h1>
  <hr class="my-3">
  <p class="lead">Esse exemplo permite ao usuário digitar cinco nomes de times de futebol e salva em um arquivo .txt.</p>
</div>

<div class="container">
  <form method="GET">
    <div class="form-group col-md-2">
      <label for="timeUm">Time Um:</label>
      <input type="text" class="form-control" id="timeUm" name="timeUm" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="timeDois">Time Dois:</label>
      <input type="text" class="form-control" id="timeDois" name="timeDois" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="timeTres">Time Três:</label>
      <input type="text" class="form-control" id="timeTres" name="timeTres" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="timeQuatro">Time Quatro:</label>
      <input type="text" class="form-control" id="timeQuatro" name="timeQuatro" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="timeCinco">Time Cinco:</label>
      <input type="text" class="form-control" id="timeCinco" name="timeCinco" required>
    </div>
    <br />

    <button type="submit" class="btn btn-primary mb-2" name="enviar">Enviar</button>
    <a href="ex2.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>
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