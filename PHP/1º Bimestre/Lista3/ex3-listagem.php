<!-- Crie um documento HTML que permita incluir compromissos. 
Os campos solicitados devem ser: usuário, compromisso, local, data e hora. Os compromissos devem ser gravados em um arquivo no formato JSON. Crie também uma página que liste os compromissos de um determinado usuário e permita excluir compromissos. -->
<?php
$msg = "";
  if (file_exists("./compromissos.json")) {
    $content = file_get_contents("./compromissos.json");
    if ($content) {
      $arrayContent = json_decode($content, true);
      $msg .= "<br/> -=-=-=-=-= Lista de Compromissos =-=-=-=-= <br/>";
      $msg .= "<br/> -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= <br/>";
      foreach ($arrayContent as $valor) {  
        $msg .= "<br/>";
        foreach ($valor as $key => $value) {
          $msg .= strtoupper($key)  . ' : ' . $value . '<br>';
        }
        $msg .= "<br/> -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= <br/>";
      }
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
    <title>AGENDA</title>
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Exibe os compromissos</h1>
  <hr class="my-3">
  <p class="lead">Esse exemplo permite ao usuário visualizar e excluir compromissos.</p>
</div>

<div class="container d-flex flex-column align-items-center">
  <a href="ex3.php"><button type="button" class="btn btn-primary mb-2">Voltar</button></a>
  <?php 
    echo "<div class='alert alert-primary text-center w-50' role='alert'>$msg</div>"; 
?>
</div>
</body>
</html>