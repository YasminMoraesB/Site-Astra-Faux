-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jul-2023 às 23:35
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `astrafaux`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `username` varchar(5) NOT NULL,
  `senha` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`username`, `senha`) VALUES
('adm', 'adm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `novidade`
--

CREATE TABLE `novidade` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_da_publicacao` date DEFAULT NULL,
  `titulo` varchar(25) NOT NULL,
  `autor` varchar(20) NOT NULL,
  `texto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `qtd` int(5) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `valor` decimal(6,2) DEFAULT NULL,
  `caminho_da_img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `senha` varchar(61) DEFAULT NULL,
  `data_de_nascimento` date DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `endereco` varchar(40) DEFAULT NULL,
  `complemento` varchar(15) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`, `data_de_nascimento`, `email`, `endereco`, `complemento`, `cidade`, `estado`, `cep`) VALUES
(10, 'Braum', '$2y$10$4jTMRSLtLim72vpol6sBu.eFSNgw6E57PGqHfpaMBoLidCGOYpwMS', '1982-06-22', 'braum@gmail.com', 'Rua do braum, 95', 'Caverna', 'Freujorge', 'ES', '11111-222'),
(11, 'Buzz Lighyear', '$2y$10$BP1oY8O6KpPLa9JWIRJa1ul4ic1tPtgkNu7oitADrhANBrVeUc/om', '2000-02-22', 'buzz@gmail.com', 'Rua do Andy, 30', 'Casa', 'Orlando', 'SE', '11111-222'),
(12, 'Lux', '$2y$10$j/x4Y6YfcXiWH3FQe2rD/O/bg1f7nxdub0zmI41for1rIRtJTKhL2', '1999-04-08', 'lux@gmail.com', 'Rua de Demacia, 55', 'Apartamento', 'Demacia', 'RN', '04864-101'),
(13, 'Sova', '$2y$10$P.s8w4pWnveg2yrRJ8u0le8szQM0CEdBoY4Mr9MsipF3DvsZO1226', '1990-08-20', 'sova@gmail.com', 'Rua do Sova, 44', 'Casa', 'Russia', 'RJ', '04864-250'),
(14, 'Deadlock', '$2y$10$HOyCVb1Y65OK5r7sRuZGJ.iMHpx2.6U0M8tZGA6ZgnaPpImhpS3da', '2003-07-02', 'dead@gmail.com', 'Rua da Dead, 89', 'Bloco 2', 'Canada', 'ES', '04864-101');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `novidade`
--
ALTER TABLE `novidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `novidade`
--
ALTER TABLE `novidade`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
