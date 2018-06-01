-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 07-Maio-2018 às 21:43
-- Versão do servidor: 5.7.22
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aula`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `genio_models`
--

CREATE TABLE `genio_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nascimento` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `genio_models`
--

INSERT INTO `genio_models` (`id`, `nome`, `nascimento`, `created_at`, `updated_at`) VALUES
(1, 'GIL EDUARDO DE ANDRADE', '1983-11-18', '2018-05-07 00:26:51', '2018-05-07 00:26:51'),
(2, 'STEPHEN HAWKING', '1942-01-08', '2018-05-07 00:26:51', '2018-05-07 00:26:51'),
(3, 'ALBERT EINSTEIN', '1879-03-17', '2018-05-07 00:26:51', '2018-05-07 00:26:51'),
(4, 'NIKOLA TESLA', '1856-07-10', '2018-05-07 00:26:51', '2018-05-07 00:26:51'),
(5, 'ISAAC NEWTON', '1643-01-04', '2018-05-07 00:26:51', '2018-05-07 00:26:51'),
(6, 'LEONARDO DA VINCI', '1452-04-15', '2018-05-07 00:26:51', '2018-05-07 00:26:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genio_models`
--
ALTER TABLE `genio_models`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genio_models`
--
ALTER TABLE `genio_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
