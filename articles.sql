-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 21 Avril 2020 à 23:33
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
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `IDcategorie` int(11) NOT NULL,
  `descript` varchar(255) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `IDpaiement` int(11) NOT NULL,
  `Video` varchar(255) NOT NULL,
  `email_vendeur` varchar(255) NOT NULL,
  `Photo2` varchar(255) NOT NULL,
  `num_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`ID`, `Nom`, `IDcategorie`, `descript`, `Prix`, `Photo`, `IDpaiement`, `Video`, `email_vendeur`, `Photo2`, `num_id`) VALUES
(1, 'boulon', 1, 'boulon tchatcheur', 284, 'boulon.jpeg', 1, '', 'h@h.fr', 'boulon2.jpeg', 128493),
(2, 'voiture', 1, 'voiture de collection tchatcheuse', 280009984, 'voiture.jpg', 1, '', 'h@h.fr', 'voiture.jpeg', 2147483647),
(4, 'Tableau ancien 2 ', 2, 'tableau tres tres vieux orsay', 203888, 'image/bdd/12937832_Vendeur.jpeg', 2, 'lkj', 'h@h.fr', 'image/bdd/bisTableau ancien 2 _Vendeur.jpeg', 12937832),
(5, 'Limousine', 3, 'limo de luxe ++', 100000, 'limo.jpeg', 1, '', 'h@h.fr', 'limo.jpeg', 12973902),
(6, 'bijoux anciens', 3, 'bijoux tres haute qualite', 1203, 'tresor.jpg', 1, '', 'h@h.fr', 'tresor.jpg', 9876),
(8, 'tableau', 2, 'tableau tres ancien', 29538, 'musee3.jpg', 2, '', 'h@h.fr', 'musee3.jpg', 1298472);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
