<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once "conecta.php";


// if (!empty($_SESSION['id_usuario'])) {
//   $_SESSION['id_usuario'];
// } else {
//   $_SESSION['msg'] = "Você precisa estar logado";
//   header("Location: index.php");
// }

$status = $_POST['status'];
//$descricao = $_POST['descricao'];

echo $sql = "UPDATE `horasalunos` SET `status` = $status";
$reconsidera = mysqli_query($conexao, $sql);

if($reconsidera){
    header("Location: abrirSolicitacao.php");
} else{
    echo "Erro ";
}

?>