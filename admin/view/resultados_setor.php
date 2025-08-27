<?php
require_once __DIR__ . '/../../vendor/autoload.php';

date_default_timezone_set('America/Fortaleza');

if (!isset($_SESSION)) {
    session_start();
}
$id = -1;
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
}

use App\ResultadoController;

$controllerResultado = new ResultadoController;

$setor = $controllerResultado->getSetor($id);

$colaboradores_setor = $controllerResultado->colaboradoresPorSetor($id);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>SERENE - GESTOR</title>
    <meta name="robots" content="noindex,nofollow">
    <link rel="icon" href="imagens/favicon.png">
    <link href="../css/css.css" rel="stylesheet" type="text/css" media="screen">

    <script type="text/javascript" src="../../plugins/chart/Chart.js"></script>
    <script type="text/javascript" src="../../plugins/chart/Chart.PieceLabel.min.js"></script>
</head>

<body id="pag-login">
    <div id="container-login">
        <?php include '../includes/topo.html'; ?>
        <?php include '../includes/menu.php'; ?>

        <h2><?php echo $setor['setor_nome']; ?></h2>

        <div id="colaboradores">
            <?php foreach($colaboradores_setor AS $colaborador){ ?>
                <p><a href="resultados_colaborador.php?id_colaborador=<?php echo $colaborador['colaborador_id']; ?>"><?php echo $colaborador['colaborador_nome']; ?></a></p>
            <?php } ?>
        </div>

        <div id="graficos_setor">
            <?php for ($i=1; $i<=5; $i++) { ?>
                <span>Pergunta <?php echo $i; ?></span>
                <canvas style="max-width: 25%; max-height: 300px;" id="grafico_atendentes_<?php echo $i; ?>"></canvas>
            <?php } ?>
        </div>
    </div>

<script>
    <?php for ($j=1; $j<=5; $j++){ 
        $dados = $controllerResultado->totalRespostaPorQuestao($_GET['id'], $j); ?>
        var ctx = document.getElementById("grafico_atendentes_<?php echo $j; ?>").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [<?php for($i=1;$i<=5;$i++) {
                    echo '"Nota '.$i.'",';
                }?>],
                datasets: [{
                    label: '#',
                    data: [<?php for($i=1;$i<=5;$i++) {
                        echo $dados['total_resposta_'.$i].',';
                    }?>],
                    backgroundColor: [
                        '#c9031c','#691ea7','#223e6b','#3498DB','#1aa62a','#107651',
                    ],
                    borderColor: [
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: ''
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                pieceLabel: {
                    render: 'data',
                    fontColor: '#FFF',
                    fontSize: 14,
                    position: 'inside',
                    segment: true,
                    precision: 1
                }
            }
        });
    <?php } ?>
</script>

</body>

</html>