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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `titre`, `image`, `prix`, `fiche`, `stock`, `validation`, `id_vendeur`, `id_categorie`, `date`, `tag`) VALUES
(1, 'PC', '', 10, 'Pc vendu par admin', 1, 1, 1, 1, '2016-02-23', ''),
(2, 'Meuble Ikea', '', 200, 'meuble ikea', 3, 0, 17, 4, '2016-02-23', ''),
(3, 'trousse', '', 50, 'la trousse de ma grand-mere', 1, 1, 14, 5, '2016-02-23', ''),
(6, 't-shirt logo', '', 12, 'T-shirt avec un logo bleu', 1, 1, 1, 0, '2016-02-23', ''),
(7, 'test', '', 0, 'test', 1, 0, 1, 0, '2016-02-23', ''),
(8, 'Ecran', '', 127, 'un ecran plat \r\nDimension : 1000*800\r\nEtat  d occasion\r\nmarque Asus.', 1, 1, 1, 0, '2016-02-23', ''),
(9, 'clavier', '', 20, 'clavier azert', 1, 0, 1, 0, '2016-02-23', ''),
(15, 'stylo bleu', '2', 0, 'un stylo bleu, qui Ã©crit en bleu', 1, 0, 24, 0, '2016-02-23', 'bleu, stylo'),
(16, 'test', '10', 0, 'test', 1, 0, 1, 0, '2016-02-24', 'test');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
