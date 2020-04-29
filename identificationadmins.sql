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
-- Structure de la table `identificationadmins`
--

CREATE TABLE IF NOT EXISTS `identificationadmins` (
  `email` varchar(50) NOT NULL,
  `MDP` varchar(30) NOT NULL,
  `Pseudo` varchar(30) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `Avatar` varchar(50) NOT NULL,
  `Photo_fond` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `identificationadmins`
--

INSERT INTO `identificationadmins` (`email`, `MDP`, `Pseudo`, `Nom`, `Avatar`, `Photo_fond`) VALUES
('tiffanie.jego-ragas@edu.ece.fr', '123', 'TiffJR', 'JR', 'Membres/TiffJR.png', 'Fonds/TiffJR.png'),
('noor.kardache@edu.ece.fr', 'aze', 'Noonankn', 'Kardache', 'photo/Noona.jpg', 'photo/statue.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
