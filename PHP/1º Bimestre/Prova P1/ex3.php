<!-- Crie um documento HTML que permita ao usuário digitar cinco nomes de times de futebol. Faça um script PHP com uma função que receba os nomes dos times submetidos a partir do documento HTML anterior e salve-os em um arquivo “times.txt”. O script deverá ser capaz de imprimir os nomes salvos no arquivo. -->
<?php
$flag_msg = null;
$msg = "";
date_default_timezone_set('America/Sao_Paulo');
$emprestimos = fopen("emprestimos.txt", "a+");

if($emprestimos){
    $flag_msg = true;
    $msg .= "=-=-=-=-=-=-=-=-= SISTEMAS DE BIBLIOTECAS FATEC =-=-=-=-=-=-=-=-= <br/><br/> ";
    while(!feof($emprestimos)){
        $msg .= fgets($emprestimos)."<br/>";
    }
}
fclose($emprestimos);

if (isset($_GET['enviar'])) {

    $nome = $_GET["nome"];
    $tipo = $_GET["tipo"];
    $livro = $_GET["livro"];

    if (!empty($nome) && !empty($tipo) && !empty($livro)){
        $arquivo = fopen("emprestimos.txt", "a");
        $text = "BIBLIOTECA FATEC/PP - ". date('d/m/Y H:i'). "<br/><br/>" . "Nome: " . $nome . "<br/>Tipo de Usuário: " . $tipo . "<br/>Livro retirado: " . $livro . "<br/><br/>Data devolução: ";
        if($tipo === "Professor") {
            $text .= date('d/m/Y', strtotime('+10 days')) . "<br/><br/>";
        } else {
            $text .= date('d/m/Y', strtotime('+5 days')) . "<br/><br/>";
        }
        fwrite($arquivo, $text);

        fclose($arquivo);
    }else{  
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
    <title>BIBLIOTECA FATEC</title>
</head>
<body>
<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Sistema de emprestimos biblioteca FATEC.</h1>
  <hr class="my-3">
  <p class="lead">Sistema para gravação dos emprestimos de livros da FATEC.</p>
</div>

<div class="container">
  <form method="GET">
    <div class="form-group col-md-2">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="tipo">Tipo usuário:</label>
      <select class="form-select" name="tipo">
        <option selected>Selecione o tipo de usuário:</option>
        <option value="Professor">Professor</option>
        <option value="Aluno">Aluno</option>
        <option value="Funcionario">Funcionário</option>
      </select>
    </div>
    <br />
    <div class="form-group col-md-2">
      <label for="livro">Nome do Livro:</label>
      <input type="text" class="form-control" id="livro" name="livro" required>
    </div>
    <br />
    <button type="submit" class="btn btn-primary mb-2" name="enviar">Enviar</button>
    <a href="ex3.php"><button type="button" class="btn btn-primary mb-2" name="limpar">Limpar</button></a>
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