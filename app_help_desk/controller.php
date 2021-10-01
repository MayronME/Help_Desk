<?php
  session_start();
  require "../../app_help_desk/db_connect.php";
  require "../../app_help_desk/usuario.model.php";
  require "../../app_help_desk/helpservice.php" ;
  require "../../app_help_desk/ticket.model.php" ;

  if( !$_SESSION['autenticado']){ 
    header('Location: index.php?erro=2');
  }  

  $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao; 
  $usuario = new Usuarios; 
  $conexao = new Connection;
  $ticket = new ticket;

  if( $acao == 'login' ){ 
    $help = new HelpService($conexao,$usuario); 
    $usuario->__set('email',$_POST['email']); 
    $usuario->__set('senha',$_POST['senha']);
    $usuario->validarUsuario($help->recuperarUsuarios());
  } 

  if($acao == 'AbrirChamado'){
    $dados_Abertura_Chamado = $_POST;

    $ticket->__set('tipo', $dados_Abertura_Chamado['tipo']);
    $ticket->__set('gravidade',$dados_Abertura_Chamado['gravidade']);
    $ticket->__set('categoria',$dados_Abertura_Chamado['categoria']);
    $ticket->__set('titulo',$dados_Abertura_Chamado['titulo']);
    $ticket->__set('descricao',$dados_Abertura_Chamado['descricao']);
    $ticket->__set('id_user', $_SESSION['id_user']);
    $help = new helpservice($conexao,$ticket);
    $help->inserirDadosTicket();

  }

  if($acao == 'RecuperarChamados'){
    $help = new helpservice($conexao,$ticket);
    $todos_ticket_banco = $help->recuperarTicket();
    $todos_status_ticket_banco = $help->recuperarStatusTicket();
    $todos_chamados = $ticket->TratarTodosChamados($todos_ticket_banco,$todos_status_ticket_banco, $_GET);
  }

  if($acao == 'RecuperarUmChamado'){
    $ticket->__set('where',$_GET['where']);
    $ticket->__set('organizacao',$_GET['organizar']);
    $help = new helpservice($conexao,$ticket);
    $todosChamados = $help->recuperarTicketUnico();
  }

  if($acao == 'Atualizar'){
    $ticket->__set('id_ticket',$_GET['id_bilhete']);
    $ticket->__set('status',$_POST['status']);
    $ticket->__set('gravidade',$_POST['urgencia']);
    $help = new HelpService($conexao,$ticket);
    $help->atualizarDados($_SERVER['HTTP_REFERER']);
    
    
  }

  if($acao == 'logoff'){

    session_start();
    //remover índices do array  => unset()

    session_destroy();
    header('Location: index.php');

  }

?>