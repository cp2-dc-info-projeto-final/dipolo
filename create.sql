-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30-Nov-2021 às 01:55
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
  `cod_comentario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `postagens`
--

INSERT INTO `postagens` (`cod_postagem`, `texto_post`, `cod_usuario`, `cod_comentario`) VALUES
(1, 'hello', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `timeline`
--

CREATE TABLE `timeline` (
  `cod_usuario` int(11) NOT NULL,
  `cod_postagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `timeline`
--

INSERT INTO `timeline` (`cod_usuario`, `cod_postagem`) VALUES
(1, 1);

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
  MODIFY `cod_postagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
--
-- Banco de dados: `ExemploDB`
--
DROP DATABASE IF EXISTS `ExemploDB`;
CREATE DATABASE IF NOT EXISTS `ExemploDB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `ExemploDB`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Categoria`
--

CREATE TABLE `Categoria` (
  `CodCat` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Salario` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `Categoria`
--

INSERT INTO `Categoria` (`CodCat`, `Salario`) VALUES
('A1', 5775),
('A2', 5775),
('B1', 5500);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Empregado`
--

CREATE TABLE `Empregado` (
  `CodEmp` int(11) NOT NULL,
  `Nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CodCat` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `Empregado`
--

INSERT INTO `Empregado` (`CodEmp`, `Nome`, `CodCat`) VALUES
(7, 'Roberto da Silva Junior', 'A1'),
(9, 'Roberto', 'B1'),
(10, 'Roberta', 'B1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Projeto`
--

CREATE TABLE `Projeto` (
  `CodProj` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tipo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descricao` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `Projeto`
--

INSERT INTO `Projeto` (`CodProj`, `Tipo`, `Descricao`) VALUES
('RJSPMG', 'Manutenção', 'Um bom projeto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ProjetoEmpregado`
--

CREATE TABLE `ProjetoEmpregado` (
  `CodProj` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CodEmp` int(11) NOT NULL,
  `DataInicio` date DEFAULT NULL,
  `TempoAlocado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ProjetoEmpregado`
--

INSERT INTO `ProjetoEmpregado` (`CodProj`, `CodEmp`, `DataInicio`, `TempoAlocado`) VALUES
('RJSPMG', 7, '2012-12-21', 10);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`CodCat`);

--
-- Índices para tabela `Empregado`
--
ALTER TABLE `Empregado`
  ADD PRIMARY KEY (`CodEmp`),
  ADD KEY `CodCat` (`CodCat`);

--
-- Índices para tabela `Projeto`
--
ALTER TABLE `Projeto`
  ADD PRIMARY KEY (`CodProj`);

--
-- Índices para tabela `ProjetoEmpregado`
--
ALTER TABLE `ProjetoEmpregado`
  ADD PRIMARY KEY (`CodProj`,`CodEmp`),
  ADD KEY `CodEmp` (`CodEmp`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `Empregado`
--
ALTER TABLE `Empregado`
  ADD CONSTRAINT `Empregado_ibfk_1` FOREIGN KEY (`CodCat`) REFERENCES `Categoria` (`CodCat`);

--
-- Limitadores para a tabela `ProjetoEmpregado`
--
ALTER TABLE `ProjetoEmpregado`
  ADD CONSTRAINT `ProjetoEmpregado_ibfk_1` FOREIGN KEY (`CodProj`) REFERENCES `Projeto` (`CodProj`),
  ADD CONSTRAINT `ProjetoEmpregado_ibfk_2` FOREIGN KEY (`CodEmp`) REFERENCES `Empregado` (`CodEmp`);
--
-- Banco de dados: `Exemplodb`
--
DROP DATABASE IF EXISTS `Exemplodb`;
CREATE DATABASE IF NOT EXISTS `Exemplodb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `Exemplodb`;
--
-- Banco de dados: `MaxCurso`
--
DROP DATABASE IF EXISTS `MaxCurso`;
CREATE DATABASE IF NOT EXISTS `MaxCurso` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `MaxCurso`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Aluno`
--

CREATE TABLE `Aluno` (
  `CPF` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Endereco` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telefone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DataNasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Curso`
--

CREATE TABLE `Curso` (
  `Codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Credito` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `Curso`
--

INSERT INTO `Curso` (`Codigo`, `Nome`, `Credito`) VALUES
('AD', 'Administração', 8),
('DS', 'Desenvolvimento de Sistemas', 8),
('EM', 'Enfermagem', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Inscricao`
--

CREATE TABLE `Inscricao` (
  `CPF_Aluno` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cod_Curso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Aluno`
--
ALTER TABLE `Aluno`
  ADD PRIMARY KEY (`CPF`);

--
-- Índices para tabela `Curso`
--
ALTER TABLE `Curso`
  ADD PRIMARY KEY (`Codigo`);

--
-- Índices para tabela `Inscricao`
--
ALTER TABLE `Inscricao`
  ADD PRIMARY KEY (`CPF_Aluno`,`Cod_Curso`),
  ADD KEY `Cod_Curso` (`Cod_Curso`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `Inscricao`
--
ALTER TABLE `Inscricao`
  ADD CONSTRAINT `Inscricao_ibfk_1` FOREIGN KEY (`CPF_Aluno`) REFERENCES `Aluno` (`CPF`),
  ADD CONSTRAINT `Inscricao_ibfk_2` FOREIGN KEY (`Cod_Curso`) REFERENCES `Curso` (`Codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
