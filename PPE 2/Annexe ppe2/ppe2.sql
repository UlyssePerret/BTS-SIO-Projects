-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 18 Mai 2015 à 16:59
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ppe2`
--

-- --------------------------------------------------------

--
-- Structure de la table `date`
--

CREATE TABLE IF NOT EXISTS `date` (
  `ContenueD` date NOT NULL,
  `IdDate` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `IdGroupe` int(11) NOT NULL,
  `NiveauSecurite` varchar(20) NOT NULL,
  `IdUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`IdGroupe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`IdGroupe`, `NiveauSecurite`, `IdUtilisateur`) VALUES
(1, 'Admin', 1),
(2, 'Admin', 2),
(3, 'Admin', 3),
(11, 'Formateur', 4),
(101, 'Stageaire', 5),
(102, 'Stageaire', 6),
(12, 'Formateur', 8);

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `IdModule` varchar(255) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `LibelleModule` varchar(45) NOT NULL,
  PRIMARY KEY (`IdModule`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `module`
--

INSERT INTO `module` (`IdModule`, `idUtilisateur`, `LibelleModule`) VALUES
('B1L', 8, 'Algo'),
('B1A', 4, 'Laboratoire');

-- --------------------------------------------------------

--
-- Structure de la table `realiser`
--

CREATE TABLE IF NOT EXISTS `realiser` (
  `IdModule` varchar(255) NOT NULL,
  `IdDate` int(11) NOT NULL,
  `ContenueSequenceDate` date NOT NULL,
  `ContenueSequenceModule` text NOT NULL,
  `ContenueSequenceFormateur` text NOT NULL,
  `ContenueSequenceDescription` text NOT NULL,
  `NombreMinute` int(255) NOT NULL,
  PRIMARY KEY (`IdModule`),
  UNIQUE KEY `IdDate` (`IdDate`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `realiser`
--

INSERT INTO `realiser` (`IdModule`, `IdDate`, `ContenueSequenceDate`, `ContenueSequenceModule`, `ContenueSequenceFormateur`, `ContenueSequenceDescription`, `NombreMinute`) VALUES
('B1L', 1, '2014-12-08', 'Labo', 'Yves Charles', 'Laboratoire, module constituant a passer sur des Travaux Pratiques', 100),
('B1A', 2, '2014-10-05', 'Algorithme', 'Stephane Lorez', 'Algorithme et application ', 60);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `Idutilisateur` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Idutilisateur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nom`, `prenom`, `mail`, `mdp`, `Idutilisateur`) VALUES
('PERRET', 'Ulysse', 'u.perret@ip-formation.net', 'laupin29', 1),
('BANGOURA', 'DAVID', 'd.bangoura@ip-formateur.net', '1234', 2),
('CHINNAPHA', 'Maetis', 'm.chinnapha@', '1234', 3),
('Yves', 'Charles', 'y.charles@ip-formation', 'lap', 4),
('CLOUS', 'Lianne', 'l.clous@ip-formation.net', 'test', 5),
('EINSTEIN', 'Lose', 'l.einstein@ip-formation.net', 'emc2', 10),
('BALO', 'Kevin', 'k.balo@ip-formation.net', 'metm', 7),
('CLOUS', 'Marie', 'm.clous@ip-formation.net', 'vis', 6),
('Stephane', 'Lorez', 's.lorez@ip-formation.net', 'oreal', 8);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
