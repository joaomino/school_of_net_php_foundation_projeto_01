<?php

require_once ("conexao.php");

echo "#### EXECUTANDO FIXTURE ####" . "<br />";

$conn = conectaDB();

echo "Removendo tabela TESTE" . "<br />";
$conn->query("DROP TABLE IF EXISTS teste;");
echo " - OK" . "<br />";

echo "Removendo tabela USUARIOS" . "<br />";
$conn->query("DROP TABLE IF EXISTS usuarios;");
echo " - OK" . "<br />";

echo "Criar tabela TESTE" . "<br />";
$conn->query("CREATE TABLE teste (
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  page_name text CHARACTER SET 'utf8' null,
  page_content longtext CHARACTER SET 'utf8' null,
  PRIMARY KEY (id));");
echo " - OK" . "<br />";

echo "Criar tabela USUARIOS" . "<br />";
$conn->query("CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
echo " - OK" . "<br />";

echo "Inserindo Dados Tabela TESTE" . "<br />";

$files = array(
    'empresa.php',
    'servicos.php',
    'produtos.php',
    'contato.php',
    'home.php',
    '404.php',
    'head.php',
    'menu.php',
    'footer.php',
    'login.php'
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

echo "Inserindo Dados Tabela USAURIOS" . "<br />";

$id = 1;
$nome = 'admin';
$usuario = 'admin';
$senha = 'admin';
$smt = $conn->prepare("INSERT INTO `pdo`.`usuarios` (`id`, `nome`, `usuario`, `senha`) VALUES (:id, :nome, :usuario, :senha)");
$smt->bindValue(':id', $id);
$smt->bindValue(':nome', $nome);
$smt->bindValue(':usuario', $usuario);
$smt->bindValue(':senha', $senha);
$smt->execute();


echo " - OK" . "<br />";

echo "### CONCLUIDO ####" . "<br />";