-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/06/2024 às 23:17
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
-- Banco de dados: `shop_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `comentario` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `feedback`
--

INSERT INTO `feedback` (`id`, `idUsuario`, `nome`, `comentario`) VALUES
(1, 1, 'Felipe Sousa da Silva', 'Falta muitos pontos a se melhorar.'),
(2, 2, 'Enzo Guedes', 'Falta bastente pontos, porém o site e bom!');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(255) NOT NULL,
  `idUsuario` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  `item_quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idUsuario`, `nome`, `cpf`, `email`, `item_title`, `item_price`, `item_quantity`) VALUES
(1, 1, 'Felipe Sousa da Silva', '015.326.213-93', 'felipe@mail.com', 'Bored Ape, Roman Monkey', '2.15 ETH', 1),
(2, 1, 'Felipe Sousa da Silva', '015.326.213-93', 'felipe@mail.com', 'Bored Ape, Brazilian Monkey', '5.87 ETH', 1),
(3, 2, 'Enzo Guedes', '123.123.123-12', 'enzo@mail.com', 'Bored Ape, Yatch Club', '9.17 ETH', 2),
(4, 2, 'Enzo Guedes', '123.123.123-12', 'enzo@mail.com', 'Bored Ape, Brazilian Monkey', '5.87 ETH', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user-info`
--

CREATE TABLE `user-info` (
  `id` int(11) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `dataNasc` date NOT NULL,
  `genero` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user-info`
--

INSERT INTO `user-info` (`id`, `telefone`, `cpf`, `dataNasc`, `genero`) VALUES
(1, '(61)99298-6642', '015.326.213-93', '2005-04-28', 'Masculino'),
(2, '(85)99728-2424', '123.123.123-12', '2005-12-19', 'Masculino');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Felipe Sousa da Silva', 'felipe@mail.com', '$2y$10$3Pd8dTWxPFrc3Qa5fLxCU.geYujt79ARrQAng9KLw9skhGe7nu6Ia'),
(2, 'Enzo Guedes', 'enzo@mail.com', '$2y$10$ADApj40fcMlTHLekFrQqIuJ9MQ49F6KJNk2tQb6lDEM3zi5tQwuqG');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coment_idUsuario` (`idUsuario`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `id_idUsuario` (`idUsuario`);

--
-- Índices de tabela `user-info`
--
ALTER TABLE `user-info`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `user-info`
--
ALTER TABLE `user-info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `id_idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `user-info`
--
ALTER TABLE `user-info`
  ADD CONSTRAINT `user-info_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
