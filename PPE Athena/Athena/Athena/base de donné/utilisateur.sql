-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 25 Février 2016 à 16:14
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `athena`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `motdepasse` varchar(50) NOT NULL,
  `groupe` int(50) NOT NULL,
  `rue` varchar(50) NOT NULL,
  `codepostal` int(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `mail`, `login`, `motdepasse`, `groupe`, `rue`, `codepostal`, `ville`) VALUES
(1, 'test', 'admin', 'admin', 'admin', 'admin', 3, 'admin', 1, 'admin'),
(14, 'Perret', 'Ulysse', 'ulysseperret@orange.fr', 'ulysseperret@orange.fr', 'la', 4, '53', 92800, 'Puteaux'),
(16, 'LaBelle', 'Antoine', 'antoine@orange.fr', 'antoine@orange.fr', 'a', 4, '65 Avenue Mickey', 76500, 'Paris'),
(17, 'Balou', 'Bastien', 'balou@bastien', 'balou@bastien', 'baleine', 4, 'origine', 21312, 'Lyon'),
(23, 'Arc', 'Jeanne', 'jeannedarc@test.fr', 'm', 'arc', 4, '85 Rue de la Liberté', 54309, 'Canes'),
(24, 'Thibault', 'test', 'test@test.fr', 'test', 'test', 4, '5 Rue du test', 4000, 'Test'),
(25, 'a', 'a', 'a@a.fr', 'a@a.fr', 'a', 4, 'a', 8900, 'a'),
(26, 'Kevin', 'Jaque', 'kevin.jaque@orange.fr', 'kevin.jaque@orange.fr', 'test', 4, '6 Impasse de la vache', 54000, 'Metz'),
(27, 'c', 'c', 'c', 'c', 'c', 4, 'c', 2, 'c');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
