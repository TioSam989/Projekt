-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Maio-2021 às 02:20
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
-- Banco de dados: `projekt`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `idLogin` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ativo` varchar(1) NOT NULL,
  `ficheiro_nome` varchar(500) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `born` date NOT NULL,
  `turma` varchar(4) NOT NULL,
  `code` varchar(5) NOT NULL,
  `codigoMensagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`idLogin`, `nome`, `email`, `username`, `password`, `ativo`, `ficheiro_nome`, `sexo`, `born`, `turma`, `code`, `codigoMensagem`) VALUES
(126, 'Davi Neves da Costa Santos', 'Tio.sam989@hotmail.com', 'TioSam190', 'b0c0eee864220e31df6e60530a087ef2', 'S', '89180-WIN_20200804_12_14_32_Pro.jpg', 'masculino', '2004-03-16', '10PP', '*****', '48381TioSam190'),
(127, 'Ze Augusto', 'ze.aug@animals.com', 'Patas123@', 'b950e86f7967d4df72a30bb05e93166a', 'S', '40181-WhatsApp Image 2021-02-21 at 22.04.49.jpeg', 'masculino', '1616-12-16', '11PP', '*****', ''),
(128, 'Ana Catarina', 'Ana@animals.au', 'Osso123', 'dbd0c88a1aa375fae91f9cc6228efea0', 'S', 'default.jpg', 'masculino', '2021-02-24', '11PI', '', ''),
(129, 'dwaadw', 'wD@dwad.dwa', 'dwAFdwAD23!@', 'b0c0eee864220e31df6e60530a087ef2', 'S', '4798-duck.jpg', 'masculino', '0151-12-15', '12PI', '', ''),
(130, 'dwadawdwawd', 'dwad@dwadawd.wad', 'wdadWAD23@', 'b0c0eee864220e31df6e60530a087ef2', 'N', 'default.jpg', 'masculino', '1515-12-15', '10PQ', '', ''),
(131, 'Ola', 'ola@ola.com', 'Ola1', '85c3b3dd7767bdfc8a340ced61711858', 'N', '84954-T044BCGQ4-UMCGNJBJ6-be70a055afa2-192.jfif', 'masculino', '1990-08-08', '11PQ', '', ''),
(132, 'Ola', 'ola2@ola.com', 'Ola123', 'ea96a9f04e7ec3cff417ac9043dbc085', 'N', '91445-T044BCGQ4-UMCGNJBJ6-be70a055afa2-192.jfif', 'masculino', '1990-08-08', '10PE', '', ''),
(133, 'dnwaindwioandwion', 'wdadiwi@dnwadnmwa.dwadw', 'TioSam170', 'b0c0eee864220e31df6e60530a087ef2', 'Z', 'default.jpg', 'masculino', '0000-00-00', '12PE', '', ''),
(134, 'dnwaindwioandwion', 'wdadiwi@dnwadnmwa.dwadw', 'TioSam170', 'b0c0eee864220e31df6e60530a087ef2', 'Z', 'default.jpg', 'masculino', '0000-00-00', '11PD', '', ''),
(135, 'dwadsa', 'wa@dwa.wda', 'TioLam190', 'b0c0eee864220e31df6e60530a087ef2', 'N', '78810-WhatsApp Image 2021-02-21 at 22.04.49.jpeg', 'masculino', '0041-12-14', '10PP', '', ''),
(137, 'beuh', 'TUian@gmail.com', 'Raul123', 'b0c0eee864220e31df6e60530a087ef2', 'S', '57227-36847-imagem_bot_conta.jpg', 'masculino', '0171-12-17', '11 -', '', ''),
(138, 'japa cego', 'japa@kala.com', 'Japa123', 'b0c0eee864220e31df6e60530a087ef2', 'S', '63539-36847-imagem_bot_conta.jpg', 'masculino', '1715-12-17', '11PI', '', ''),
(139, 'Helena Lima', 'helena@gmail.com', 'HeHe190', 'b0c0eee864220e31df6e60530a087ef2', 'S', '33146-VRChat 2021 3 1 14 51 58 001.png', 'feminino', '0000-00-00', '11PD', '', ''),
(140, 'Xpto513', 'Xpto513@xpto.com', 'Xpto513', 'ed1dcc9467d13fe178efd9e5877e0066', 'Z', '37856-imagem_bot_conta.jpg', 'masculino ', '2016-04-22', '10PP', '', ''),
(141, 'Xpto748', 'Xpto748@xpto.com', 'Xpto748', '3d34c10d67b61c2e272ff783ebb6945d', 'Z', '17077-imagem_bot_conta.jpg', 'masculino ', '2010-04-18', '11PD', '', ''),
(142, 'Xpto837', 'Xpto837@xpto.com', 'Xpto837', 'eb96fbce2be92e361f791da050837f3b', 'Z', '88805-imagem_bot_conta.jpg', 'masculino ', '1983-11-20', '12PI', '', ''),
(143, 'Xpto301', 'Xpto301@xpto.com', 'Xpto301', '2a70ac23a0456a6e1acc03932b2c4faf', 'Z', '53491-imagem_bot_conta.jpg', 'masculino ', '1984-09-24', '10PQ', '', ''),
(144, 'Xpto191', 'Xpto191@xpto.com', 'Xpto191', 'dbc4ec1ef2f705b4ae0be72e894946d2', 'Z', '54146-imagem_bot_conta.jpg', 'masculino ', '1991-09-24', '10PQ', '', ''),
(145, 'Xpto457', 'Xpto457@xpto.com', 'Xpto457', '09f7f16f3aeaa1fecee9e51bb03c9f14', 'Z', '42077-imagem_bot_conta.jpg', 'masculino ', '1988-06-09', '11PD', '', ''),
(146, 'Xpto321', 'Xpto321@xpto.com', 'Xpto321', '26dbb48c28ceed18b6462909c7c8300d', 'Z', '78861-imagem_bot_conta.jpg', 'masculino ', '1981-05-27', '10PP', '', ''),
(147, 'Xpto595', 'Xpto595@xpto.com', 'Xpto595', '78769bac671dfb26d8d58748c691e1d9', 'Z', '41016-imagem_bot_conta.jpg', 'masculino ', '2016-07-10', '11PD', '', ''),
(148, 'Xpto900', 'Xpto900@xpto.com', 'Xpto900', 'ab9a2f5e4ccc83b9f631d8c77118e08d', 'Z', '92166-imagem_bot_conta.jpg', 'masculino ', '2016-09-25', '10PP', '', ''),
(149, 'Xpto472', 'Xpto472@xpto.com', 'Xpto472', '14a9a298f5d00357230cbc38118cdf73', 'Z', '57755-imagem_bot_conta.jpg', 'masculino ', '2004-01-23', '11PP', '', ''),
(150, 'Xpto879', 'Xpto879@xpto.com', 'Xpto879', '6a48282f0792f106c121214d1c64d17b', 'Z', '76782-imagem_bot_conta.jpg', 'masculino ', '2017-01-07', '11PQ', '', ''),
(151, 'Xpto300', 'Xpto300@xpto.com', 'Xpto300', 'ce3f5ac2d1c8fe3664d69df2c2941c6e', 'Z', '42726-imagem_bot_conta.jpg', 'masculino ', '2011-03-25', '10PE', '', ''),
(152, 'Xpto449', 'Xpto449@xpto.com', 'Xpto449', '738053458e250ffab7a6ebdbdbef7dbc', 'Z', '37872-imagem_bot_conta.jpg', 'masculino ', '1996-10-19', '10PP', '', ''),
(153, 'Xpto806', 'Xpto806@xpto.com', 'Xpto806', '1234d29a635d54ca8ab36745a00e45be', 'S', '65677-imagem_bot_conta.jpg', 'masculino ', '1996-02-04', '10PE', '', ''),
(154, 'Xpto807', 'Xpto807@xpto.com', 'Xpto807', '6dea38dd8cb79028497dca0b5499c308', 'S', '25182-imagem_bot_conta.jpg', 'masculino ', '1982-09-11', '10PP', '', ''),
(155, 'Xpto445', 'Xpto445@xpto.com', 'Xpto445', 'e2c2a122dce65d657219416988e1296b', 'N', '82183-imagem_bot_conta.jpg', 'masculino ', '1994-08-14', '10PP', '', ''),
(156, 'Xpto639', 'Xpto639@xpto.com', 'Xpto639', 'c7c72c2e7e788f729699d85339b226e7', 'S', '33091-imagem_bot_conta.jpg', 'masculino ', '2011-07-15', '12PI', '', ''),
(157, 'Xpto643', 'Xpto643@xpto.com', 'Xpto643', '30e4c9855913e8a9a994708ecb0b9b72', 'S', '23505-imagem_bot_conta.jpg', 'masculino ', '1998-07-16', '11PQ', '', ''),
(158, 'Xpto829', 'Xpto829@xpto.com', 'Xpto829', 'a701ba98ad6c0a1ca05519bd74f1a827', 'S', '98694-imagem_bot_conta.jpg', 'masculino ', '2008-08-25', '10PP', '', ''),
(159, 'Xpto915', 'Xpto915@xpto.com', 'Xpto915', 'dbd1c37f13a046c294d2fbcc51c4aec0', 'S', '38008-imagem_bot_conta.jpg', 'masculino ', '1984-05-16', '10PQ', '', ''),
(160, 'Xpto245', 'Xpto245@xpto.com', 'Xpto245', '8a53b2f1565b20d50354bde986fce1f6', 'S', '79941-imagem_bot_conta.jpg', 'masculino ', '2008-09-22', '11PP', '', ''),
(161, 'Xpto399', 'Xpto399@xpto.com', 'Xpto399', 'd678820047e1458ea3fac47547225239', 'S', '72725-imagem_bot_conta.jpg', 'masculino ', '1998-04-06', '10PQ', '', ''),
(162, 'Xpto628', 'Xpto628@xpto.com', 'Xpto628', 'cc98c98057015a355d78e4598c5e220c', 'S', '23130-imagem_bot_conta.jpg', 'masculino ', '1986-06-15', '11PP', '', ''),
(163, 'Xpto637', 'Xpto637@xpto.com', 'Xpto637', 'cf7627a1bde19c38f491810794868447', 'S', '27284-imagem_bot_conta.jpg', 'masculino ', '1986-11-11', '10PP', '', ''),
(164, 'Xpto156', 'Xpto156@xpto.com', 'Xpto156', '0752e33c691089db3c439afa1f00f7e1', 'S', '3021-imagem_bot_conta.jpg', 'masculino ', '1991-09-06', '10PE', '', ''),
(165, 'Xpto157', 'Xpto157@xpto.com', 'Xpto157', 'ef54eb5bc0ab9ac652ad7723b570fa1f', 'S', '5377-imagem_bot_conta.jpg', 'masculino ', '2018-04-02', '10PP', '', ''),
(166, 'Xpto207', 'Xpto207@xpto.com', 'Xpto207', '09113080ffb33826dfc368ad582560b7', 'N', '7168-imagem_bot_conta.jpg', 'masculino ', '1997-09-27', '11PD', '', ''),
(167, 'Xpto50', 'Xpto50@xpto.com', 'Xpto50', 'ebead50db97ad852a165462df108f5b9', 'N', '21415-imagem_bot_conta.jpg', 'masculino ', '2014-09-09', '10PQ', '', ''),
(168, 'Xpto258', 'Xpto258@xpto.com', 'Xpto258', '30f62c2a26745e3bc1b8b8078e73e595', 'N', '85433-imagem_bot_conta.jpg', 'masculino ', '2011-11-18', '11PI', '', ''),
(169, 'Xpto100', 'Xpto100@xpto.com', 'Xpto100', '6ab48d6e5da0f0adb9a02c9d77cb9f67', 'S', '91418-imagem_bot_conta.jpg', 'masculino ', '1987-01-17', '11PD', '', ''),
(170, 'Xpto193', 'Xpto193@xpto.com', 'Xpto193', '5d5e69bb826fd2b48110a0ecf777f9e7', 'N', '21421-imagem_bot_conta.jpg', 'masculino ', '2015-10-26', '10PP', '', ''),
(171, 'Xpto1005', 'Xpto1005@xpto.com', 'Xpto1005', '41ca25b60e8ff86ac8c80a3ba22c6a8e', 'S', '16824-imagem_bot_conta.jpg', 'masculino ', '2009-06-21', '11PP', '', ''),
(172, 'caio MM', 'mm@gmail.com', 'Mm123@', 'b0c0eee864220e31df6e60530a087ef2', 'S', '54133-a.png', 'masculino', '2021-04-13', '11PQ', '', ''),
(173, 'Xpto799', 'Xpto799@xpto.com', 'Xpto799', 'ef6b27bb567f7965cb72b213ae490020', 'S', '29281-imagem_bot_conta.jpg', 'masculino ', '1985-02-07', '12PE', '', ''),
(174, 'Xpto77', 'Xpto77@xpto.com', 'Xpto77', '2e55775ffab1a246d8c3bca3be8dbd47', 'S', '44750-imagem_bot_conta.jpg', 'masculino ', '2003-02-03', '11PI', '', ''),
(175, 'Xpto662', 'Xpto662@xpto.com', 'Xpto662', '184f66e5df6705c5fb1d65441608db52', 'S', '25467-imagem_bot_conta.jpg', 'masculino ', '2009-01-05', '12PE', '', ''),
(176, 'Xpto13', 'Xpto13@xpto.com', 'Xpto13', '010105bf2c7996b1e28da1bac64913df', 'S', '18222-imagem_bot_conta.jpg', 'masculino ', '1993-07-04', '11PD', '', ''),
(177, 'Arthur Aguiar', 'tutu@gmail.com', 'Tutu190', '357a1eeeacaf55692826bf3de6fd08d4', 'S', '67650-img3 ahahahah.jpeg', 'masculino', '2021-04-21', '10PQ', '', ''),
(178, 'testeCaralho', 'teste@teste.com', 'Teste190@', '36924c298f2176c55166976d2b8807b7', 'S', 'default.jpg', 'masculino', '2021-04-14', '11PP', '', ''),
(180, 'ANt Fa', 'ant@gmail.com', 'User190@', 'b0c0eee864220e31df6e60530a087ef2', 'S', '48111-sad-frog-gang2.jpg', 'masculino', '0000-00-00', '11PP', '*****', ''),
(181, 'Ze augusto da Jocilene', 'ze@cachorro.au', 'Osso190@', 'b0c0eee864220e31df6e60530a087ef2', 'S', '20364-sad-frog.jpg', 'masculino', '1616-12-16', '12PI', '*****', ''),
(184, 'conta teste', 'teste@email.com', 'Conta123', 'b0c0eee864220e31df6e60530a087ef2', 'S', 'default.jpg', 'masculino', '0000-00-00', '11PQ', '*****', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id_mensagens` int(10) NOT NULL,
  `mensagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id_mensagens`, `mensagem`) VALUES
(1, '48381TioSam190');

-- --------------------------------------------------------

--
-- Estrutura da tabela `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` int(11) NOT NULL,
  `1` varchar(30) NOT NULL,
  `2` varchar(30) NOT NULL,
  `3` varchar(30) NOT NULL,
  `4` varchar(30) NOT NULL,
  `5` varchar(30) NOT NULL,
  `6` varchar(30) NOT NULL,
  `7` varchar(30) NOT NULL,
  `8` varchar(30) NOT NULL,
  `weekDay` varchar(25) NOT NULL,
  `id_Turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `weekDay`, `id_Turma`) VALUES
