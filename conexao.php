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
	$sql = "SELECT page_content FROM pages WHERE page_name = :pagename";
	$stmt = $conexao->prepare($sql);
	$stmt->bindValue("pagename", $pagename);
	$stmt->execute();
	$pages = $stmt->fetch(PDO::FETCH_ASSOC);

	if($pages==""){
		$sql = "SELECT page_content FROM pages WHERE page_name = '404'";
		$stmt = $conexao->prepare($sql);
		$stmt->execute();
		$pages = $stmt->fetch(PDO::FETCH_ASSOC);
	}

	return $pages;

}

function get_head(){

	$conexao = conectaDB();

	$sql = "SELECT page_content FROM pages WHERE page_name = 'head'";
	$stmt = $conexao->prepare($sql);
	$stmt->execute();
	$get_head = $stmt->fetch(PDO::FETCH_ASSOC);

	return $get_head;
}

function get_menu(){

	$conexao = conectaDB();

	$sql = "SELECT page_content FROM pages WHERE page_name = 'menu'";
	$stmt = $conexao->prepare($sql);
	$stmt->execute();
	$get_menu = $stmt->fetch(PDO::FETCH_ASSOC);

	return $get_menu;
}

function get_footer(){

	$conexao = conectaDB();

	$sql = "SELECT page_content FROM pages WHERE page_name = 'footer'";
	$stmt = $conexao->prepare($sql);
	$stmt->execute();
	$get_footer = $stmt->fetch(PDO::FETCH_ASSOC);

	return $get_footer;
}

function search(){

	$conexao = conectaDB();

	$searchterm = '%' . $_POST['search'] . '%';
	$sql = "SELECT * FROM pages WHERE page_name LIKE :searchterm OR page_content LIKE :searchterm";
	$stmt = $conexao->prepare($sql);
	$stmt->bindValue("searchterm", $searchterm);
	$stmt->execute();
	$searchresult= $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $searchresult;
}