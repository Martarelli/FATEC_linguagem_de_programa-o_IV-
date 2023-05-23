<?php
require("header-inc.php");

if(empty($_POST['username']) || empty($_POST('password')))
{
    $login_err = "Usuário ou senha inválido";
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password FROM users WHERE username = '{$username}'";

    $result = $conn->query($mysql_query);

    if(!$result){
        $login_err = "Usuário ou senha inválido"; 
    } else {
        $data = mysqli_fetch_array($result);
        if(password_verify($password, $data['password'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
        } else {
            $login_err = "Usuário ou senha incorretos"; 
        }
    }
}
?>

<div class="container-sm">
    <h2>Login</h2>
    <p>Por favor, entre com os seus dados de login.</p>
    <hr>
    <div class="wrapper">
        <form action="" method="post">
            <div class="form-group">
                <label>Usuário:</label>
                <input type="text" name="username" class="form-control">
                <span class="invalid-feedback"></span>
            </div>    
            <div class="form-group">
                <label>Senha:</label>
                <input type="password" name="password" class="form-control">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Não possui uma conta? <a href="register.php">Registre-se agora</a>.</p>
        </form>
    </div>
</div>

<?php require("footer-inc.php"); ?>