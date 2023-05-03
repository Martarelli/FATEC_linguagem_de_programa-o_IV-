<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

//CONNECTION TO DATABASE
require_once('connection.php');
//CREATE QUERY SQL
$mysql_query = "DELETE FROM contatos WHERE id={id}";
//CLOSE CONNECTION TO DATABASE
mysqli_close($conn);
}

if ($conn->query($mysql_query) === TRUE) {
    $msg = "delete success";
    $msgerror = "";
} 
else {
    $msg = "delete error";
    $msgerror = $conn->error;
}

mysqli_close($conn);

header("Location: contatos.php?msg={$msg}&msgerror={$msgerror}");

?>