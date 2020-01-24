-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Nov-2019 às 10:06
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_details`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `n_utilizador` int(11) NOT NULL,
  `utilizador` text NOT NULL,
  `password` text NOT NULL,
  `nome` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`n_utilizador`, `utilizador`, `password`, `nome`, `email`) VALUES
(27, 'qweqwe', '123123', '', 'qweqwe@gmail.com'),
(28, 'ertertert', '123123', '', 'morwemfo@gmail.com'),
(29, '234234234', '123123123', 'qweqwe', '234234@gmail.com'),
(30, 'SELECT * FROM clientes #;', '123123123', '1231213', 'eqweqweqweqw@gmail.com'),
(31, 'werwergrg', '123123123', 'terwtert', 'werergrw@gmail.com'),
(32, '3123123123', '34343434', '3434', '1231231432312312@aesjt.pt');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendas`
--

CREATE TABLE `encomendas` (
  `n_encomenda` int(11) NOT NULL,
  `p_encomenda` int(11) NOT NULL,
  `n_utilizador` int(11) NOT NULL,
  `m_envio` text NOT NULL,
  `m_pagamento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `encomendas`
--

INSERT INTO `encomendas` (`n_encomenda`, `p_encomenda`, `n_utilizador`, `m_envio`, `m_pagamento`) VALUES
(69, 657571, 27, 'aviao', '3123'),
(70, 657571, 27, 'barco', '3123'),
(72, 657571, 27, 'barco', '3123'),
(75, 657571, 27, 'aviao', 'paypal'),
(76, 657571, 27, 'barco', 'paypal'),
(77, 657571, 27, 'barco', 'paypal'),
(78, 657571, 27, 'barco', 'paypal'),
(79, 657571, 27, 'barco', 'paypal'),
(80, 657571, 27, 'aviao', 'BTC'),
(81, 657571, 27, 'aviao', 'BTC'),
(82, 2147483647, 27, 'aviao', 'BTC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendas_detalhes`
--

CREATE TABLE `encomendas_detalhes` (
  `n_encomenda` int(11) NOT NULL,
  `n_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `encomendas_detalhes`
--

INSERT INTO `encomendas_detalhes` (`n_encomenda`, `n_produto`, `quantidade`) VALUES
(43, 4, 1),
(43, 657567, 3),
(44, 4, 1),
(44, 657567, 3),
(45, 4, 1),
(45, 657567, 3),
(46, 4, 1),
(47, 4, 1),
(47, 657567, 1234),
(48, 4, 1),
(48, 657567, 1234),
(49, 657567, 1),
(50, 657567, 1),
(51, 4, 1),
(51, 657567, 1),
(52, 4, 1),
(52, 657567, 1),
(53, 4, 1),
(53, 657567, 1),
(54, 4, 1),
(54, 657567, 1),
(55, 4, 1),
(55, 657567, 1),
(56, 4, 1),
(56, 657567, 1),
(57, 4, 1),
(57, 657567, 1),
(58, 4, 1),
(58, 657567, 1),
(59, 4, 1),
(59, 657567, 1),
(60, 4, 1),
(60, 657567, 1),
(61, 4, 1),
(61, 657567, 1),
(62, 4, 1),
(62, 657567, 1),
(63, 4, 1),
(63, 657567, 1),
(64, 4, 1),
(64, 657567, 1),
(65, 4, 1),
(65, 657567, 1),
(66, 4, 1),
(66, 657567, 1),
(67, 4, 1),
(67, 657567, 1),
(68, 4, 1),
(68, 657567, 1),
(68, 4, 1),
(68, 657567, 1),
(68, 4, 1),
(68, 657567, 1),
(68, 4, 1),
(68, 657567, 1),
(68, 4, 1),
(68, 657567, 1),
(69, 4, 1),
(69, 657567, 1),
(70, 4, 1),
(70, 657567, 1),
(71, 4, 1),
(71, 657567, 1),
(72, 4, 1),
(72, 657567, 1),
(73, 4, 1),
(73, 657567, 1),
(74, 4, 1),
(74, 657567, 1),
(75, 4, 1),
(75, 657567, 1),
(76, 4, 1),
(76, 657567, 1),
(77, 4, 1),
(77, 657567, 1),
(78, 4, 1),
(78, 657567, 1),
(79, 4, 1),
(79, 657567, 1),
(80, 4, 1),
(80, 657567, 1),
(81, 4, 1),
(81, 657567, 1),
(82, 4, 1000),
(82, 657567, 100000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_alternativo`
--

CREATE TABLE `endereco_alternativo` (
  `n_utilizador` int(11) NOT NULL,
  `nome` text NOT NULL,
  `endereco` text NOT NULL,
  `codpostal` int(11) NOT NULL,
  `cidade` text NOT NULL,
  `pais` text NOT NULL,
  `provincia` text NOT NULL,
  `telefone1` int(11) NOT NULL,
  `telefone2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco_alternativo`
--

INSERT INTO `endereco_alternativo` (`n_utilizador`, `nome`, `endereco`, `codpostal`, `cidade`, `pais`, `provincia`, `telefone1`, `telefone2`) VALUES
(27, 'tertret', 'retert', 345, 'tertre', 'Afghanistan', 'rwerew', 43534, 34534),
(27, 'tertret', 'retert', 345, 'tertre', 'Afghanistan', 'rwerew', 43534, 34534),
(0, 'ewrwer', 'ewrwe', 234324, 'werwer', 'Afghanistan', 'wrwer', 234234, 32423),
(2147483647, 'werewr', 'rewrwe', 423432, 'rwerew', 'Afghanistan', 'rwerew', 234234, 34),
(27, 'werewr', 'rewrwe', 423432, 'rwerew', 'Afghanistan', 'rwerew', 234234, 34),
(27, 'werewr', 'rewrwe', 423432, 'rwerew', 'Afghanistan', 'rwerew', 234234, 34),
(27, 'werewr', 'rewrwe', 423432, 'rwerew', 'Afghanistan', 'rwerew', 234234, 34),
(27, 'werewr', 'rewrwe', 423432, 'rwerew', 'Afghanistan', 'rwerew', 234234, 34),
(32, 'werewr', 'rewrwe', 423432, 'rwerew', 'Afghanistan', 'rwerew', 234234, 34);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_entrega`
--

CREATE TABLE `endereco_entrega` (
  `n_utilizador` int(11) NOT NULL,
  `nome` text NOT NULL,
  `endereco` text NOT NULL,
  `codpostal` int(11) NOT NULL,
  `cidade` text NOT NULL,
  `pais` text NOT NULL,
  `provincia` text NOT NULL,
  `telefone1` int(11) NOT NULL,
  `telefone2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `pname` int(11) NOT NULL,
  `imagee` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`id`, `pname`, `imagee`, `price`) VALUES
(1, 567567, 3234, 657567),
(2, 34, 34, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`n_utilizador`);

--
-- Indexes for table `encomendas`
--
ALTER TABLE `encomendas`
  ADD PRIMARY KEY (`n_encomenda`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `n_utilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `encomendas`
--
ALTER TABLE `encomendas`
  MODIFY `n_encomenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
