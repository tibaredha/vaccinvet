-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 09 Juillet 2013 à 18:28
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `vaccinvet`
--

-- --------------------------------------------------------

--
-- Structure de la table `BAMAP`
--

CREATE TABLE IF NOT EXISTS `BAMAP` (
  `IDBAM`   int(11) NOT NULL AUTO_INCREMENT,
  `DATEBAM` date NOT NULL            COMMENT '',
  `NOM`     varchar(50) DEFAULT NULL COMMENT '',
  `PRENOM`  varchar(50) DEFAULT NULL COMMENT '',
  `WILAYAR` int(25) NOT NULL         COMMENT '',
  `DAIRA`   int(25) NOT NULL         COMMENT '',
  `COMMUNER`int(25) NOT NULL         COMMENT '',
  `ADRESSE` varchar(50) DEFAULT NULL COMMENT '',
  `AVN`     int(25) NOT NULL         COMMENT '',
  `AVND`    int(25) NOT NULL         COMMENT '',
  `AVNW`    int(25) NOT NULL         COMMENT '',
  `WIL`     int(25) NOT NULL         COMMENT '',
  `DAI`     int(25) NOT NULL         COMMENT '',
  `COM`     int(25) NOT NULL         COMMENT '',
  
  `A1`     varchar(50) DEFAULT NULL COMMENT '',
  `A2`     int(25) NOT NULL         COMMENT '',
  `A3`     varchar(50) DEFAULT NULL COMMENT '',
  
 
 PRIMARY KEY (`IDBAM`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




