-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 21 Avril 2020 à 23:34
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `identificationacheteurs`
--

CREATE TABLE IF NOT EXISTS `identificationacheteurs` (
  `Prenom` varchar(20) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `MDP` varchar(20) NOT NULL,
  `adress_line1` varchar(50) NOT NULL,
  `adress_line2` varchar(50) NOT NULL,
  `Ville` varchar(30) NOT NULL,
  `Code_Postal` int(5) NOT NULL,
  `Pays` varchar(30) NOT NULL,
  `Num_Client` int(50) NOT NULL,
  `Num_CB` int(16) NOT NULL,
  `Nom_CB` varchar(60) NOT NULL,
  `Date_Exp` varchar(5) NOT NULL,
  `ccc` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `identificationacheteurs`
--

INSERT INTO `identificationacheteurs` (`Prenom`, `Nom`, `email`, `MDP`, `adress_line1`, `adress_line2`, `Ville`, `Code_Postal`, `Pays`, `Num_Client`, `Num_CB`, `Nom_CB`, `Date_Exp`, `ccc`) VALUES
('Noor', 'Kardache', 'noor.kardache@edu.ece.fr', '123', '30 rue Wow', 'Bat 5', 'Paris', 75015, 'France', 1, 1111, 'Noor Kardache', '07/20', 555),
('jb', 'jb', 'jb@jb.fr', '', '', '', '', 0, '', 0, 0, '', '', 0),
('sa', 'sa', 's@s.fr', 'sa', '', '', '', 0, '', 0, 0, '', '', 0),
('jlkj', 'lkjlkj', 'lkjlkj@lk', '', '', '', 'TOTI', 92, 'France', 2948, 1234, 'KLFAML', '12', 123),
('lkj', 'lkj', 'lkj@lkj.fr', 'lkj', 'lkj', 'lkj', 'lkj', 12, 'lkj', 23, 1243, 'klj', '12', 123),
('', '', '', '', '', '', '', 0, '', 0, 0, '', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
