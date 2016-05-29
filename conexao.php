<?php

function conectaDB(){

	try {
		$config = require("config_db.php");
		if(! isset($config['db'])){
			throw new \InvalidArgumentException("Configuracao do banco de dados inválida.");
		}

		$host = (isset($config['db']['host'])) ? $config['db']['host'] : null;
		$dbname = (isset($config['db']['dbname'])) ? $config['db']['dbname'] : null;
		$user = (isset($config['db']['user'])) ? $config['db']['user'] : null;
		$password = (isset($config['db']['password'])) ? $config['db']['password'] : null;

		$conexao = new \PDO("mysql:host={$host};dbname={$dbname}", $user, $password);
	}

	catch(\PDOException $e) {
		die("Erro codigo: ".$e->getCode().": ".$e->getMessage());
	}

	return $conexao;
}

function get_page($x){

	$conexao = conectaDB();

	if($x==""){
		$x = "home";
	};

	$pagename = $x;
	$sql = "SELECT page_content FROM teste WHERE page_name = :pagename";
	$stmt = $conexao->prepare($sql);
	$stmt->bindValue("pagename", $pagename);
	$stmt->execute();
	$page = $stmt->fetch(PDO::FETCH_ASSOC);

	if($page==""){
		$sql = "SELECT page_content FROM teste WHERE page_name = '404'";
		$stmt = $conexao->prepare($sql);
		$stmt->execute();
		$page = $stmt->fetch(PDO::FETCH_ASSOC);
	}

	return $page;
}

function get_all_pages(){

	$conexao = conectaDB();

	$sql = "SELECT page_name FROM teste";
	$stmt = $conexao->prepare($sql);
	$stmt->execute();
	$pages = $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $pages;
}

function get_head(){

	$conexao = conectaDB();

	$sql = "SELECT page_content FROM teste WHERE page_name = 'head'";
	$stmt = $conexao->prepare($sql);
	$stmt->execute();
	$get_head = $stmt->fetch(PDO::FETCH_ASSOC);

	return $get_head;
}

function get_menu(){

	$conexao = conectaDB();

	$sql = "SELECT page_content FROM teste WHERE page_name = 'menu'";
	$stmt = $conexao->prepare($sql);
	$stmt->execute();
	$get_menu = $stmt->fetch(PDO::FETCH_ASSOC);

	return $get_menu;
}

function get_footer(){

	$conexao = conectaDB();

	$sql = "SELECT page_content FROM teste WHERE page_name = 'footer'";
	$stmt = $conexao->prepare($sql);
	$stmt->execute();
	$get_footer = $stmt->fetch(PDO::FETCH_ASSOC);

	return $get_footer;
}

function search(){

	$conexao = conectaDB();

	$searchterm = '%' . $_POST['search'] . '%';
	$sql = "SELECT * FROM teste WHERE page_name LIKE :searchterm OR page_content LIKE :searchterm";
	$stmt = $conexao->prepare($sql);
	$stmt->bindValue("searchterm", $searchterm);
	$stmt->execute();
	$searchresult= $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $searchresult;
}

function atualiza($x, $y){

	$conexao = conectaDB();

	$page_name = $x;
	$atualiza_conteudo = $y;
	$sql = "UPDATE teste SET page_content = :atualiza_conteudo WHERE page_name = :page_name";
	$stmt = $conexao->prepare($sql);
	$stmt->bindValue("atualiza_conteudo", $atualiza_conteudo);
	$stmt->bindValue("page_name", $page_name);
	$stmt->execute();
	
	return true;
}

function verificaUsuario($usuario, $senha) {

	$conexao = conectaDB();

	$db_user = $usuario;
	$db_pass = $senha;
	$sql = "select * from usuarios where usuario=:usuario and senha=:senha";
	$stmt = $conexao->prepare($sql);
	$stmt->bindValue("usuario", $db_user);
	$stmt->bindValue("senha", $db_pass);
	$stmt->execute();
	$verifica = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($verifica == '') {
		$resposta = 0;
	} else {
		$resposta = 1;
	}

	return $resposta;
}