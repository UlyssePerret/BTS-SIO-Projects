-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 23 Juin 2015 à 16:58
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

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

--
-- Contenu de la table `date`
--

INSERT INTO `date` (`ContenueD`, `IdDate`) VALUES
('2014-09-08', 1),
('2014-10-20', 2);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `IdGroupe` int(11) NOT NULL,
  `NiveauSecurite` varchar(20) NOT NULL,
  PRIMARY KEY (`IdGroupe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`IdGroupe`, `NiveauSecurite`) VALUES
(0, 'Admin'),
(1, 'Formateur'),
(2, 'Stagiaire');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `IdModule` varchar(255) NOT NULL,
  `IdUtilisateur` int(11) NOT NULL,
  `LibelleModule` varchar(45) NOT NULL,
  PRIMARY KEY (`IdModule`),
  KEY `idUtilisateur` (`IdUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `module`
--

INSERT INTO `module` (`IdModule`, `IdUtilisateur`, `LibelleModule`) VALUES
('E2.2 Algorithme', 7, 'Algorithmique'),
('E1.1 Francais', 5, 'Culture Generale et Expression'),
('E1.2 Anglais', 6, 'Expression et communication en langue anglais'),
('E2.1 Mathematiques', 7, 'Mathématiques'),
('U4.1 Developpement commun', 3, 'Enseignement commun (SI) - Developpement'),
('U4.1 Systeme et réseau', 2, 'Enseignement specialite (SISR) - Reseaux'),
('U4.1 Developpement', 3, 'Enseignement specialité (SLAM) - Developpemen'),
('E3 EDM', 4, 'Analyse economique, manageriale et juridique '),
('U4.1 Systeme et réseau commun', 2, 'Enseignement commun (SI) Systeme et réseau'),
('U4.3 PPE', 2, 'Projet Perssonel Encadre'),
('Labo', 1, 'Laboratoire'),
('Autonomie', 1, 'Autonomie');

-- --------------------------------------------------------

--
-- Structure de la table `realiser`
--

CREATE TABLE IF NOT EXISTS `realiser` (
  `IdModule` varchar(255) NOT NULL,
  `IdDate` int(11) NOT NULL,
  `ContenueSequenceDate` date NOT NULL,
  `ContenueSequenceModule` varchar(200) NOT NULL,
  `ContenueSequenceDescription` varchar(200) NOT NULL,
  `NombreMinute` int(255) NOT NULL,
  `ContenueFormateurNom` varchar(50) NOT NULL,
  `ContenueFormateurPrenom` varchar(50) NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`num`),
  UNIQUE KEY `IdDate` (`IdDate`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `realiser`
--

INSERT INTO `realiser` (`IdModule`, `IdDate`, `ContenueSequenceDate`, `ContenueSequenceModule`, `ContenueSequenceDescription`, `NombreMinute`, `ContenueFormateurNom`, `ContenueFormateurPrenom`, `num`) VALUES
('E2.2 Algorithme', 1, '2014-10-06', 'Algorithme ', 'Matiere qui etudie la logique des tables, la structure en pseudo-code ou un langage connu\r\n', 50, 'Stephane', 'HALIMI', 1),
('Autonomie', 4, '2014-09-12', 'Autonomie', 'Autonomie', 20, 'POIRIER', 'Pierre-Yves', 4),
('E1.2 Anglais', 3, '2015-10-12', 'Anglais', 'Matiere de langue etrangere', 20, 'BEN HASSINE', 'Asma', 3),
('E1.1 Francais', 2, '2014-10-09', 'Francais et Culture Generale', 'Etude de la langue Francaise', 20, 'COHEN', 'Emmanuelle', 2),
('E2.1 Mathematiques', 5, '2014-09-08', 'Mathematique', 'Mathematique applique', 40, 'HALIMI', 'Stephane', 5),
('U4.1 Systeme et réseau', 0, '2015-03-09', 'Enseignement specialite (SISR) - Reseaux', 'Enseignement specialite (SISR) - Reseaux', 40, 'BRACQUART', 'Nicolas', 0);

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
  `IdGroupe` int(11) NOT NULL,
  PRIMARY KEY (`Idutilisateur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nom`, `prenom`, `mail`, `mdp`, `Idutilisateur`, `IdGroupe`) VALUES
('POIRIER', 'Pierre-Yves', 'py.poirier@ip-formation.net', '1234', 1, 0),
('BRACQUART', 'Nicolas', 'n.bracquart@ip-formation.net', '1234', 2, 1),
('GUEZ', 'Frederic', 'f.guez@ip-formation.net', '1234', 3, 1),
('FOUZIA', 'Zihary', 'z.fouzia@ip-formation.net', '1234', 4, 1),
('COHEN', 'Emmanuelle', 'e.cohen@ip-formation.net', '1234', 5, 1),
('BEN HASSINE', 'Asma', 'a.ben-hassine@ip-formation.net', '1234', 6, 1),
('HALIMI', 'Stephane', 's.halimi@ip.formation.net', '1234', 7, 1),
('PERRET', 'Ulysse', 'u.perret@ip-formation.net', '1234', 8, 0),
('BANGOURA', 'David', 'd.bangoura@ip-formation.net', '1234', 9, 2),
('BRIOLAND', 'Emilie', 'e.brioland@ip-formation.net', '1234', 10, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
