<?php
  $acao = 'RecuperarChamados';
  require "controller.php";
?> 
<html> 
  <head> 
    <meta charset="utf-8" /> 
    <title>App Help Desk</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
    <style> 
      .card-abrir-chamado { 
      padding: 30px 0 0 0; 
      width: 100%; 
      margin: 0 auto; 
      } 
      .treco { 
      border:none; 
      border-top:1px dotted #f00; 
      color:#fff; 
      background-color:#fff; 
      height:1px; 
      width:50%; 
      } 

      .topnav a { 
      float: left; 
      display: block; 
      color: black; 
      text-align: center; 
      padding: 14px 16px; 
      text-decoration: none; 
      font-size: 17px; 
      border-bottom: 3px solid transparent; 
      } 

      .topnav a:hover { 
      border-bottom: 3px solid #4996b7; 
      } 

      .topnav a.active { 
      border-bottom: 3px solid #4996b7; 
      } 
      textarea {
      resize: none;
      }
      textarea{
      height: 15em;
      }
      .status{
      margin-top: 31px;
      }
    </style> 
  </head> 
    <body> 
      <nav class="navbar navbar-dark bg-dark"> 
        <a class="navbar-brand" href="tela_home.php"><img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">App Help Desk</a> 
        <ul class="navbar-nav"> 
        <li class="nav-item"> 
          <a class="nav-link" href="controller.php?acao=logoff">SAIR</a>
        </li> 
        </ul> 
      </nav> 
    <div class="container">     
    <div class="row"> 
    <div class="card-abrir-chamado"> 
    <div class="card"> 
      <div class="card-header"> 
        <div class="topnav"> 
          <a href="">Ticket</a> 
        </div> 
      </div> 
    <div class="card-body"> 
    <div class="row"> 
    <div class="col"> 
    <div class="form-row">
      <div class="form-group col-md-1">
        <label for="inputCity">bilhete</label>
        <input disabled="" class="form-control" placeholder="<?=$todos_chamados[0]['id_ticket']?>">
      </div>
      <div class="form-group col-md-4">
        <label for="inputCity">Data</label>
        <input disabled="" class="form-control" placeholder="<?=$todos_chamados[0]['data']?>">
      </div>
      <div class="form-group col-md-4">
        <label for="inputCity">Por</label>
        <input disabled="" class="form-control" placeholder="<?=$_SESSION[0]['user']?>">
      </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputCity">Gravidade: </label>
      <input disabled="" class="form-control" placeholder="<?=$todos_chamados[0]['gravidade']?>">
    </div>
    <div class="form-group col-md-3">
    <form method="POST" action="controller.php?acao=Atualizar&id_bilhete=<?=$todos_chamados[0]['id_ticket']?>">
    <?php if($_SESSION['tipo_usuario'] == 1){ ?>
        <div class="form-group"> 
          <label>Urgência</label> 
          <select   name="urgencia" class="form-control"> 
            <option value="">Atual: <?=$todos_chamados[0]['urgencia']?></option> 
            <option value="1">Muito Baixo</option> 
            <option value="2">Baixo</option> 
            <option value="3">Médio</option> 
            <option value="4">Alto</option> 
            <option value="5">Muito Alto</option> 
          </select> 
        </div> 
      <?php } else { ?>
      <label for="inputCity">Urgencia: </label>
      <input disabled="" class="form-control" placeholder="<?=$todos_chamados[0]['urgencia']?>">
      <?php } ?>
      </div>
      <div class="form-group col-md-3">
      <label for="inputCity">Prioridade: </label>
      <input disabled="" class="form-control" placeholder="<?=$todos_chamados[0]['prioridade']?>">
      </div>
      </div>
      <?php if($_SESSION['tipo_usuario'] == 1){ ?>
        <div class="form-row">
          <div class="form-group col-md-3">
            <div class="form-group"> 
            <label>Status</label> 
            <select name="status" class="form-control"> 
              <option value="">Atual: <?=$todos_chamados[0]['status']?></option> 
              <option value="Novo">Novo</option> 
              <option value="Processando">Processando</option> 
              <option value="Concluido">Concluido</option> 
              <option value="Encerrado">Encerrado</option> 
            </select> 
            </div> 
          </div>
        </div>
      <?php } ?>
      <div class="form-row">
      <div class="form-group col-md-4">
      <label for="inputCity">Titulo</label>
      <input disabled="" class="form-control" placeholder="<?=$todos_chamados[0]['titulo']?>">
      </div>
      </div>
      <div class="form-group col-md-15">
      <label for="inputCity">Descrição</label>
      <TEXTarea class="form-control" disabled=""><?=$todos_chamados[0]['descricao']?></TEXTarea>
      </div>
      </div>
      </div> 
      <?php
          if(isset($_GET['alteracao']) && $_GET['alteracao'] == 1){
            echo 'entrou aqui';
        ?>
        <div class="bg-success pt-2 text-white d-flex justify-content-center">
          <h5>Chamado Alterado!</h5>
        </div>
        <?php } ?>
        <?php
          if(isset($_GET['alteracao']) && $_GET['alteracao'] == 2){
        ?>
        <div class="bg-danger pt-2 text-white d-flex justify-content-center">
          <h5>Ouve Algum Erro :c </h5>
        </div>
      <?php } ?>
      <div class="row mt-5"> 
      <div class="col-6"> 
      <a class="btn btn-lg btn-warning btn-block" href="tela_todos_chamados.php">Voltar</a> 
      </div> 
      <div class="col-6"> 
        <button class="btn btn-lg btn-info btn-block" type="submit">Atualizar</button> 
      </div> 
      </div> 
    </form>
    </div> 
    </div> 
    </div> 
  </body> 
</html>