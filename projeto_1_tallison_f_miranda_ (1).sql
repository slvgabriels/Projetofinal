-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/11/2025 às 16:58
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_1_tallison_f_miranda_`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogadores`
--

CREATE TABLE `jogadores` (
  `id` int(11) NOT NULL,
  `jogador` varchar(150) NOT NULL,
  `personagem` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `jogadores`
--

INSERT INTO `jogadores` (`id`, `jogador`, `personagem`) VALUES
(3, 'Emily', 'Venus'),
(4, 'Luana', 'Lucinda'),
(5, 'Geovana', 'Zara');

-- --------------------------------------------------------

--
-- Estrutura para tabela `personagens`
--

CREATE TABLE `personagens` (
  `id` int(11) NOT NULL,
  `personagem` varchar(150) NOT NULL,
  `jogador` varchar(150) NOT NULL,
  `especie` varchar(100) NOT NULL,
  `classe` varchar(100) NOT NULL,
  `subclasse` varchar(100) DEFAULT NULL,
  `forca` int(50) NOT NULL,
  `destreza` int(50) NOT NULL,
  `constituicao` int(50) NOT NULL,
  `inteligencia` int(50) NOT NULL,
  `sabedoria` int(50) NOT NULL,
  `carisma` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `personagens`
--

INSERT INTO `personagens` (`id`, `personagem`, `jogador`, `especie`, `classe`, `subclasse`, `forca`, `destreza`, `constituicao`, `inteligencia`, `sabedoria`, `carisma`) VALUES
(11, 'Venus', 'Emily', 'Elfo', 'Druida', 'Patrulheiro', 8, 14, 13, 12, 15, 10),
(12, 'Zara', 'Geovanna', 'Humano', 'Guerreiro', '', 15, 14, 13, 10, 12, 8);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `jogadores`
--
ALTER TABLE `jogadores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `personagens`
--
ALTER TABLE `personagens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `jogadores`
--
ALTER TABLE `jogadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `personagens`
--
ALTER TABLE `personagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
