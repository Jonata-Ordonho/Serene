<?php

use App\ResultadoController;
$controllerUsuario = new ResultadoController;
$setores = $controllerUsuario->setores();

?>
<nav id="menu">
    <ul>
        <li><span class="titulo"></span>
            <ul>
            <?php foreach ($setores as $setor) { ?>
                <li><a href="resultados_setor.php?id=<?php echo $setor['setor_id']; ?>" title="<?php echo $setor['setor_nome']; ?>" class=""><?php echo $setor['setor_nome']; ?></a></li>
            <?php }  ?>
            </ul>
        </li>
    </ul>
</nav>