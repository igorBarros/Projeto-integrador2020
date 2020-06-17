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
  <div class="row">
    <div id="menu" class="menu col-3">
      <nav>
        <div class="link">
          <a href="paginaUsuario.php">Principal</a>
        </div>
        <div class="link active">
          <a href="novasolicitacao.php">Cadastrar nova solicitação</a>
        </div>
        <div class="link">
          <a href="acompanhamentoSolicitacao.php">Acompanhamento de solicitações</a>
        </div>
        <div class="link">
          <a href="dadosUsuario.php">Dados do usuário</a>
        </div>
        <div class="link">
          <?php echo "<a href='sair.php'>Sair</a>"; ?>
        </div>

      </nav>
    </div>

    <div id="principal" class="principal col-9">

      <form method="POST" action="salvarHoras.php" class="modalidade">
        <div class="row">
          <div class="modalidade-content">
            <label class="text-modalidade">Modalidade desejada*</label>

            <label class="form-check">
              <input type="radio" name="modalidade" value="ensino"><span class="label label-success"> Ensino</span>
            </label>

            <label class="form-check">
              <input type="radio" name="modalidade" value="pesquisa"><span class="label label-success"> Pesquisa</span>
            </label>
            
            <label class="form-check">
              <input type="radio" name="modalidade" value="extensao"><span class="label label-success"> Extensão</span>
            </label>

          </div>
        </div>
        <div class="form-group">
          <select style="width: 500px;" name="titulo" class="custom-select">
            <option selected>Selecione...</option>
            <option value="palestra">Palestra</option>
            <option value="estagio">Estagio</option>
            <option value="cursos">Cursos</option>

          </select>
        </div>


        <div class="form-group">
          <label for="exampleFormControlFile1">Arquivo para upload*</label>
          <input name="upload" type="file" class="form-control-file">

          <div class="form-group form-check">
            <input name="checkbox" type="checkbox" class="form-check-input">
            <label name="semUpload" class="form-check-label">Sem upload de arquivo</label>
          </div>
        </div>

        <div style="width: 500px;" class="form-group">
          <label name="descricao">Descrição</label>
          <textarea name="descricao" class="form-control" id="descricao" rows="3"></textarea>
        </div>

        <div class="btn-group">
          <button style="width:150px;" type="reset" class="btn btn-secondary">Limpar</button>
          <button style="width:150px;" type="submit" name="btnHoras" class="btn btn-primary">Enviar</button>
        </div>
      </form>

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