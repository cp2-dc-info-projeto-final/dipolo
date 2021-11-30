-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30-Nov-2021 às 00:22
-- Versão do servidor: 10.6.5-MariaDB
-- versão do PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dipolotcc`
--
DROP DATABASE IF EXISTS `dipolotcc`;
CREATE DATABASE IF NOT EXISTS `dipolotcc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `dipolotcc`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `cod_comentario` int(11) NOT NULL,
  `texto_coment` varchar(350) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_postagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagens`
--

CREATE TABLE `postagens` (
  `cod_postagem` int(11) NOT NULL,
  `texto_post` varchar(350) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_comentario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `timeline`
--

CREATE TABLE `timeline` (
  `cod_usuario` int(11) NOT NULL,
  `cod_postagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usuario` int(11) NOT NULL,
  `nickname` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datanasc` date NOT NULL,
  `email` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod_usuario`, `nickname`, `nome`, `datanasc`, `email`, `senha`, `adm`) VALUES
(1, 'testadm', 'Usuário Admin', '2021-11-29', 'email@example.com', '$2y$10$hDGwTyvP.tJGbShpjv4KyOEyIqlq3ERpuDbWZ94Qmfv2QgtAKU2PS', 1),
(2, 'test1', 'Usuário Comum', '2021-11-29', 'email@example.com', '$2y$10$5QotISSBV9FxJjH2bHlFLO9Z1C0S2UUKLurv3z53uN7hdMghUm7Ee', 0),
(3, 'test2', 'Usuário Comum II', '2021-11-29', 'email@example.com', '$2y$10$j00Rut4fH7MDoyYU.oELIe6zXNeSelpgjBaz8eowSm1LJU1MKg9HO', 0),
(4, 'test3', 'Usuário Comum III', '2021-11-29', 'email@example.com', '$2y$10$WAOVO2Lb6XcFQQFH4HqUWO6WyODkJewKEv44KoOgYbpJXcnr5tNfO', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`cod_comentario`),
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `cod_postagem` (`cod_postagem`);

--
-- Índices para tabela `postagens`
--
ALTER TABLE `postagens`
  ADD PRIMARY KEY (`cod_postagem`),
  ADD KEY `cod_usuario` (`cod_usuario`),
  ADD KEY `cod_comentario` (`cod_comentario`);

--
-- Índices para tabela `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`cod_usuario`,`cod_postagem`),
  ADD KEY `cod_postagem` (`cod_postagem`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `cod_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `postagens`
--
ALTER TABLE `postagens`
  MODIFY `cod_postagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuarios` (`cod_usuario`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`cod_postagem`) REFERENCES `postagens` (`cod_postagem`);

--
-- Limitadores para a tabela `postagens`
--
ALTER TABLE `postagens`
  ADD CONSTRAINT `postagens_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuarios` (`cod_usuario`),
  ADD CONSTRAINT `postagens_ibfk_2` FOREIGN KEY (`cod_comentario`) REFERENCES `comentarios` (`cod_comentario`);

--
-- Limitadores para a tabela `timeline`
--
ALTER TABLE `timeline`
  ADD CONSTRAINT `timeline_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuarios` (`cod_usuario`),
  ADD CONSTRAINT `timeline_ibfk_2` FOREIGN KEY (`cod_postagem`) REFERENCES `postagens` (`cod_postagem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
