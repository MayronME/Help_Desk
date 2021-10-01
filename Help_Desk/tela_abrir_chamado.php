<?php
  $acao = 'validar';
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
    </style> 
  </head> 
  <body> 
    <nav class="navbar navbar-dark bg-dark"> 
      <a class="navbar-brand" href="tela_home.php"> 
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> 
        App Help Desk 
      </a> 
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
            Abertura de chamado 
            </div> 
          <div class="card-body"> 
            <div class="row"> 
              <div class="col"> 
                <form method="POST" action="controller.php?acao=AbrirChamado"> 
                  <div class="form-group"> 
                  <label>Tipo</label> 
                    <select id="carlos"  name="tipo" class="form-control" >
                      <option value="" selected >Selecione*</OPtion>
                      <option value="Incidente">Incidente</option> 
                      <option value="Requisição">Requisição</option> 
                    </select> 
                  </div> 
                  <div class="form-group"> 
                    <label>Gravidade</label> 
                    <select  name="gravidade" class="form-control" >
                      <option value="" selected>Selecione*</OPtion>
                      <option value="1">Muito Baixo</option> 
                      <option value="2">Baixo</option> 
                      <option value="3">Médio</option> 
                      <option value="4">Alto</option> 
                      <option value="5">Muito Alto</option> 
                    </select> 
                  </div> 
                  <div class="form-group"> 
                    <label>Categoria</label> 
                      <select name="categoria" class="form-control" >
                      <option value="" selected>Selecione*</OPtion>
                      <option value="1">Criação Usuário</option> 
                      <option value="2">Impressora</option> 
                      <option value="3">Hardware</option> 
                      <option value="5">Software</option> 
                      <option value="6">Rede</option> 
                    </select> 
                  </div> 
                    <div class="form-group"> 
                      <label>Título</label> 
                      <input name="titulo" type="text" class="form-control" placeholder="Título" > 
                    </div> 
                    <div class="form-group"> 
                      <label>Descrição</label> 
                      <textarea name="descricao" class="form-control" rows="3"  ></textarea> 
                    </div> 
                    <div class="row mt-5"> 
                      <div class="col-6"> 
                        <a class="btn btn-lg btn-warning btn-block" href="tela_home.php">Voltar</a> 
                      </div> 
                      <div class="col-6"> 
                      <button class="btn btn-lg btn-info btn-block" ' type="submit">Abrir</button> 
                    </div> 
                  </div> 
                </form> 
              <?php
                if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1){
              ?>
              <div class="bg-success pt-2 text-white d-flex justify-content-center">
                <h5>Chamado Aberto!</h5>
              </div>
              <?php } ?>
              <?php
                if(isset($_GET['inclusao']) && $_GET['inclusao'] == 2){
              ?>
              <div class="bg-danger pt-2 text-white d-flex justify-content-center">
                <h5>Preencha todos os campos!</h5>
              </div>
              <?php } ?>
              </div> 
            </div> 
          </div> 
        </div> 
      </div> 
    </div> 
  </body> 
</html>