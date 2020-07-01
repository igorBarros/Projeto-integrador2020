<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once "conecta.php";

$id = $_GET['id'];
$idLogado = $_SESSION['id_usuario'];
$modalidade = $_POST['modalidade'];
$titulo = $_POST['titulo'];
$upload = $_POST['upload'];
$descricao = $_POST['descricao'];

echo $sql = "UPDATE horasalunos SET `id_usuario` = $idLogado, `modalidade` = '$modalidade', `titulo` = '$titulo', `descricao` = '$descricao', `status` = 'aguardando', `dataCadastro` = NOW() WHERE id_horas = $id";
$atualiza = mysqli_query($conexao, $sql);

header("Location: acompanhamentoSolicitacao.php");
