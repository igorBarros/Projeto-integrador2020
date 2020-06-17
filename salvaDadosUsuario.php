<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once "conecta.php";


if (!empty($_SESSION['id_usuario'])) {
  $_SESSION['id_usuario'];
} else {
  $_SESSION['msg'] = "Você precisa estar logado";
  header("Location: index.php");
}

$idLogado = $_SESSION['id_usuario'];

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$CripitografiaSenha = password_hash($senha, PASSWORD_DEFAULT);

$sql = "UPDATE `usuarios` SET `senha` = '$CripitografiaSenha' WHERE(`id_usuario` = '$idLogado') limit 1";
$dadoUsuario = mysqli_query($conexao, $sql);

if ($dadoUsuario) {
  header("Location: dadosUsuario.php");
} else {
  echo "Erro de conexão";
}
