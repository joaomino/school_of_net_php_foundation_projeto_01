<?php
/**
 * Created by PhpStorm.
 * User: joaom
 * Date: 29/04/2016
 * Time: 20:20
 */
require_once("conexao.php");
//print_r($_SERVER['HTTP_REFERER']);
$page_name = $_POST['edit'];
$editor_data = $_POST['editor1'];
$atualiza = atualiza($page_name, $editor_data);
if ($atualiza == 1) {
    echo "Salvo";
}
else {
    echo "Erro ao salvar";
}