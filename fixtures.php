<?php

require_once ("conexao.php");

echo "#### EXECUTANDO FIXTURE ####" . "<br />";

$conn = conectaDB();

echo "Removendo tabela" . "<br />";
$conn->query("DROP TABLE IF EXISTS teste;");
echo " - OK" . "<br />";

echo "Criar tabela" . "<br />";
$conn->query("CREATE TABLE teste (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  page_name text CHARACTER SET 'utf8' null,
  page_content longtext CHARACTER SET 'utf8' null,
  PRIMARY KEY (id));");
echo " - OK" . "<br />";


echo "Inserindo Dados" . "<br />";

$files = array(
    'empresa.php',
    'servicos.php',
    'produtos.php',
    'contato.php',
    'home.php',
    '404.php',
    'head.php',
    'menu.php',
    'footer.php'
);

foreach($files as $file){
    $content = file_get_contents($file);
    $page_name = explode('.', $file);
    $smt = $conn->prepare("INSERT INTO teste (page_name, page_content) VALUES (:page_name, :page_content);");
    $smt->bindValue(':page_name', $page_name[0]);
    $smt->bindValue(':page_content', $content);
    $smt->execute();
}

echo " - OK" . "<br />";

echo "### CONCLUIDO ####" . "<br />";