<?php require_once("conexao.php");
$get_head = get_head();
$get_menu = get_menu();
$get_footer = get_footer();
$searchresult = search();
?>

<?php echo $get_head['page_content'];?>

<div class="wrapper">
    <?php echo $get_menu['page_content']; ?>

    <div class="container">
    <?php
    if($searchresult == ""){
        echo 'Termo não encontrado';
    }else{
        echo '<h3>Termo encontrado nas seguintes páginas:</h3>';
        foreach($searchresult as $result) {
            echo '<a href="/' . $result['page_name'] . '"> ' . $result['page_name'] . '</a><br />';
        }

    }
    ?>
    </div>
</div>

<?php echo $get_footer['page_content']; ?>
