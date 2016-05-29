<?php
session_start();
require_once("conexao.php");

$verificaUsuario = verificaUsuario($_POST['usuario'], $_POST['senha']);

if ($verificaUsuario == 0) {
    $_SESSION['logado'] = 0;
    die(header("Location: login"));
  } else {
    $_SESSION['logado'] = 1;
    die(header("Location: admin.php"));
}

