-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 23 Novembre 2012 à 09:32
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gpts2012`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `IDP`       int(50) NOT NULL AUTO_INCREMENT,
  `REGION`    varchar(15) NOT NULL,
  `WILAYA`    varchar(25) NOT NULL,
  `STRUCTURE` varchar(30) NOT NULL,
  `SERVICE`   varchar(30) NOT NULL,
  `USER`      varchar(50) NOT NULL,
  `MDP`       varchar(50) NOT NULL,
  `ADMIN`     varchar(50) NOT NULL,
  `DATEINSC`  varchar(10) NOT NULL,
  `NOMARABE`  varchar(50) CHARACTER SET cp1256 COLLATE cp1256_bin DEFAULT NULL,
  PRIMARY KEY (`idp`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;


