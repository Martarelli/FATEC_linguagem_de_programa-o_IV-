<?php
require("header-inc.php");
?> 
<div class="container">
  <h2>Contatos</h2>
  <p>Listagem do contatos cadastrados.</p>
  <hr>
  <div class="float-right p-1">
    <a href="insert-contato.php"><button type="button" class="btn btn-primary">Novo</button></a>
  </div>
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr class="table-info" style="text-align:center">
        <th scope="col" style="width: 5%;">#</th>
        <th scope="col">Nome</th>
        <th scope="col" style="width: 30%;">E-Mail</th>
        <th scope="col" style="width: 15%;">Data Nascimento</th>
        <th scope="col" style="width: 20%;">Ação</th>
      </tr>
    </thead>
    <tbody>
      <tr> 
        <th scope="row" style="text-align:center"></th>
        <td></td> 
        <td></td> 
        <td style="text-align:center"></td>
        <td style="text-align:center">
          <a href="">
            <button type="button" class="btn btn-primary">Editar</button></a>
          <a href="">
            <button type="button" class="btn btn-danger">Excluir</button></a>
        </td> 
      </tr>    
    </tbody>
  </table>
</div>

<?php require("footer-inc.php"); ?>