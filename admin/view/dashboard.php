<?php
require_once __DIR__ . '/../../vendor/autoload.php';

date_default_timezone_set('America/Fortaleza');

if (!isset($_SESSION)) {
    session_start();
}

use App\ResultadoController;

$controllerUsuario = new ResultadoController;

$setores = $controllerUsuario->setores();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>SERENE - GESTOR</title>
    <meta name="author" content="NDW - Núcleo de Desenvolvimento Web">
    <meta name="reply-to" content="web@unirios.edu.br">
    <meta name="robots" content="noindex,nofollow">
    <link rel="icon" href="imagens/favicon.png">
    <link href="css/css.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body id="pag-login">
    <div id="container-login">
        <?php include '../includes/menu.php'; ?>

        <?php foreach ($setores as $setor) { 
            $media_setor = $controllerUsuario->getMediaRespostasMes($setor['setor_id']); ?>
            <div>
                <p>Media de satisfação do setor <b><?php echo $setor['setor_nome']; ?></b></p>
                <span><?php if($media_setor == null) echo 'Nenhum dado encontrado!'; else echo number_format($media_setor, 2); ?></span>
            </div>
        <?php } ?>
    </div>
</body>

</html>