-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Fev-2021 às 17:25
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `galeria_redes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `img_produtos`
--

CREATE TABLE `img_produtos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `nome` text DEFAULT NULL,
  `capa` int(11) DEFAULT 0,
  `id_usuario_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelos`
--

CREATE TABLE `modelos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `ativo` int(11) DEFAULT 1,
  `id_usuario` int(11) DEFAULT NULL,
  `id_usuario_cadastrou` int(11) DEFAULT NULL,
  `id_usuario_alterou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `tamanho_tecido` varchar(12) DEFAULT NULL,
  `tamanho_total` varchar(12) DEFAULT NULL,
  `punho` varchar(20) DEFAULT NULL,
  `borda` varchar(20) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `peso` varchar(20) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_usuario_cadastrou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `sobrenome` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `img_user` varchar(50) DEFAULT 'foto.png',
  `permissao` varchar(50) DEFAULT 'admin',
  `nome_exibicao` varchar(50) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `zap` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `uso` varchar(50) DEFAULT NULL,
  `logo` varchar(50) DEFAULT 'foto.png',
  `token` varchar(100) DEFAULT NULL,
  `id_usuario_principal` int(11) DEFAULT NULL,
  `id_usuario_cadastrou` int(11) DEFAULT NULL,
  `ativo` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `img_produtos`
--
ALTER TABLE `img_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `img_produtos`
--
ALTER TABLE `img_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
