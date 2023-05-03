-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 09 Juin 2015 à 17:24
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sospartenaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `pratique`
--

CREATE TABLE IF NOT EXISTS `pratique` (
  `IdUtilisation` int(50) NOT NULL,
  `idsport` int(50) NOT NULL,
  `niveau` varchar(50) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  PRIMARY KEY (`IdUtilisation`,`idsport`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pratique`
--

INSERT INTO `pratique` (`IdUtilisation`, `idsport`, `niveau`, `lieu`) VALUES
(1, 1, 'Debutant', 'Paris'),
(2, 2, 'Intermidiaire', 'Nantes'),
(1, 3, 'Intermidaire', 'Mantes-La-Jolie'),
(2, 3, 'Expert', 'Orléans'),
(1, 0, 'Debutant', 'Nante'),
(1, 6, 'Debutant', 'Paris'),
(1, 4, 'Expert', 'Nantes'),
(1, 2, 'Debutant', 'Pairs'),
(1, 7, 'Debutant', 'Lyo,n'),
(4, 7, 'Debutant', 'Paris'),
(4, 4, 'Intermidaire', 'Nantes'),
(4, 1, 'Debutant', 'Orleans'),
(4, 8, 'Debutant', 'LYON');

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

CREATE TABLE IF NOT EXISTS `sport` (
  `nomsport` varchar(20) NOT NULL,
  `IdSport` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`IdSport`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `sport`
--

INSERT INTO `sport` (`nomsport`, `IdSport`) VALUES
('Tennis', 1),
('Basket', 2),
('Football', 3),
('Handaball', 5),
('Volley', 4),
('Lapin', 6),
('Handball', 7),
('CuRLING', 8);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IdUtilisation` int(255) NOT NULL AUTO_INCREMENT,
  `Identifiant` varchar(30) NOT NULL,
  `motdepasse` varchar(40) NOT NULL,
  `numeridetelephone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomutil` varchar(40) NOT NULL,
  `prenomutil` varchar(40) NOT NULL,
  PRIMARY KEY (`IdUtilisation`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IdUtilisation`, `Identifiant`, `motdepasse`, `numeridetelephone`, `email`, `nomutil`, `prenomutil`) VALUES
(1, 'u.perret@ip-formation.net', '4567', '01 45 76 85 87', 'u.perret@ip-formation.net', 'PERRET', 'Ulysse'),
(2, 'd.bangoura@ip.formation.net', '1234', '', 'd.bangoura@ip.formation.net', 'BANGOURA', 'David'),
(3, 'test', '1234', '', 'test', 'DUPONT', 'Tintin'),
(4, 'a', 'a', '02 45 85 69 75', 'kevin.j@orange.fr', 'a', 'a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
