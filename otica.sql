-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Fev-2018 às 15:20
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cod_cliente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `profissao` varchar(30) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `filiacao` varchar(50) NOT NULL,
  `naturalidade` varchar(50) NOT NULL,
  `data_nasc` varchar(10) NOT NULL,
  `nome_conjuge` varchar(50) NOT NULL,
  `profissao_conjuge` varchar(30) NOT NULL,
  `referencia` varchar(30) NOT NULL,
  `telefone_referencia` varchar(11) NOT NULL,
  `funci_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cod_funci` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`cod_funci`, `login`, `senha`) VALUES
(1, 'victoria', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `cod_produto` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `preco_fabrica` float NOT NULL,
  `preco_revenda` float NOT NULL,
  `fornecedor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `refratometria`
--

CREATE TABLE `refratometria` (
  `cod_refrato` int(11) NOT NULL,
  `odesf` float NOT NULL,
  `odcil` float NOT NULL,
  `odeixo` float NOT NULL,
  `oddmp` float NOT NULL,
  `oeesf` float NOT NULL,
  `oecil` float NOT NULL,
  `oeeixo` float NOT NULL,
  `oedmp` float NOT NULL,
  `cliente_cod` int(11) NOT NULL,
  `funcio_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `cod_venda` int(11) NOT NULL,
  `forma_pagamento` varchar(20) NOT NULL,
  `qtd_parcela` int(4) NOT NULL,
  `obs` varchar(50) NOT NULL,
  `produto_cod` int(11) NOT NULL,
  `cliente_cod` int(11) NOT NULL,
  `funcio_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cliente`),
  ADD KEY `funciornario_cod` (`funci_cod`),
  ADD KEY `funci_cod` (`funci_cod`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cod_funci`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`cod_produto`);

--
-- Indexes for table `refratometria`
--
ALTER TABLE `refratometria`
  ADD PRIMARY KEY (`cod_refrato`),
  ADD KEY `cliente_cod` (`cliente_cod`),
  ADD KEY `funcio_cod` (`funcio_cod`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`cod_venda`),
  ADD KEY `produto_cod` (`produto_cod`),
  ADD KEY `cliente_cod` (`cliente_cod`),
  ADD KEY `funcio_cod` (`funcio_cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `cod_funci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `cod_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `refratometria`
--
ALTER TABLE `refratometria`
  MODIFY `cod_refrato` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `cod_venda` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `refratometria`
--
ALTER TABLE `refratometria`
  ADD CONSTRAINT `refratometria_ibfk_1` FOREIGN KEY (`funcio_cod`) REFERENCES `funcionario` (`cod_funci`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`produto_cod`) REFERENCES `produto` (`cod_produto`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`cliente_cod`) REFERENCES `cliente` (`cod_cliente`),
  ADD CONSTRAINT `venda_ibfk_3` FOREIGN KEY (`funcio_cod`) REFERENCES `funcionario` (`cod_funci`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
