SOBRE:
Aplicação em HTML, bootstrap e PHP
Feito em colaboração entre alunos da faculdade UNA - Betim
 
O intuito do projeto e desenvolver um Help Desk com implementações ITIL


Para funcionar corretamente a aplicação é necessário a criação de um banco de dados. 

Na atual versão da aplicação que nomeamos de “v2.1” algumas funcionalidades estão críticas.
        Mas a aplicação já é capaz de ;
        Impedir acesso sem login,
        Cadastrar de forma hardcode novos usuários,
        Cadastrar novos tickets no banco de dados SQL,
        Consultar os tickets por perfil;
                Usuário: O usuário somente consegue visualizar seus chamados,
                Administrador: Consegue visualizar todos os chamados,
        Iniciar e encerrar sessão


INSTALAÇÂO:

Primeiro crie banco “help_desk”
    
    CREATE DATABASE help_desk;


Crie a tabela “users”

    CREATE TABLE users(
    id_user int not null,
    email char(50) not null,
    password char(30) not null,
    type_user int not null
    );

Inserir Dados na tabela

    INSERT INTO users (id_user, email, password, type_user) VALUES 
    (1, "adm@test.com.br", "321", 1), 
    (2, "adm2@test.com.br", "123", 1), 
    (3, "jose@test.com.br", "231", 2), 
    (4, "maria@test.com.br", "444", 2)

Criar tabela “ticket”

    CREATE TABLE ticket ( 
    id_bilhete int not null,
    id_user int not null,
    urgencia char(20) not null,
    tipo char(15) not null,
    titulo varchar(100) not null,
    categoria char(30) not null,
    descricao varchar(255) not null,
    imagem LONGBLOB,
    data DATETIME DEFAULT CURRENT_TIMESTAMP
    );
