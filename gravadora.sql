-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Mar-2016 às 09:11
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gravadora`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cantor`
--

CREATE TABLE IF NOT EXISTS `cantor` (
  `codigo_cantor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo_cantor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `cantor`
--

INSERT INTO `cantor` (`codigo_cantor`, `nome`) VALUES
(1, 'Fernandinho'),
(7, 'Fulana'),
(8, 'Noite ilustrada'),
(9, 'Joao Paulo e Daniel'),
(10, 'Maria Bonita');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cd`
--

CREATE TABLE IF NOT EXISTS `cd` (
  `codigo_cd` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `data_lancamento` date NOT NULL,
  `cantor_fk` int(11) NOT NULL,
  `capa` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo_cd`),
  KEY `cantor_fk` (`cantor_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Extraindo dados da tabela `cd`
--

INSERT INTO `cd` (`codigo_cd`, `titulo`, `data_lancamento`, `cantor_fk`, `capa`) VALUES
(20, 'Cidade2', '0000-00-00', 9, ''),
(21, 'Cidade', '2016-01-01', 1, ''),
(28, 'Galileu', '0000-00-00', 7, 'Array'),
(29, 'Sao Joao', '2009-12-09', 8, 'Array'),
(30, 'ce ce person', '2009-09-02', 8, 'Array'),
(39, 'titulo do cd teste', '2016-03-01', 8, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(256) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo`, `login`, `nome`, `senha`) VALUES
(1, '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(2, 'teste', 'teste', '202cb962ac59075b964b07152d234b70'),
(3, 'samyra', 'samyra', '202cb962ac59075b964b07152d234b70');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cd`
--
ALTER TABLE `cd`
  ADD CONSTRAINT `cd_ibfk_1` FOREIGN KEY (`cantor_fk`) REFERENCES `cantor` (`codigo_cantor`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
