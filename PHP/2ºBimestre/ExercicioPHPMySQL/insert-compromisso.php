<?php
require("header-inc.php");

if(isset($_POST['enviar'])){
	$descricao = $_POST['descricao'];
	$data_inicio = $_POST['data_inicio'];
	$duracao = $_POST['duracao'];
	$id_contato = $_POST['id_contato'];

	require_once('connection.php');

	$mysql_query = "INSERT INTO contatos (descricao, data_inicio, duracao, idcontato) VALUES ('{$descricao}','{$data_inicio}','{$duracao}','{$id_contato}')";

	$result = $conn->query($mysql_query);

	if ($result === TRUE) {
		$msg = "Os dados foram inseridos com sucesso!...";
		$msgerror = "";
	} 
	else {
		$msg = "Aconteceu um erro na inclusão dos dados...";
		$msgerror = $conn->error;
	}

	mysqli_close($conn);

	header("Location: contatos.php?msg={$msg}&msgerror={$msgerror}");

	
}
?>

<div class="container">
	<h2>Contatos</h2>
  	<p>Cadastro de contatos.</p>
  	<hr>  	
	<div class="wrapper">
		<form method="post">
			<label for="descricao">&nbsp;Descrição</label>
			<input type="text" name="descricao" id="descricao" class="form-control" required><br>
			<label for="data_inicio">&nbsp;Data de Inicio</label>
			<input type="date" name="data_inicio" id="data_inicio" class="form-control"required><br>
			<label for="duracao">&nbsp;Duração</label>
			<input type="number" name="duracao" id="duracao" class="form-control" style="width: 200px;"><br>
			<label for="id_contato">&nbsp;Id Contato</label>
			<input type="number" name="id_contato" id="id_contato" class="form-control" style="width: 200px;"><br>
			<input type="submit" name="enviar" value="Inserir" class="btn btn-primary w100">
		</form>
	</div>
</div>

<?php require("footer-inc.php"); ?>