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
      .card-consultar-chamado { 
        padding: 30px 0 0 0; 
        width: 100%; 
        margin: 0 auto; 
      } 
      a.fill-div { 
        display: block; 
        height: 100%; 
        width: 100%; 
        text-decoration: none; 
        color: inherit; 
         
      } 
      tbody{ 
        cursor: pointer; 
      } 
 
      tbody:hover{ 
        -webkit-transform: scale(1); 
        -moz-transform: scale(1); 
        -o-transform: scale(1); 
        -ms-transform: scale(1); 
        transform: scale(1.04); 
    } 
      select{
        width: 18px;
        border-radius: 30px;
      }
    </style> 
    <script>
    function status(valor) {
      window.location.href = "tela_todos_chamados.php?where=status&organizar="+valor;
    }
    function categoria(valor) {
      window.location.href = "tela_todos_chamados.php?where=categoria&organizar="+valor;
    }
</script>
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
        <div class="card-consultar-chamado"> 
          <div class="card"> 
            <div class="card-header"> 
              Chamados 
            </div> 
            <div class="card-body "> 
              <table class="table table-sm table-bordered table-white "> 
                <thead class="text-center"> 
                  <tr> 
                    <th scope="col"><a href="tela_todos_chamados.php?acao=RecuperarChamados">ID</a></th> 
                    <th scope="col">Status
                      <select name="" id="status" onchange="status(value);">
                        <option></option>
                        <option value="Novo">Novo</option>
                        <option value="Processando">Processando</option>
                        <option value="Pendente">Pendente</option>
                        <option value="Solucionados">Solucionados</option>
                        <option value="Fechados">Fechados</option>
                        <option value="Excluidos">Excluidos</option>
                      </select>
                    </th> 
                    <th scope="col">Categoria
                      <select name="" id="categoria" onchange="categoria(value);">
                        <option></option>
                        <option value="Criação Usuário">Criação Usuário</option>
                        <option value="Impressora">Impressora</option>
                        <option value="Hardware">Hardware</option>
                        <option value="Software">Software</option>
                        <option value="Rede">Rede</option>
                      </select>
                    </th> 
                    <th scope="col">Prioridade</th> 
                    <th scope="col">Data</th> 
                    <th scope="col">Titulo</th> 
                    <th scope="col">Descrição</th> 
    
                  </tr> 
                </thead> 
                <?php 
                foreach( $todos_chamados as $indice => $chamado ){ ?>
                <tbody class="text-center"> 
                  <tr   href="tela_chamado.php?ID=<?=$chamado['id_ticket']?>"> 
                    <th style="width:4%;" scope="row"><?= $chamado['id_ticket'] ?></th> 
                    <td style="width:9%;" ><a class="fill-div" href="tela_chamado.php?acao=RecuperarChamados&where=id_ticket&organizar=<?=$chamado['id_ticket']?>"><?= $chamado['status'] ?></a></td> 
                    <td style="width:11%;"><a class="fill-div" href="tela_chamado.php?acao=RecuperarChamados&where=id_ticket&organizar=<?=$chamado['id_ticket']?>"><?= $chamado['categoria'] ?></a></td> 
                    <td style="width:11%; "><a class="fill-div" href="tela_chamado.php?acao=RecuperarChamados&where=id_ticket&organizar=<?=$chamado['id_ticket']?>"><?= $chamado['prioridade'] ?></a></td> 
                    <td style="width:10%;"><a class="fill-div" href="tela_chamado.php?acao=RecuperarChamados&where=id_ticket&organizar=<?=$chamado['id_ticket']?>"><?= $chamado['data'] ?></a></td> 
                    <td style="width:15%;"><a class="fill-div" href="tela_chamado.php?acao=RecuperarChamados&where=id_ticket&organizar=<?=$chamado['id_ticket']?>"><?= $chamado['titulo'] ?></a></td> 
                    <td style="width:38%;"><a class="fill-div" href="tela_chamado.php?acao=RecuperarChamados&where=id_ticket&organizar=<?=$chamado['id_ticket']?>"><?= $chamado['descricao'] ?></a></td> 
                  </tr> 
                </tbody> 
                <?php } ?>
              </table> 
            </div>
              <div class="row mt-5"> 
                <div class="col-6"> 
                  <a class="btn btn-lg btn-warning btn-block" href="tela_home.php">Voltar</a> 
                </div> 
              </div> 
            </div> 
          </div> 
        </div> 
      </div> 
    </div> 
  </body> 
</html> 
      
