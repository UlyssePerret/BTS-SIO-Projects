-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 24 Février 2016 à 09:05
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `athena`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `libelle_categorie` varchar(100) NOT NULL,
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`libelle_categorie`, `id_categorie`) VALUES
('High-Tech', 1),
('Vetement', 2),
('Livre', 3),
('Meuble', 4),
('Scolaire', 5);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(50) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(50) NOT NULL,
  `id_produit` int(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `nom` varchar(11) NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `id_groupe` int(250) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_groupe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id_groupe`, `Nom`) VALUES
(0, 'Visiteur'),
(3, 'Admin'),
(4, 'Utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `id_panier` int(50) NOT NULL AUTO_INCREMENT,
  `date_panier` date NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  PRIMARY KEY (`id_panier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(250) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `prix` int(250) NOT NULL,
  `fiche` varchar(200) NOT NULL,
  `stock` int(250) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  `id_vendeur` int(250) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` date NOT NULL,
  `tag` varchar(250) NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `titre`, `image`, `prix`, `fiche`, `stock`, `validation`, `id_vendeur`, `id_categorie`, `date`, `tag`) VALUES
(1, 'PC', '', 10, 'Pc vendu par admin', 1, 1, 1, 1, '2016-02-23', ''),
(2, 'Meuble Ikea', '', 200, 'meuble ikea', 3, 0, 17, 4, '2016-02-23', ''),
(3, 'trousse', '', 50, 'la trousse de ma grand-mere', 1, 1, 14, 5, '2016-02-23', ''),
(6, 't-shirt logo', '', 12, 'T-shirt avec un logo bleu', 1, 1, 1, 0, '2016-02-23', ''),
(7, 'test', '', 0, 'test', 1, 0, 1, 0, '2016-02-23', ''),
(8, 'Ecran', '', 127, 'un écran plat \r\nDimension : 1000*800\r\nEtat  d occasion\r\nmarque Asus.', 1, 1, 1, 0, '2016-02-23', ''),
(9, 'clavier', '', 20, 'clavier azert', 1, 0, 1, 0, '2016-02-23', ''),
(15, 'stylo bleu', '2', 0, 'un stylo bleu, qui Ã©crit en bleu', 1, 0, 24, 0, '2016-02-23', 'bleu, stylo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `mail`, `login`, `motdepasse`, `groupe`, `rue`, `codepostal`, `ville`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin', 3, 'admin', 1, 'admin'),
(14, 'Perret', 'Ulysse', 'ulysseperret@orange.fr', 'ulysseperret@orange.fr', 'la', 4, '53', 92800, 'Puteaux'),
(16, 'LaBelle', 'Antoine', 'antoine@orange.fr', 'antoine@orange.fr', 'a', 4, '65 Avenue Mickey', 76500, 'Paris'),
(17, 'Balou', 'Bastien', 'balou@bastien', 'balou@bastien', 'baleine', 4, 'origine', 21312, 'Lyon'),
(23, 'Arc', 'Jeanne', 'jeannedarc@test.fr', 'm', 'arc', 4, '85 Rue de la Liberté', 54309, 'Canes'),
(24, 'Thibault', 'test', 'test@test.fr', 'test@test.fr', 'test', 4, '5 Rue du test', 4000, 'Test'),
(25, 'a', 'a', 'a@a.fr', 'a@a.fr', 'a', 4, 'a', 8900, 'a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
