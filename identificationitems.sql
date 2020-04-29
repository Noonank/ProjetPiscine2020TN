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
-- Structure de la table `identificationitems`
--

CREATE TABLE IF NOT EXISTS `identificationitems` (
  `Pseudo_vendeur` varchar(100) NOT NULL,
  `num_id` int(100) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Photo` varchar(100) NOT NULL,
  `Video` varchar(100) NOT NULL,
  `Descriptioin` varchar(30) NOT NULL,
  `Prix` int(255) NOT NULL,
  `Categorie` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `identificationitems`
--

INSERT INTO `identificationitems` (`Pseudo_vendeur`, `num_id`, `Nom`, `Photo`, `Video`, `Descriptioin`, `Prix`, `Categorie`) VALUES
('Noona', 1, 'Chaussures', 'Items/paques2.jpg', '', 'Neuves', 22, 1),
('Noona', 2, 'Livre', 'Items/paques1.jpg', '', 'Neuf', 5, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
