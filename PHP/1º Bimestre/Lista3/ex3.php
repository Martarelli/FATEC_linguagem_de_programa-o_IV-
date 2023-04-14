<!-- Crie um documento HTML que permita incluir compromissos. 
Os campos solicitados devem ser: usuário, compromisso, local, data e hora. Os compromissos devem ser gravados em um arquivo no formato JSON. Crie também uma página que liste os compromissos de um determinado usuário e permita excluir compromissos. -->

<!-- Crie um documento HTML que permita ao usuário digitar cinco nomes de times de futebol. Faça um script PHP com uma função que receba os nomes dos times submetidos a partir do documento HTML anterior e salve-os em um arquivo “times.txt”. O script deverá ser capaz de imprimir os nomes salvos no arquivo. -->
<?php
$flag_msg = null;
$msg = "";

if (isset($_POST['enviar'])) {
  
  $usuario = $_POST["usuario"];
  $compromisso = $_POST["compromisso"];
  $local = $_POST["local"];
  $data = $_POST["data"];
  $hora = $_POST["hora"];

  if (!empty($usuario) && !empty($compromisso) && !empty($local) && !empty($data) && !empty($hora)){
    
    $flag_msg = true;
    $data_received = array(
        "usuario" => $usuario,
        "compromisso" => $compromisso,
        "local" => $local,
        "data" => $data,
        "hora" => $hora
    );

    $data_received = array($data_received);
    $data_json = array();

    if (file_exists("./compromissos.json")) {
      $content = file_get_contents("./compromissos.json");
      if ($content) {
          $arrayContent = json_decode($content, true);
          foreach ($arrayContent as $valor) {
              array_push($data_json, $valor);
          }
      }
    }

    $data_merge = array_merge($data_received, $data_json);
    $json = json_encode($data_merge);
    $file = fopen('compromissos.json','w');
    fwrite($file, $json);
    fclose($file);

    $msg .= "Compromisso adicionado com sucesso...";

  } else {  
    $flag_msg = false; 
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
    <title>AGENDA</title>
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Salva compromissos</h1>
  <hr class="my-3">
  <p class="lead">Esse exemplo permite ao usuário salvar e excluir compromissos.</p>
</div>

<div class="container">
  <form method="POST">
    <div class="form-group col-md-2">
      <label for="usuario">Usuário:</label>
      <input type="text" class="form-control" id="usuario" name="usuario" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="compromisso">Compromisso:</label>
      <input type="text" class="form-control" id="compromisso" name="compromisso" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="local">Local:</label>
      <input type="text" class="form-control" id="local" name="local" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="data">Data:</label>
      <input type="text" class="form-control" id="data" name="data" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="hora">Hora:</label>
      <input type="text" class="form-control" id="hora" name="hora" required>
    </div>
    <br />

    <button type="submit" class="btn btn-primary mb-2" name="enviar">Enviar</button>
    <a href="ex3.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>
  </form>
  <a href="ex3-listagem.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Visualizar Compromissos</button></a>

  <?php 
    if (!is_null($flag_msg)) {
      if ($flag_msg) {
        echo "<div class='alert alert-success' role='alert'>$msg</div>"; 
      }else{
        echo "<div class='alert alert-danger' role='alert'>$msg</div>"; 
      }
    }
?>
</div>
</body>
</html>