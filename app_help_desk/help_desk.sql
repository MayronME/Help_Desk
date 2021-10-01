-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Ago-2021 às 15:58
-- Versão do servidor: 10.4.20-MariaDB
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
-- Estrutura da tabela `tb_ticket`
--

CREATE TABLE `tb_ticket` (
  `id_ticket` int(11) NOT NULL,
  `fk_id_user` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `gravidade` int(1) NOT NULL,
  `categoria` char(30) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `data` datetime DEFAULT current_timestamp(),
  `status` char(15) NOT NULL DEFAULT 'Novo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_ticket`
--

INSERT INTO `tb_ticket` (`id_ticket`, `fk_id_user`, `tipo`, `gravidade`, `categoria`, `titulo`, `descricao`, `data`, `status`) VALUES
(1, 1, 'Incidente', 1, 'Impressora', 'Pc trava', '123', '2021-08-09 19:41:54', 'Novo'),
(2, 2, 'Incidente', 1, 'Impressora', 'Pc trava', '123', '2020-07-09 19:42:02', 'Processando'),
(3, 4, 'Incidente', 3, 'Impressora', 'Impressora não funciona', 'Quando ligo a impressora, ela não funciona corretamente o scanner', '2019-08-03 19:42:10', 'Solucionados'),
(4, 3, 'Incidente', 2, 'Software', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-08-08 11:31:42', 'Pendente'),
(5, 1, 'Incidente', 3, 'Impressora', 'Impressora não funciona', 'Comprei uma impressora HPDeskjet Ink Advantage 2130 All-in-one series que com 1 ano e 6 meses apresentou um defeito na placa que identifica o cartucho. Levei à assistência técnica e o técnico me informou que não valia a pena consertar pois a peça é quase', '2021-08-10 10:57:21', 'Fechados'),
(6, 3, 'Requisição', 4, 'Hardware', 'Teclado defeito', 'Comprei um Emulador/Leitor de pendrive para o meu teclado musical Roland EM-25 em 04/01/2020 com o Sr. Silva da Musical Teclados Comércio Serviços e Representações Ltda. através da loja deles no Mercado Livre.', '2021-08-10 10:57:47', 'Excluidos'),
(7, 2, 'Requisição', 3, 'Hardware', 'Pc trava', 'Pc novo não está rodando bem, quando inicio o sistema, tenho dificuldade em navegar devido a lentidão', '2021-08-10 10:58:15', 'Solucionados'),
(8, 4, 'Requisição', 3, 'Impressora', 'Impressora não funciona', 'A impressora explodiu de novo\', 0x31, \'2021-06-09 22:48:30\', \'Processando', '2021-08-10 10:58:39', 'Processando'),
(9, 3, 'Incidente', 4, 'Criação Usuário', 'Necessário criação de novo usuário', '\'O escritório não poderia parar as suas atividades por conta da instabilidade da rede sem fio), sendo que o ponto mais distante do concentrador (Switch) fica a cerca de 35 metros.', '2021-08-10 10:59:03', 'Novo'),
(10, 2, 'Incidente', 1, 'Rede', 'Cabo de rede CAT5 falhou', 'Comprei uma caixa de cabo de rede Cat5 Multitoc para realizar o cabeamento de uma pequena rede de 05 computadores (para 01 cliente que me solicitou, pois ele acha a rede Wireless muito instável e o escritório não poderia parar as suas atividades por conta', '2021-08-10 10:59:24', 'Novo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(3) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `tipo_usuario` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nome`, `email`, `senha`, `tipo_usuario`) VALUES
(1, 'Mayron', 'mayron795@gmail.com', '123', 1),
(2, 'Joyce', 'joyce@gmail.com', '123', 1),
(3, 'Karol', 'karol@gmail.com', '123', 2),
(4, 'Thalles', 'thalles@gmail.com', '123', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_ticket`
--
ALTER TABLE `tb_ticket`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `fk_id_user` (`fk_id_user`);

--
-- Índices para tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_ticket`
--
ALTER TABLE `tb_ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_ticket`
--
ALTER TABLE `tb_ticket`
  ADD CONSTRAINT `tb_ticket_ibfk_1` FOREIGN KEY (`fk_id_user`) REFERENCES `tb_users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
