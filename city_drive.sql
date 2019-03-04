-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 04 mars 2019 à 19:30
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `city_drive`
--

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idEmployee` int(11) NOT NULL,
  `timeStart` timestamp NULL DEFAULT NULL,
  `timeEnd` timestamp NULL DEFAULT NULL,
  `idPayment` int(11) DEFAULT NULL,
  `nbrKm` int(11) DEFAULT NULL,
  `services` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  KEY `idEmployee` (`idEmployee`),
  KEY `idPayment` (`idPayment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(25) NOT NULL,
  `secondName` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `picProfil` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `country` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `dptCode` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dateStart` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`id`, `firstName`, `secondName`, `username`, `picProfil`, `birthday`, `email`, `phone`, `country`, `address`, `city`, `dptCode`, `password`, `dateStart`) VALUES
(1, 'Test', 'Chauffeur', 'chauffeur1', 'blue.jpg', NULL, 'chauffeur1@gmail.com', NULL, 'FRANCE', '1 rue de france', 'Paris', '75001', '1234', '2019-03-04 15:27:42');

-- --------------------------------------------------------

--
-- Structure de la table `pay`
--

DROP TABLE IF EXISTS `pay`;
CREATE TABLE IF NOT EXISTS `pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEmployee` int(11) NOT NULL,
  `job` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) DEFAULT NULL,
  `available` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEmployee` (`idEmployee`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `idEmployee`, `job`, `description`, `price`, `available`) VALUES
(1, 1, 'chauffeur', 'tis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore, sed quia consequuntur ma', NULL, '1');

-- --------------------------------------------------------

--
-- Structure de la table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
CREATE TABLE IF NOT EXISTS `subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end` timestamp NOT NULL,
  `idSub` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  KEY `idSub` (`idSub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `subusertype`
--

DROP TABLE IF EXISTS `subusertype`;
CREATE TABLE IF NOT EXISTS `subusertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(25) NOT NULL,
  `secondName` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `country` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `dptCode` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dateReg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastConnection` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `codeSecure` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstName`, `secondName`, `username`, `birthday`, `email`, `phone`, `country`, `address`, `city`, `dptCode`, `password`, `dateReg`, `lastConnection`, `codeSecure`) VALUES
(1, 'test prénom1', 'test nom1', 'testuser', NULL, 'test@test.fr', NULL, 'france', '1 rue de paris', 'paris', '75001', '1234', '2019-02-21 20:36:05', '2019-02-21 20:36:05', '36ed7e6895aa61'),
(2, 'test prénom2', 'test nom2', 'testuser2', NULL, 'test2@test.fr', NULL, 'france', '1 rue de paris', 'paris', '75002', '$2y$10$nJpc0KIZWgAiDDjvj.u6B.RpePpZrYDwJKK34bq0zVVkkGmNDQy9a', '2019-02-22 14:03:12', '2019-03-04 16:52:13', '28bfa304c5723d'),
(3, 'test prénom3', 'test nom3', 'testuser3', NULL, 'test3@test.fr', NULL, 'france', '1 rue de paris', 'paris', '75003', '$2y$10$gnjATcIoMlEGT1W1Kbb3/eRVpfqj91nwJhHL2S8s7pmPd3p1KdFYq', '2019-02-22 14:05:15', '2019-02-22 14:05:15', 'afcff2cbd0c2d9'),
(4, 'test prénom4', 'test nom4', 'testuser4', NULL, 'test4@test.fr', NULL, 'FRANCE', '1 rue de paris', 'paris', '75004', '$2y$10$HGuNOVsIqE2Yx1TYrchO5eNs.UFqRFN9IxqxGYb60ieNMgcsihcQ.', '2019-02-22 14:09:02', '2019-02-22 14:09:02', 'f91447f03f80c7');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`idEmployee`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`idPayment`) REFERENCES `pay` (`id`);

--
-- Contraintes pour la table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`idEmployee`) REFERENCES `employee` (`id`);

--
-- Contraintes pour la table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`idSub`) REFERENCES `subusertype` (`id`),
  ADD CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
