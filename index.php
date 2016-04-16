
<?php
/*
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

*/
/*
require_once("conexao.php");
$rota = $_SERVER['REQUEST_URI'];
$path = explode('/', $rota, 2);
$page = conexaoDB($path[1]);
?>

<?php require_once("head.php"); ?>

<div class="wrapper">
    <?php require_once("menu.php"); ?>

    <?php echo $page['page_content']; ?>

</div>

<?php require_once("footer.php"); ?>
*/
require_once("conexao.php");
$rota = $_SERVER['REQUEST_URI'];
$path = explode('/', $rota, 2);
$pages = get_page($path[1]);
$get_head = get_head();
$get_menu = get_menu();
$get_footer = get_footer();
?>

<?php echo $get_head['page_content']; ?>

<div class="wrapper">
    <?php echo $get_menu['page_content']; ?>

    <?php echo $pages['page_content']; ?>

</div>

<?php echo $get_footer['page_content']; ?>