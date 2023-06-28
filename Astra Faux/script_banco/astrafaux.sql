-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Jun-2023 às 22:00
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

CREATE TABLE IF NOT EXISTS `adm` (
  `username` varchar(5) NOT NULL,
  `senha` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`username`)
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

CREATE TABLE IF NOT EXISTS `novidade` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Produto_id` int(10) UNSIGNED NOT NULL,
  `data_de_publicacao` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Produto_id` (`Produto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) DEFAULT NULL,
  `qtd` int(5) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `valor` decimal(6,2) DEFAULT NULL,
  `caminho_da_img` varchar (50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) DEFAULT NULL,
  `senha` varchar(10) DEFAULT NULL,
  `data_de_nascimento` date DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `endereco` varchar(40) DEFAULT NULL,
  `complemento` varchar(15) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `novidade`
--
ALTER TABLE `novidade`
  ADD CONSTRAINT `novidade_ibfk_1` FOREIGN KEY (`Produto_id`) REFERENCES `produto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
