-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jun-2021 às 01:04
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `help_desk`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `msg1` varchar(255) DEFAULT NULL,
  `msg2` varchar(255) DEFAULT NULL,
  `msg3` varchar(255) DEFAULT NULL,
  `msg4` varchar(255) DEFAULT NULL,
  `msg5` varchar(255) DEFAULT NULL,
  `msg6` varchar(255) DEFAULT NULL,
  `msg7` varchar(255) DEFAULT NULL,
  `msg8` varchar(255) DEFAULT NULL,
  `msg9` varchar(255) DEFAULT NULL,
  `msg10` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ticket`
--

CREATE TABLE `ticket` (
  `id_bilhete` int(11) NOT NULL,
  `gravidade` int(1) NOT NULL,
  `tipo` char(15) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `categoria` char(30) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `imagem` longblob DEFAULT NULL,
  `data` datetime DEFAULT current_timestamp(),
  `status_ticket` varchar(15) DEFAULT NULL,
  `id_user` int(1) NOT NULL,
  `urgencia` int(1) NOT NULL,
  `prioridade` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ticket`
--

INSERT INTO `ticket` (`id_bilhete`, `gravidade`, `tipo`, `titulo`, `categoria`, `descricao`, `imagem`, `data`, `status_ticket`, `id_user`, `urgencia`, `prioridade`) VALUES
(1, 5, 'Incidente', 'Impressora não funciona', 'Impressora', 'Comprei uma impressora HPDeskjet Ink Advantage 2130 All-in-one series que com 1 ano e 6 meses apresentou um defeito na placa que identifica o cartucho. Levei à assistência técnica e o técnico me informou que não valia a pena consertar pois a peça é quase ', 0x31, '2021-06-08 20:46:01', 'Novo', 1, 1, 'Alto'),
(2, 2, 'Requisição', 'Teclado defeito', 'Hardware', 'Comprei um Emulador/Leitor de pendrive para o meu teclado musical Roland EM-25 em 04/01/2020 com o Sr. Silva da Musical Teclados Comércio Serviços e Representações Ltda. através da loja deles no Mercado Livre.', 0x31, '2021-06-08 20:46:36', 'Processando', 2, 2, 'Baixo'),
(3, 3, 'Requisição', 'Impressora não funciona', 'Impressora', 'A impressora explodiu de novo', 0x31, '2021-06-09 22:48:30', 'Processando', 3, 3, 'Baixo'),
(4, 4, 'Requisição', 'Pc trava', 'Hardware', 'Pc novo não está rodando bem, quando inicio o sistema, tenho dificuldade em navegar devido a lentidão', 0x31, '2021-06-10 00:17:00', 'Processando', 4, 5, 'Alto'),
(5, 5, 'Requisição', 'Pc trava', 'Hardware', 'Pc novo não está rodando bem, quando inicio o sistema, tenho dificuldade em navegar devido a lentidão', 0x31, '2021-06-10 00:17:42', 'Processando', 1, 3, 'Baixo'),
(6, 1, 'Requisição', 'Pc trava', 'Hardware', 'Pc novo não está rodando bem, quando inicio o sistema, tenho dificuldade em navegar devido a lentidão', 0x31, '2021-06-10 00:17:59', 'Novo', 2, 4, 'Muito baixo'),
(7, 2, 'Requisição', 'Pc trava', 'Hardware', 'Pc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc trava', 0x31, '2021-06-10 00:18:13', 'Novo', 3, 4, 'Baixo'),
(8, 3, 'Incidente', 'Pc trava', 'Hardware', 'Pc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc trava', 0x31, '2021-06-10 00:18:44', 'Novo', 4, 1, 'Baixo'),
(9, 4, 'Incidente', 'Cabo de rede CAT5 falhou', 'Rede', 'Comprei uma caixa de cabo de rede Cat5 Multitoc para realizar o cabeamento de uma pequena rede de 05 computadores (para 01 cliente que me solicitou, pois ele acha a rede Wireless muito instável e o escritório não poderia parar as suas atividades por conta', 0x31, '2021-06-11 19:42:04', 'Novo', 1, 2, 'Alto'),
(10, 5, 'Incidente', 'Necessário criação de novo usuário ', 'Criação Usuário', 'O escritório não poderia parar as suas atividades por conta da instabilidade da rede sem fio), sendo que o ponto mais distante do concentrador (Switch) fica a cerca de 35 metros.', 0x31, '2021-06-11 19:42:51', 'Novo', 2, 3, 'Muito Alto'),
(11, 1, 'Incidente', 'O teto caiu', 'Hardware', 'Pc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc travaPc trava', 0x31, '2021-06-11 19:48:50', 'Novo', 3, 4, 'Muito baixo'),
(17, 2, 'Incidente', 'Coisas aleatorias', 'Impressora', '321321321321321321321321', 0x31, '2021-06-14 15:45:00', 'Novo', 4, 5, 'Médio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(70) NOT NULL,
  `email` char(50) NOT NULL,
  `password` char(30) NOT NULL,
  `type_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `nome_user`, `email`, `password`, `type_user`) VALUES
(1, 'Mayron Entreportes', 'adm@test.com.br', '321', 1),
(2, 'Leonardo Abras', 'adm2@test.com.br', '123', 1),
(3, 'José Francisco', 'jose@test.com.br', '231', 2),
(4, 'Maria Elena Souza', 'maria@test.com.br', '444', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Índices para tabela `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_bilhete`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_bilhete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
