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
$modalidade = $_POST['modalidade'];
$titulo = $_POST['titulo'];
$upload = $_POST['upload'];
$descricao = $_POST['descricao'];

echo $sql = "INSERT INTO `horasalunos` (`id_usuario`, `modalidade`, `titulo`, `arquivo`, `descricao`, `status`, `dataCadastro`) VALUES ('$idLogado', '$modalidade', '$titulo', '$upload', '$descricao', 'aguardando', NOW())";
$horasAluno = mysqli_query($conexao, $sql);


if($horasAluno){
    header("Location: novasolicitacao.php");
} else{
    echo "Erro ao cadastrar";
}


?>