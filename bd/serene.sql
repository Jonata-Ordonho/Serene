-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/08/2025 às 21:21
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `serene`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `colaboradores`
--

CREATE TABLE `colaboradores` (
  `colaborador_id` int(10) UNSIGNED NOT NULL,
  `colaborador_setor_id` smallint(5) UNSIGNED NOT NULL,
  `colaborador_nome` varchar(255) NOT NULL,
  `colaborador_email` varchar(255) NOT NULL,
  `colaborador_cpf` char(11) NOT NULL,
  `colaborador_funcao` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `colaboradores`
--

INSERT INTO `colaboradores` (`colaborador_id`, `colaborador_setor_id`, `colaborador_nome`, `colaborador_email`, `colaborador_cpf`, `colaborador_funcao`) VALUES
(1, 1, 'Jorge Paulo', 'jonata@unirios.edu.br', '07316223596', 'Estagiario'),
(2, 1, 'Ana Clara', 'ana.clara@empresa.com', '12345678901', 'Analista de RH'),
(3, 1, 'Bruno Silva', 'bruno.silva@empresa.com', '12345678902', 'Coordenador de RH'),
(4, 2, 'Carlos Eduardo', 'carlos.edu@empresa.com', '12345678903', 'Desenvolvedor'),
(5, 2, 'Daniela Souza', 'daniela.souza@empresa.com', '12345678904', 'Analista de Sistemas'),
(6, 3, 'Fernanda Lima', 'fernanda.lima@empresa.com', '12345678905', 'Assistente Financeiro'),
(7, 3, 'Gabriel Rocha', 'gabriel.rocha@empresa.com', '12345678906', 'Contador'),
(8, 4, 'Helena Martins', 'helena.martins@empresa.com', '12345678907', 'Analista de Marketing'),
(9, 4, 'Igor Santos', 'igor.santos@empresa.com', '12345678908', 'Designer'),
(10, 5, 'Juliana Alves', 'juliana.alves@empresa.com', '12345678909', 'Supervisor de Operações'),
(11, 5, 'Lucas Pereira', 'lucas.pereira@empresa.com', '12345678910', 'Auxiliar de Operações'),
(12, 1, 'Jorge Paulo', 'jonata.murdoc@gmail.com', '07316223596', 'Estagiario');

-- --------------------------------------------------------

--
-- Estrutura para tabela `respostas`
--

CREATE TABLE `respostas` (
  `resposta_id` int(10) UNSIGNED NOT NULL,
  `resposta_data_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `resposta_colaborador_id` int(10) UNSIGNED NOT NULL,
  `resposta_questao_1` smallint(5) UNSIGNED NOT NULL,
  `resposta_questao_2` smallint(6) NOT NULL,
  `resposta_questao_3` smallint(6) NOT NULL,
  `resposta_questao_4` smallint(6) NOT NULL,
  `resposta_questao_5` smallint(6) NOT NULL,
  `resposta_questao_observacao` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `respostas`
--

INSERT INTO `respostas` (`resposta_id`, `resposta_data_registro`, `resposta_colaborador_id`, `resposta_questao_1`, `resposta_questao_2`, `resposta_questao_3`, `resposta_questao_4`, `resposta_questao_5`, `resposta_questao_observacao`) VALUES
(1, '2025-07-26 18:11:55', 1, 2, 4, 2, 3, 2, 'teste'),
(2, '2025-07-01 12:15:00', 2, 4, 5, 3, 4, 5, 'Muito bom'),
(3, '2025-07-02 13:30:00', 3, 3, 4, 2, 5, 4, 'Pode melhorar'),
(4, '2025-07-03 17:10:00', 4, 5, 5, 5, 5, 5, 'Excelente'),
(5, '2025-07-04 19:25:00', 5, 2, 3, 4, 2, 3, 'Regular'),
(6, '2025-07-05 14:40:00', 5, 3, 3, 3, 4, 2, 'Atendeu'),
(7, '2025-07-06 11:55:00', 3, 5, 4, 5, 5, 4, 'Muito produtivo'),
(8, '2025-07-07 18:20:00', 2, 4, 4, 3, 3, 4, 'Bom desempenho'),
(9, '2025-07-08 15:45:00', 5, 3, 2, 3, 2, 3, 'Pode ser melhorado'),
(10, '2025-07-09 12:50:00', 5, 5, 5, 4, 5, 5, 'Ótimo'),
(11, '2025-07-10 13:15:00', 2, 2, 3, 2, 3, 2, 'Razoável'),
(12, '2025-07-11 17:40:00', 7, 4, 4, 5, 4, 5, 'Boa evolução'),
(13, '2025-07-12 19:00:00', 6, 5, 3, 4, 5, 4, 'Gostei muito'),
(14, '2025-07-13 12:35:00', 5, 3, 2, 3, 2, 3, 'Precisa melhorar'),
(15, '2025-07-14 14:10:00', 6, 4, 4, 4, 4, 4, 'Tudo certo'),
(16, '2025-07-15 16:25:00', 3, 5, 5, 5, 4, 5, 'Excelente desempenho'),
(17, '2025-07-16 18:50:00', 2, 2, 2, 3, 2, 3, 'Abaixo da média'),
(18, '2025-07-17 13:05:00', 5, 4, 5, 4, 5, 5, 'Bom trabalho'),
(19, '2025-07-18 17:30:00', 7, 3, 3, 3, 4, 3, 'Ok'),
(20, '2025-07-19 12:20:00', 2, 5, 5, 5, 5, 5, 'Muito bom mesmo'),
(21, '2025-07-20 15:10:00', 3, 4, 4, 3, 4, 3, 'Legal'),
(22, '2025-07-21 19:40:00', 4, 3, 3, 2, 3, 2, 'Mais ou menos'),
(23, '2025-07-22 14:15:00', 5, 4, 5, 4, 4, 5, 'Bom resultado'),
(24, '2025-07-23 11:55:00', 5, 5, 4, 5, 5, 5, 'Ótimo atendimento'),
(25, '2025-07-24 16:35:00', 3, 2, 3, 2, 2, 3, 'Precisa melhorar muito'),
(26, '2025-07-25 13:50:00', 8, 4, 4, 5, 4, 5, 'Muito bom'),
(27, '2025-07-26 17:05:00', 9, 3, 2, 3, 3, 2, 'Mediano'),
(28, '2025-07-27 12:45:00', 10, 5, 5, 5, 5, 5, 'Perfeito'),
(29, '2025-07-28 15:20:00', 2, 3, 3, 3, 4, 4, 'Na média'),
(30, '2025-07-29 18:55:00', 3, 4, 5, 4, 5, 4, 'Bom desempenho'),
(31, '2025-07-30 14:05:00', 4, 5, 5, 5, 5, 5, 'Excelente de novo'),
(32, '2025-07-01 11:45:00', 2, 3, 4, 2, 5, 3, 'Bom início de mês'),
(33, '2025-07-01 17:10:00', 3, 5, 5, 4, 4, 5, 'Excelente dia'),
(34, '2025-07-02 13:20:00', 4, 2, 3, 2, 3, 2, 'Razoável'),
(35, '2025-07-02 19:35:00', 5, 4, 4, 5, 5, 4, 'Boa performance'),
(36, '2025-07-03 12:15:00', 5, 3, 2, 4, 3, 2, 'Ok'),
(37, '2025-07-03 16:25:00', 4, 5, 4, 5, 5, 5, 'Muito bom'),
(38, '2025-07-04 14:05:00', 3, 2, 2, 3, 2, 2, 'Fraco'),
(39, '2025-07-04 18:50:00', 2, 4, 5, 4, 4, 5, 'Bom resultado'),
(40, '2025-07-05 11:30:00', 6, 3, 3, 3, 4, 3, 'Regular'),
(41, '2025-07-05 17:55:00', 2, 5, 5, 5, 5, 4, 'Excelente'),
(42, '2025-07-06 12:40:00', 3, 2, 3, 2, 2, 3, 'Precisa melhorar'),
(43, '2025-07-06 19:10:00', 4, 4, 4, 5, 4, 5, 'Gostei'),
(44, '2025-07-07 13:05:00', 5, 3, 3, 3, 3, 3, 'Na média'),
(45, '2025-07-07 15:25:00', 5, 5, 4, 5, 5, 5, 'Ótimo trabalho'),
(46, '2025-07-08 11:50:00', 4, 2, 2, 2, 3, 2, 'Fraco desempenho'),
(47, '2025-07-08 18:40:00', 3, 4, 4, 4, 4, 5, 'Bom dia'),
(48, '2025-07-09 12:30:00', 2, 3, 2, 3, 2, 3, 'Mediano'),
(49, '2025-07-09 16:20:00', 1, 5, 5, 5, 4, 5, 'Perfeito'),
(50, '2025-07-10 13:15:00', 2, 2, 3, 2, 3, 2, 'Regular'),
(51, '2025-07-10 17:55:00', 3, 4, 4, 4, 5, 4, 'Boa evolução'),
(52, '2025-07-11 14:40:00', 4, 5, 4, 5, 5, 5, 'Muito produtivo'),
(53, '2025-07-11 19:05:00', 5, 3, 3, 3, 2, 3, 'Mais ou menos'),
(54, '2025-07-12 11:25:00', 5, 4, 5, 4, 4, 5, 'Bom desempenho'),
(55, '2025-07-12 18:15:00', 4, 2, 3, 2, 2, 2, 'Pode melhorar'),
(56, '2025-07-13 12:55:00', 3, 5, 5, 5, 5, 5, 'Excelente'),
(57, '2025-07-13 15:40:00', 2, 3, 2, 3, 3, 2, 'Mediano'),
(58, '2025-07-14 11:30:00', 1, 4, 4, 5, 4, 4, 'Bom'),
(59, '2025-07-14 16:50:00', 2, 5, 5, 4, 5, 5, 'Ótimo'),
(60, '2025-07-15 14:25:00', 3, 2, 2, 3, 2, 2, 'Razoável'),
(61, '2025-07-15 19:00:00', 4, 4, 4, 5, 5, 4, 'Gostei muito'),
(62, '2025-07-16 12:15:00', 5, 3, 3, 2, 3, 3, 'Na média'),
(63, '2025-07-16 17:45:00', 5, 5, 5, 5, 5, 5, 'Excelente'),
(64, '2025-07-17 13:10:00', 4, 2, 3, 2, 3, 2, 'Precisa melhorar'),
(65, '2025-07-17 15:30:00', 3, 4, 4, 4, 4, 5, 'Bom resultado'),
(66, '2025-07-18 12:40:00', 2, 3, 2, 3, 2, 2, 'Mais ou menos'),
(67, '2025-07-18 18:20:00', 1, 5, 5, 5, 5, 5, 'Perfeito'),
(68, '2025-07-19 11:55:00', 2, 3, 4, 3, 4, 3, 'Ok'),
(69, '2025-07-19 17:15:00', 3, 4, 5, 4, 5, 5, 'Muito bom'),
(70, '2025-07-20 14:35:00', 4, 5, 5, 5, 5, 5, 'Excelente dia'),
(71, '2025-08-27 14:08:22', 1, 2, 4, 5, 2, 3, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `setores`
--

CREATE TABLE `setores` (
  `setor_id` int(5) UNSIGNED NOT NULL,
  `setor_nome` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `setores`
--

INSERT INTO `setores` (`setor_id`, `setor_nome`) VALUES
(1, 'Recursos Humanos'),
(2, 'Tecnologia da Informação'),
(3, 'Financeiro'),
(4, 'Marketing'),
(5, 'Operações');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` smallint(5) UNSIGNED NOT NULL,
  `usuario_email` varchar(255) NOT NULL,
  `usuario_senha` char(40) NOT NULL,
  `usuario_data_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_nome` varchar(255) NOT NULL,
  `usuario_status` enum('ativo','inativo') NOT NULL DEFAULT 'ativo'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_email`, `usuario_senha`, `usuario_data_registro`, `usuario_nome`, `usuario_status`) VALUES
(1, 'admin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2025-08-27 14:31:40', 'admin', 'ativo');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`colaborador_id`);

--
-- Índices de tabela `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`resposta_id`);

--
-- Índices de tabela `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`setor_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `colaborador_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `respostas`
--
ALTER TABLE `respostas`
  MODIFY `resposta_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de tabela `setores`
--
ALTER TABLE `setores`
  MODIFY `setor_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
