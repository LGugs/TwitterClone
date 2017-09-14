-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 11-Jun-2017 às 20:55
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitterClone`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `TWEET`
--

CREATE TABLE `TWEET` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tweet` varchar(140) NOT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `TWEET`
--

INSERT INTO `TWEET` (`id`, `id_user`, `tweet`, `data`) VALUES
(2, 9, 'primeiro tweet', '2017-04-15 20:11:31'),
(3, 9, 'nossa, que daora meu', '2017-04-15 20:12:39'),
(4, 9, 'oi', '2017-04-15 20:14:15'),
(5, 9, 'oioi', '2017-04-15 20:17:27'),
(6, 9, 'teste de tweet n 5', '2017-04-16 14:27:47'),
(7, 9, 'teste att ajax', '2017-04-16 14:33:30'),
(8, 9, 'asdasd', '2017-04-16 19:03:18'),
(9, 10, 'oioi', '2017-04-16 19:39:43'),
(10, 10, 'asadasd', '2017-04-16 19:47:28'),
(11, 11, 'asdasd', '2017-04-16 19:59:02'),
(12, 11, 'oi gente', '2017-04-16 19:59:05'),
(13, 9, 'asdasd', '2017-04-16 20:31:48'),
(14, 9, 'teste', '2017-04-16 20:32:04'),
(15, 9, 'teste2', '2017-04-16 20:33:12'),
(16, 9, 'asdasda', '2017-04-16 20:33:14'),
(17, 9, 'parsa', '2017-04-16 20:33:18'),
(18, 9, 'asdasd', '2017-04-16 20:33:35'),
(19, 9, 'att n de tweets via ajax', '2017-04-16 20:33:56'),
(20, 9, 'adasd', '2017-04-16 20:44:31'),
(21, 9, 'testetetoiesjfis', '2017-04-16 20:53:02'),
(22, 9, 'sdasdasd', '2017-04-17 16:15:12'),
(23, 16, 'e ai galerinha', '2017-04-17 16:16:18'),
(24, 9, 'e ai', '2017-04-26 17:34:15'),
(25, 17, 'meu primeiro tweet', '2017-05-05 18:24:03'),
(26, 17, 'ola', '2017-05-05 18:24:43'),
(27, 9, 'oi', '2017-05-05 18:28:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `USERS`
--

CREATE TABLE `USERS` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pw` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `USERS`
--

INSERT INTO `USERS` (`id`, `username`, `email`, `pw`) VALUES
(9, 'giovannifiori', 'giovannicfiori@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(10, 'joao', 'joao@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(11, 'paula', 'paula@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(12, 'admin', 'admin@admin.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(15, 'giovannifiori2', 'gcf@icomp.ufam.edu.br', '440ac85892ca43ad26d44c7ad9d47d3e'),
(16, 'lukinhaspk', 'luks_furacao2000@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(17, 'zulene', 'zuocris@gmail.com', '202cb962ac59075b964b07152d234b70'),
(18, 'demo', 'demo@demo.com', 'fe01ce2a7fbac8fafaed7c982a04e229');

-- --------------------------------------------------------

--
-- Estrutura da tabela `USER_RELATION`
--

CREATE TABLE `USER_RELATION` (
  `id_relation` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_following` int(11) NOT NULL,
  `data_inc` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `USER_RELATION`
--

INSERT INTO `USER_RELATION` (`id_relation`, `id_user`, `id_following`, `data_inc`) VALUES
(1, 9, 10, '2017-04-16 19:36:46'),
(3, 9, 11, '2017-04-16 19:37:58'),
(5, 10, 11, '2017-04-16 19:47:17'),
(6, 10, 9, '2017-04-16 19:47:32'),
(7, 11, 9, '2017-04-16 19:59:09'),
(15, 9, 12, '2017-04-16 21:02:50'),
(16, 16, 9, '2017-04-17 16:16:09'),
(17, 9, 16, '2017-04-17 16:16:37'),
(18, 17, 9, '2017-05-05 18:23:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `TWEET`
--
ALTER TABLE `TWEET`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `USER_RELATION`
--
ALTER TABLE `USER_RELATION`
  ADD PRIMARY KEY (`id_relation`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `TWEET`
--
ALTER TABLE `TWEET`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `USER_RELATION`
--
ALTER TABLE `USER_RELATION`
  MODIFY `id_relation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
