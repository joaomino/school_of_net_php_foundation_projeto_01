<?php
session_start();

if($_SESSION['logado'] == 0 or !isset($_SESSION['logado'])) {
    echo "Você não pode acessar esta página.";
    die;
}

require_once("conexao.php");
$get_head = get_head();
$get_menu = get_menu();
$get_footer = get_footer();
$edit = $_GET['edit'];
$pages = get_page($edit);
?>


<?php echo $get_head['page_content']; ?>

    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <form class="form" method="post" action="editado.php">
                    <div class="col-xs-12 col-md-12">
                        <script src="//cdn.ckeditor.com/4.5.8/full/ckeditor.js"></script>
                        <textarea name="editor1">
                            <?php echo $pages['page_content']; ?>
                        </textarea>
                        <script>
                            CKEDITOR.replace( 'editor1' );
                        </script>
                    </div>
                    <div class="col-xs-6 col-md-6">
                        <input class="btn cancelar" type="button" value="Cancelar" onClick="history.go(-1);return true;">
                    </div>
                    <div class="col-xs-6 col-md-6 text-right">
                        <button class="btn salvar" type="submit">Salvar</button>
                        <input type="hidden" name="edit" value="<?php echo $edit; ?>"
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php echo $get_footer['page_content']; ?>
