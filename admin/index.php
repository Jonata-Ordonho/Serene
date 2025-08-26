<?php
require_once __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('America/Fortaleza');

if (!isset($_SESSION)) {
    session_start();
}

use App\UsuarioController;

$controllerUsuario = new UsuarioController;

if (isset($_POST['usu_email']) && isset($_POST['usu_senha'])) {
    $email = $_POST['usu_email'];
    $senha = $_POST['usu_senha'];

    $dadosLogin = $controllerUsuario->login($email, $email);

    if($dadosLogin){
        header("Location: view/dashboard.php");
    }else{
        header("Location: index.php?erro_login");
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>SERENE - GESOTR</title>
    <meta name="author" content="NDW - Núcleo de Desenvolvimento Web">
    <meta name="reply-to" content="web@unirios.edu.br">
    <meta name="robots" content="noindex,nofollow">
    <link rel="icon" href="imagens/favicon.png">
    <link href="css/css.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body id="pag-login">
    <div id="container-login">
        <header>
            <!-- <img src="imagens/logo.png" id="logo"> -->
        </header>

        <div id="login">
            <?php if (isset($_GET["erro_login"])) { ?>
                <span class="alerta">O usuário e/ou senha incorreto(s).</span>
            <?php } ?>
            <form name="form1" id="form1" method="POST" action="">
                <fieldset>
                    <legend>Login</legend>
                    <label for="usu_email">Email</label>
                    <input type="email" name="usu_email" id="usu_email">

                    <label for="usu_senha">Senha</label>
                    <input type="password" name="usu_senha" id="usu_senha">
                    <input type="submit" name="entrar" id="entrar" class="but" value="Entrar">
                </fieldset>
            </form>
        </div>
    </div>
</body>

</html>