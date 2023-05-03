-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 06 Janvier 2015 à 15:28
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ppe hopital 1`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `Noadmin` int(10) NOT NULL,
  `Nomadmin` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`Noadmin`, `Nomadmin`) VALUES
(1, 'Yohan'),
(2, 'Paul');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE IF NOT EXISTS `employe` (
  `IdPersonne` int(11) NOT NULL,
  `NomPersonne` varchar(11) NOT NULL,
  `DateAttribution` date NOT NULL,
  `DateEntrée` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `employe`
--

INSERT INTO `employe` (`IdPersonne`, `NomPersonne`, `DateAttribution`, `DateEntrée`) VALUES
(1, 'Samuel', '2011-08-24', '2015-01-04'),
(2, 'Lenders', '2011-11-09', '2015-01-03');

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

CREATE TABLE IF NOT EXISTS `intervention` (
  `IdIntervention` int(10) NOT NULL,
  `DateIntervention` date NOT NULL,
  `MotifIntervention` text NOT NULL,
  `SolutionIntervention` text NOT NULL,
  `DateRestitution` date NOT NULL,
  `TempsPasse` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `intervention`
--

INSERT INTO `intervention` (`IdIntervention`, `DateIntervention`, `MotifIntervention`, `SolutionIntervention`, `DateRestitution`, `TempsPasse`) VALUES
(1, '2013-11-15', 'Panne d''écran', 'Remplacement d''écran', '2013-11-20', '5 jours'),
(2, '2013-12-24', 'Alimentation dénudé', 'remplacement du câble d''alimentation', '2013-12-27', '5 jours');

-- --------------------------------------------------------

--
-- Structure de la table `logiciel`
--

CREATE TABLE IF NOT EXISTS `logiciel` (
  `Nomlogiciel` int(10) NOT NULL,
  `Typelogiciel` int(10) NOT NULL,
  `Editeurlogiciel` int(10) NOT NULL,
  `DateInstall` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `medecins`
--

CREATE TABLE IF NOT EXISTS `medecins` (
  `IdMédecin,` int(10) unsigned DEFAULT NULL,
  `NomMédecins` varchar(10) DEFAULT NULL,
  `Spécialisation` text NOT NULL,
  UNIQUE KEY `IdMédecin,` (`IdMédecin,`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `medecins`
--

INSERT INTO `medecins` (`IdMédecin,`, `NomMédecins`, `Spécialisation`) VALUES
(1, 'Richar', 'Médecin généraliste'),
(2, 'Charles', 'Oncologue');

-- --------------------------------------------------------

--
-- Structure de la table `pc`
--

CREATE TABLE IF NOT EXISTS `pc` (
  `IdPc` int(10) NOT NULL,
  `Noseries` int(10) NOT NULL,
  `Marque` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pc`
--

INSERT INTO `pc` (`IdPc`, `Noseries`, `Marque`) VALUES
(1, 112, 'Dell '),
(2, 113, 'Dell');

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `IdSection` int(10) NOT NULL,
  `NiveauSection` varchar(10) NOT NULL,
  `SpecialiteSection` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sections`
--

INSERT INTO `sections` (`IdSection`, `NiveauSection`, `SpecialiteSection`) VALUES
(1, 'simple', 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `typesintervention`
--

CREATE TABLE IF NOT EXISTS `typesintervention` (
  `IdTypeintervention` int(11) NOT NULL,
  `NomTTypesIntervention` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
