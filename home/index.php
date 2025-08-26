<?php
require_once __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('America/Fortaleza');

if (!isset($_SESSION)) {
    session_start();
}

use App\FormularioController;

$loginFormAction = $_SERVER['PHP_SELF'];

$_SESSION['setor_id'] = '1';
$_SESSION['nome'] = 'Jorge Paulo';
$_SESSION['funcao'] = 'Estagiario';

$controllerFormulario = new FormularioController;

if (isset($_POST['usu_email']) && isset($_POST['usu_cpf'])) {
    $email = $_POST['usu_email'];
    $cpf = $_POST['usu_cpf'];

    $validar_cpf = $controllerFormulario->validarCPF($cpf);

    if ($validar_cpf) {
        $verificar_colaborador = $controllerFormulario->autenticarFormulario($email, $cpf);

        $_SESSION['cpf'] = $cpf;

        if ($verificar_colaborador) {
            header("Location: formulario.php");
        } else {
            header("Location: index.php?erro_formulario=true");
        }
    } else {
        header("Location: index.php?erro_cpf=true");
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Clínica Escola Gilberto Gomes de Oliveira</title>
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
            <?php if (isset($_GET["sucesso"]) && $_GET["sucesso"] == true) { ?>
                <span>Obrigado pela sua resposta!</span>
            <?php } else { ?>
                <span class="alerta">CPF inválido!</span>
                <?php if (isset($_GET["erro_formulario"])) { ?>
                    <span class="alerta">Você já respondeu o furmulário hoje</span>
                <?php } ?>

                <form name="form1" id="form1" method="POST" action="">
                    <fieldset>
                        <legend>Login</legend>
                        <label for="usu_email">Email</label>
                        <input type="email" name="usu_email" id="usu_email">

                        <label for="usu_senha">CPF</label>
                        <input type="number" name="usu_cpf" id="usu_cpf">
                        <input type="submit" name="entrar" id="entrar" class="but" value="Entrar">
                    </fieldset>
                </form>
            <?php } ?>
        </div>
    </div>
</body>

</html>