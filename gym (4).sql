-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 21 Janvier 2016 à 15:11
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gym`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idclient` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `date_expiration` date DEFAULT NULL,
  `service` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idclient`),
  KEY `service_idx` (`service`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idclient`, `nom`, `prenom`, `phone`, `adresse`, `date_inscription`, `date_expiration`, `service`) VALUES
(1, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'Piscine'),
(2, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'Football'),
(3, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(4, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(5, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(6, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(7, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(8, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(9, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(10, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(11, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(12, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(13, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(14, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(15, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(16, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(17, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(18, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(19, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(20, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(21, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(22, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(23, 'vlan', 'evlan', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-09-29', '2015-10-28', 'musculation'),
(24, 'hamza', 'bannaa', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-10-01', '2015-11-01', 'musculation'),
(25, 'hamza', 'bannaa', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-10-01', '2015-11-01', 'Arts-Martiaux'),
(26, 'hamza', 'bannaa', '36374122', 'ZRB-450 Tevrag-Zeina', '2015-10-01', '2015-11-01', 'Karate');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `login` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `password` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`) VALUES
(1, 'haye', '123456');