(1, '', 'FQ', 'AI ING', 'AI', 'LUNCH', 'MAT', 'ING', '@MAT', 'monday', 3),
(2, '@POR', 'MAT', 'POR', 'LUNCH', 'AI', 'FQ', 'Arc.C.T2 PSI.T1', 'Arc.C.T1 PSI.T2', 'tuesday', 3),
(3, 'FQ', 'ING', 'PSI.T1 RC.T2', 'PSI.T2 RC.T1', 'LUNCH', 'PSI.T2 SO', 'PSI.T1 RC', '', 'WEDNESDAY', 3),
(4, 'ING', 'MAT', 'POR', 'LUNCH', 'Arc.C.T2 PSI.T1', 'PSI.T1 RC.T2', 'Arc.C.T2 PSI.T1', 'PSI.T1 RC.T2', 'THURSDAY', 3),
(5, 'MAT', 'FQ', 'AI', 'AI', 'LUNCH', 'RC', 'RC', '', 'MONDAY', 4),
(6, 'PSI', 'PSI', 'POR', 'RC', 'LUNCH', 'FQ', 'Arc.C', 'Arc.C', 'TUESDAY', 4),
(7, 'PSI', 'PSI', 'ING', 'FQ', 'LUNCH', 'AI', 'RC', '', 'WEDNESDAY', 4),
(8, 'AI', 'MAT', 'POR', 'LUNCH', 'PSI', 'Arc.C', 'ING', 'ING', 'THURSDAY', 4),
(9, 'POR', 'RC', 'EF', 'MAT', 'LUNCH', 'PSI', 'PSI', 'EF', 'FRIDAY', 4),
(15, ' IMEI.T1 SDAC.t2', ' IMEI.T1 ELE.F.t2', 'IMEI.T2 SOAC.T1', 'IMEI.T2 SIDAC.T1', 'LUNCH', '', '', '', 'MONDAY', 8),
(16, 'MAT', 'PLMN POR', 'A.PAP.A) A.PAP.B) A.PAP.C)', 'LUNCH', 'CD.T2 SDAC.T1', 'CD.T2 ELE.F.T2 SDAC.T1', 'CD.T1 SDAC.T2', 'CD.T1 ELE.F.T1 SDAC.T2', 'TUESDAY', 8),
(17, 'IMEI.T2 SDAC.T1', 'IMEI.T1 SDAC.T2', 'MAT', 'PLNM POR', 'LUNCH', 'CD.T2 ELE.F.T1', 'CD.T1 ELE.F.T2', '', 'WEDNESDAY', 8),
(18, 'PLNM POR', 'ELE.F.T2 SDAC.T1', 'CD.T1 ELE.F.T2', 'CD.T1 ELE.F.T2', 'CD.T1 SDAC.T2', 'LUNCH', 'MAT', 'CD.T2 ELE.F.T1', 'THURSDAY', 8),
(19, 'EF', 'EF', 'PLNM POR', 'MAT', 'LUNCH', '@MAT', '', '', 'FRIDAY', 8),
(20, 'SD', 'AC', 'AC', 'MAT', 'LUNCH', 'EE', 'EF', 'EF', 'MONDAY', 17),
(21, 'MAT', 'PLNM POR', 'EE', 'AC SD', 'LUNCH', 'EE', 'TA', 'TA', 'TUESDAY', 17),
(22, 'EE', 'MAT', 'MAT', 'PLNM POR', 'LUNCH', 'SD', 'SD', '', 'WEDNESDAY', 17),
(23, 'PLNM POR', 'AC', 'AC', 'A.PAP.A) A.PAP.B) A.PAP.C)', 'LUNCH', 'TA', 'TA', '', '', 17),
(24, 'AC', 'AC', 'PLNM POR', 'MAT PLNM POR', 'LUNCH', '@POR', '', '', 'FRIDAY', 17),
(25, 'POR PLNM', 'RC', 'SO', 'MAT', 'LUNCH', 'PSI', 'PSI', 'EF', 'FRIDAY', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id_Turma` int(11) NOT NULL,
  `nome_Turma` varchar(60) NOT NULL,
  `sigla_Turma` varchar(5) NOT NULL,
  `resumo` varchar(1000) NOT NULL,
  `ano_Turma` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_Turma`, `nome_Turma`, `sigla_Turma`, `resumo`, `ano_Turma`) VALUES
