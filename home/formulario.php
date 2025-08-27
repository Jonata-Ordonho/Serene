<?php
require_once __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('America/Fortaleza');

if (!isset($_SESSION)) {
    session_start();
}

use App\FormularioController;

$controllerFormulario = new FormularioController;

if (isset($_POST['pergunta1']) && isset($_POST['pergunta2']) && isset($_POST['pergunta3']) && isset($_POST['pergunta4']) && isset($_POST['pergunta5'])) {
    if (isset($_POST['observacao']) && $_POST['observacao'] != '') {
        $obs = $_POST['observacao'];
    } else {
        $obs = null;
    }
    $dados = $controllerFormulario->insertRespostas($_POST['pergunta1'], $_POST['pergunta2'], $_POST['pergunta3'], $_POST['pergunta4'], $_POST['pergunta5'], $obs);

    header("Location: index.php?sucesso=true");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>SERENE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="pt_BR">
    <!-- <link rel="icon" href="images/favicon.png"> -->

    <link href="css/css.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body id="internas">
    <div class="container">
        <p>Olá <b><?php echo $_SESSION['nome']; ?>!</b></p>

        <form name="form" id="form" method="POST" action="">
            <p><label for="pergunta1">Pergunta 1</label></p>
            <input type="radio" id="p1-1" name="pergunta1" value="1" required>
            <label for="p1-1">1</label>

            <input type="radio" id="p1-2" name="pergunta1" value="2">
            <label for="p1-2">2</label>

            <input type="radio" id="p1-3" name="pergunta1" value="3">
            <label for="p1-3">3</label>

            <input type="radio" id="p1-4" name="pergunta1" value="4">
            <label for="p1-4">4</label>

            <input type="radio" id="p1-5" name="pergunta1" value="5">
            <label for="p1-5">5</label>

            <p><label for="pergunta2">Pergunta 2</label></p>
            <input type="radio" id="p1-1" name="pergunta2" value="1" required>
            <label for="p1-1">1</label>

            <input type="radio" id="p1-2" name="pergunta2" value="2">
            <label for="p1-2">2</label>

            <input type="radio" id="p1-3" name="pergunta2" value="3">
            <label for="p1-3">3</label>

            <input type="radio" id="p1-4" name="pergunta2" value="4">
            <label for="p1-4">4</label>

            <input type="radio" id="p1-5" name="pergunta2" value="5">
            <label for="p1-5">5</label>

            <p><label for="pergunta3">Pergunta 3</label></p>
            <input type="radio" id="p1-1" name="pergunta3" value="1" required>
            <label for="p1-1">1</label>

            <input type="radio" id="p1-2" name="pergunta3" value="2">
            <label for="p1-2">2</label>

            <input type="radio" id="p1-3" name="pergunta3" value="3">
            <label for="p1-3">3</label>

            <input type="radio" id="p1-4" name="pergunta3" value="4">
            <label for="p1-4">4</label>

            <input type="radio" id="p1-5" name="pergunta3" value="5">
            <label for="p1-5">5</label>

            <p><label for="pergunta4">Pergunta 4</label></p>
            <input type="radio" id="p1-1" name="pergunta4" value="1" required>
            <label for="p1-1">1</label>

            <input type="radio" id="p1-2" name="pergunta4" value="2">
            <label for="p1-2">2</label>

            <input type="radio" id="p1-3" name="pergunta4" value="3">
            <label for="p1-3">3</label>

            <input type="radio" id="p1-4" name="pergunta4" value="4">
            <label for="p1-4">4</label>

            <input type="radio" id="p1-5" name="pergunta4" value="5">
            <label for="p1-5">5</label>

            <p><label for="pergunta5">Pergunta 5</label></p>
            <input type="radio" id="p1-1" name="pergunta5" value="1" required>
            <label for="p1-1">1</label>

            <input type="radio" id="p1-2" name="pergunta5" value="2">
            <label for="p1-2">2</label>

            <input type="radio" id="p1-3" name="pergunta5" value="3">
            <label for="p1-3">3</label>

            <input type="radio" id="p1-4" name="pergunta5" value="4">
            <label for="p1-4">4</label>

            <input type="radio" id="p1-5" name="pergunta5" value="5">
            <label for="p1-5">5</label>

            <div>
                <label for="observacao">Observacão</label><br>
                <textarea name="observacao" id="observacao" cols="30" rows="10"></textarea>
            </div>

            <input type="submit" name="entrar" id="entrar" class="but" value="Entrar">
        </form>
    </div>
</body>

</html>