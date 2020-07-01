<?php
require_once "conecta.php";


// if (!empty($_SESSION['id_usuario'])) {
//   $_SESSION['id_usuario'];
// } else {
//   $_SESSION['msg'] = "Você precisa estar logado";
//   header("Location: index.php");
// }

$id = $_GET['id'];
$status = $_POST['status'];
$descricao = $_POST['descricao'];


echo $sql = "UPDATE horasalunos SET status = '$status' WHERE id_horas = $id";
$reconsidera = mysqli_query($conexao, $sql);

echo $sql = "INSERT INTO `reconsidera` (`motivo`, `id_horas`) VALUES ('$descricao', '$id')";
$motivo = mysqli_query($conexao, $sql);

header("Location: acompanhamentoAdm.php");
?>