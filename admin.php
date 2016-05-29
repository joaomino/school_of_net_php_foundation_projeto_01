<?php
session_start();

//if(!isset($_SESSION['logado']) or $_SESSION['logado'] == 0) {
if($_SESSION['logado'] == 0 or !isset($_SESSION['logado'])) {
    echo "Você não pode acessar esta página.";
    die;
}

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
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Área de Administração</h3>
                    </div>
                    <div class="panel-body">
                        <h5>Escolha uma página para editar</h5>
                        <div>
                            <?php

                            $pages = get_all_pages();

                            foreach($pages as $page){
                                echo '<h5><b>' . $page['page_name'] . ' </b><small><a href="editor.php?edit=' . $page['page_name'] . '">Editar</a></small></h5>';
                                echo '<hr />';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>