(3, '10 - Programacao', '10PP', 'Turma de decimo ano com foco voltado para a parte logica do computador e para a programacao, tendo ao final do curso uma boa base para a faculdade.', 10),
(4, '11 - Programacao', '11PP', 'Turma de decimo primeiro ano com foco voltado para a parte logica do computador e para a programacao, tendo ao final do curso uma boa base para a faculdade.', 11),
(7, '11 - Informatica', '11PI', 'Turma de decimo primeiro ano com foco voltada para a parte fisica do computadordo computador ou tambem conhecida como hardware, tendo uma boa base para a faculdade e muita pratica para ja estar preparado para o mercado de trabalho.', 11),
(8, '12 - Informatica', '12PI', 'Turma de decimo segundo ano com foco voltada para a parte física do computadordo computador ou tambem conhecida como hardware, tendo uma boa base para a faculdade e muita prática para ja estar preparado para o mercado de trabalho.', 12),
(14, '10 - Quimica', '10PQ', 'Turma voltada mais para a ciencia, sendo mais expecifico, quimica, abordando assuntos atuais de laboratorios para bom desempenho ao sair do curso', 10),
(15, '11 - Quimica', '11PQ', 'Turma voltada mais para a ciencia, sendo mais expecifico, quimica, abordando assuntos atuais de laboratorios para bom desempenho ao sair do curso', 11),
(16, '10 - Eletrecidade', '10PE', 'Turmacom foco voltado mais para trabalhos mais arduos, mexendo com eletrecidade de alta tensao, saindo ja um profissional com muitas tecnicas e dicas vinda da ESFB', 10),
(17, '12 - Eletrecidade', '12PE', 'Turma com foco voltado mais para trabalhos mais arduos, mexendo com eletrecidade de alta tensao, saindo ja um profissional com muitas tecnicas e dicas vinda da ESFB', 12),
(18, '11 - Desporto', '11PD', 'Curso muito concorrido na nossa Escola, exigindo muito esforco, e coragem para enfrentar novos desafios e rotinas intensas, podendo ser um atleta, professor de EF, treinador e muito mais, com esse curso voce escolhe o seu futuro na area', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `userimagem`
--

CREATE TABLE `userimagem` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `imagecam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`);

--
-- Índices para tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id_mensagens`);

--
-- Índices para tabela `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`),
  ADD KEY `id_Turma` (`id_Turma`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_Turma`);

--
-- Índices para tabela `userimagem`
--
ALTER TABLE `userimagem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id_mensagens` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de tabela `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id_Turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `userimagem`
--
ALTER TABLE `userimagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`id_Turma`) REFERENCES `turma` (`id_Turma`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
