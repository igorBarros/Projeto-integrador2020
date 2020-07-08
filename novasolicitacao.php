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
  <script type="text/javascript" src="jquery-1.11.0.min.js"></script>
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
          <a href="aprovadas.php">Solicitações Aprovadas</a>
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
        <h5><i>Lembre-se, a modalidade selecionada deve ter relação com a atividade.</i></h5>

        <div class="row">
          <div id="modalidade" class="modalidade-content">
            <label class="text-modalidade">Modalidade desejada*</label>

            <label class="form-check">
              <input type="radio" name="modalidade" value="Ensino"><span class="label label-success"> Ensino</span>
            </label>

            <label class="form-check">
              <input type="radio" name="modalidade" value="Pesquisa"><span class="label label-success"> Pesquisa</span>
            </label>

            <label class="form-check">
              <input type="radio" name="modalidade" value="Extensão"><span class="label label-success"> Extensão</span>
            </label>

          </div>
        </div>
        <div class="form-group">
          <select style="width: 500px;" name="titulo" class="custom-select">
            <option disabled selected>Atividade</option>
            <option style="color: #ACDFBA;" disabled>ENSINO</option>

            <option value="Aula inaugural 4h">Aula inaugural 4Hrs</option>
            <option value="Unidade Curricular não prevista na organização curricular do curso, max 50h">Unidade Curricular não prevista na organização curricular do curso, max 50h</option>
            <option value="Monitoria acadêmica, max 40h">Monitoria acadêmica, max 40h</option>
            <option value="Visita técnica, max 20h">Visita técnica, max 20h</option>
            <option value="Ministrante de curso, max 30h">Ministrante de curso, max 30h</option>
            <option value="Participação em palestra, 3h por palestra">Participação em palestra, 3h por palestra</option>
            <option value="Participação em projetos integradores, 20h">Participação em projetos integradores, 20h</option>

            <option style="color: #ACDFBA;" disabled>PESQUISA</option>
            <option value="Participação em projeto de pesquisa, max 40h">Participação em projeto de pesquisa, max 40h</option>
            <option value="Participações em congressos, seminários, simpósios, 40h por Eventos">Participações em congressos, seminários, simpósios, 40h por Eventos</option>
            <option value="Publicação de artigos, 40h por artigo">Publicação de artigos, 40h por artigo</option>
            <option value="Publicação de resumos, 40h por resumo">Publicação de resumos, 40h por resumo</option>
            <option value="Autoria ou co-autoria, 40h">Autoria ou co-autoria, 40h</option>

            <option style="color: #ACDFBA;" disabled>EXTENSÃO</option>

            <option value="Estágio, max 50h">Estágio, max 50h</option>
            <option value="Participação de eventos, max 10h">Participação de eventos, max 10h</option>
            <option value="Participação em congressos, 10h">Participação em congressos, 10h</option>
            <option value="Participações em congressos, seminários, simpósios, 5h por dia">Participações em congressos, seminários, simpósios, 5h por dia</option>
            <option value="Participações de cursos de extensão, max 40h">Participações de cursos de extensão, max 40h</option>
            <option value="Representação estudantil, max 10h">Representação estudantil, max 10h</option>
            <option value="Representante de turma, max 20h">Representante de turma, max 20h</option>
            <option value="Curso de linguas, max 40h">Curso de linguas, max 40h</option>

          </select>
        </div>


        <div class="form-group">
          <label for="upload">Arquivo para upload*</label>
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