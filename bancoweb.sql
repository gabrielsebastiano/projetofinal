-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31-Out-2018 às 04:31
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bancoweb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `idTipo` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`idTipo`, `nome`, `descricao`) VALUES
(1, 'Infoo', 'fksfk'),
(2, 'Teste', 'vsif');

-- --------------------------------------------------------

--
-- Estrutura da tabela `torrent`
--

CREATE TABLE `torrent` (
  `idTorrent` int(11) NOT NULL,
  `nomeArquivo` varchar(255) DEFAULT NULL,
  `tamanho` varchar(255) DEFAULT NULL,
  `dataInsercao` date DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `seeds` int(11) DEFAULT NULL,
  `nomeEnviado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `torrent`
--

INSERT INTO `torrent` (`idTorrent`, `nomeArquivo`, `tamanho`, `dataInsercao`, `tipo`, `seeds`, `nomeEnviado`) VALUES
(1, 'info.ico', '0.0012798309326172', '2018-10-30', 1, 55, 'sebastiano'),
(2, 'logo.png', '0.0080347061157227', '2018-10-30', 1, 20, 'sebastiano'),
(3, 'logo.png', '0.0080347061157227', '2018-10-30', 2, 20, 'Teste 2'),
(4, '2018.10.31-00.21.18.odt', '0.0025100708007812', '2018-10-30', 1, 22, 'Administrador'),
(5, '2018.10.31-01.11.24.odt', '0.0025100708007812', '2018-10-31', 1, 2, 'Livro Caixa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `email`, `login`, `senha`, `datanascimento`) VALUES
(26, 'fdfd', NULL, 'gabriel', '7dad8d7737afdf0f7590590f78acf67b', '2018-10-30'),
(27, '', NULL, 'gabriel', '7dad8d7737afdf0f7590590f78acf67b', '0000-00-00'),
(28, 'Gabriel', NULL, 'gabrielsebastiano', '7dad8d7737afdf0f7590590f78acf67b', '2000-12-14'),
(29, 'Administrador', NULL, 'gabriel', 'e10adc3949ba59abbe56e057f20f883e', '2018-10-30'),
(30, 'Administrador', NULL, 'gabriel', '7dad8d7737afdf0f7590590f78acf67b', '2018-10-30'),
(31, '', NULL, 'gabriel', '7dad8d7737afdf0f7590590f78acf67b', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indexes for table `torrent`
--
ALTER TABLE `torrent`
  ADD PRIMARY KEY (`idTorrent`),
  ADD KEY `tipo` (`tipo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `torrent`
--
ALTER TABLE `torrent`
  MODIFY `idTorrent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `torrent`
--
ALTER TABLE `torrent`
  ADD CONSTRAINT `torrent_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo` (`idTipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
