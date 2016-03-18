<?php
require_once("funcoes.php");
$rota = $_SERVER['REQUEST_URI'];
$path = explode('/', $rota, 2);
$page = verifica_rotas($path[1]);
?>

<?php require_once("head.php"); ?>

<div class="wrapper">
    <?php require_once("menu.php"); ?>

    <?php require_once($page); ?>
</div>

<?php require_once("footer.php"); ?>


