<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

//CONNECTION TO DATABASE
require_once('connection.php');
//CREATE QUERY SQL
$mysql_query = "DELETE FROM contatos WHERE id={$id}";

if ($conn->query($mysql_query) === TRUE) {
    $msg = "delete success";
    $msgerror = "";
} 
else {
    $msg = "delete error";
    $msgerror = $conn->error;
}

//CLOSE CONNECTION TO DATABASE
mysqli_close($conn);

header("Location: contatos.php?msg={$msg}&msgerror={$msgerror}");

} else {
    $msg = "delete error";
    $msgerror = "ID nao informado";
}
?>