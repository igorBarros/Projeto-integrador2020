<?php
session_start();
require_once "conecta.php";

if (!empty($_SESSION['id_usuario'])) {
    $_SESSION['id_usuario'];
} else {
    $_SESSION['msg'] = "Você precisa estar logado";
    header("Location: index.php");
}
$idLogado = $_SESSION['id_usuario'];

$sql = "SELECT * FROM `horasAlunos` INNER JOIN usuarios ON horasAlunos.id_usuario = usuarios.id_usuario where `status` = 'Aprovado' ORDER BY `dataCadastro` DESC";
$horasAlunos = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horas Complementares</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- chamando CSS -->
    <link rel="stylesheet" href="estilo.css">
</head>


<body>
    <div class="topo-header">
        <img class="logo" src="img/logo.png">
        <p class="descricao">Plataforma para validação de atividades complementares</p>
    </div>
    <div>
    </div>
    <div class="row">
        <div id="menu" class="menu col-3">
            <nav>
                <div class="link">
                    <a href="paginaAdm.php">Principal</a>
                </div>
                <div class="link">
                    <a href="acompanhamentoAdm.php">Acompanhamento de solicitações</a>
                </div>
                <div class="link active">
                    <a href="gerenciamento.php">Gerenciamento de solicitações</a>
                </div>
                <div class="link">
                    <a href="relatorios.php">Relatorios</a>
                </div>
                <div class="link ">
                    <a href="sistema.php">sistema</a>
                </div>
                <div class="link">
                    <?php echo "<a href='sair.php'>Sair</a>"; ?>
                </div>

            </nav>
        </div>

        <div id="principal" class="principal col-9">
            <p><i>Consulte abaixo os processos disponiblizados pela coordenação:</i></p>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Aluno</th>
                        <th scope="col">Modalidade</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Horas</th>
                    </tr>
                </thead>

                <?php while ($horas = mysqli_fetch_assoc($horasAlunos)) {
                    $date = new dateTime($horas['dataCadastro']);

                ?>

                    <tbody>
                        <tr>
                            <td> <?php echo $horas['nome']; ?> </td>
                            <td> <?php echo $horas['modalidade']; ?> </td>
                            <td> <?php echo $horas['titulo']; ?> </td>
                            <td> <?php echo $horas['horas']; ?> </td>
                        </tr>
                    </tbody>

                <?php } ?>
            </table>


        </div>
    </div>

    <footer>
        <p>
            Federação das Indústrias do Estado de Santa Catarina <br>
            Departamento Regional - Fone: 48 3231 4100 <br>
            Rod. Admar Gonzaga, 2765 - Florianópolis/SC - 88034-001
        </p>

    </footer>
</body>

</html>