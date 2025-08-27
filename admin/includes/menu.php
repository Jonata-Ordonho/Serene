<?php

use App\ResultadoController;

$controllerResultado = new ResultadoController;
$setores_menu = $controllerResultado->setores();


?>
<nav id="menu">
    <ul>
        <li><span class="titulo"></span>
            <ul>
                <li><a href="dashboard.php" title="Dashboard" class="">Dashboard</a></li>
                <?php foreach ($setores_menu as $set) { ?>
                    <li><a href="resultados_setor.php?id=<?php echo $set['setor_id']; ?>" title="<?php echo $set['setor_nome']; ?>" class=""><?php echo $set['setor_nome']; ?></a></li>
                <?php }  ?>
            </ul>
        </li>
    </ul>
</nav>