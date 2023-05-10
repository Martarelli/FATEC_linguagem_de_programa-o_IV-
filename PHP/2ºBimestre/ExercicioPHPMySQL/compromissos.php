<?php
require("header-inc.php");
//CONNECTION TO DATABASE
require_once('connection.php');
//CREATE QUERY SQL
$mysql_query = "SELECT * FROM compromissos ORDER BY id";
//EXECUTE QUERY
$result = $conn->query($mysql_query);
//CLOSE CONNECTION TO DATABASE
mysqli_close($conn);

?> 
<div class="container">
  <h2>Compromissos</h2>
  <p>Listagem do compromissos cadastrados.</p>
  <hr>
  <div class="float-right p-1">
    <a href="insert-compromisso.php"><button type="button" class="btn btn-primary">Novo</button></a>
  </div>
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr class="table-info" style="text-align:center;">
        <th scope="col" style="width: 5%;">#</th>
        <th scope="col">Descrição</th>
        <th scope="col" style="width: 15%;">Data de Inicio</th>
        <th scope="col" style="width: 10%;">Duração</th>
        <th scope="col" style="width: 10%;">Id Contato</th>
        <th scope="col" style="width: 20%;">Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($data = mysqli_fetch_array($result)) {
      ?>
      <tr> 
        <th scope="row" style="text-align:center"><?= $data['id'] ?></th>
        <td style="text-align:center"><?= $data['descricao'] ?></td> 
        <td style="text-align:center"><?php echo date('d/m/Y', strtotime($data['data_inicio'])); ?></td> 
        <td style="text-align:center"><?= $data['duracao']; ?></td>
        <td style="text-align:center"><?= $data['idcontato']; ?></td>
        <td style="text-align:center">
          <a href="update-contato.php?id=<?= $data['id'] ?>">
            <button type="button" class="btn btn-primary">Editar</button></a>
          <a href="delete-contato.php?id=<?= $data['id'] ?>">
            <button type="button" class="btn btn-danger">Excluir</button></a>
        </td> 
      </tr> 
    <?php } ?>   
    </tbody>
  </table>
</div>

<?php require("footer-inc.php"); ?>