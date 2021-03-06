-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 19 Mai 2016 à 11:34
-- Version du serveur: 5.5.49-0ubuntu0.14.04.1-log
-- Version de PHP: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `reunion_island`
--
CREATE DATABASE IF NOT EXISTS `reunion_island` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `reunion_island`;

-- --------------------------------------------------------

--
-- Structure de la table `hiking`
--

DROP TABLE IF EXISTS `hiking`;
CREATE TABLE IF NOT EXISTS `hiking` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `difficulty` enum('très facile','facile','moyen','difficile','très difficile') NOT NULL,
  `distance` int(11) NOT NULL COMMENT 'in km',
  `duration` time NOT NULL,
  `height_difference` int(6) NOT NULL COMMENT 'in m',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `hiking` (`name`,`difficulty`,`distance`,`duration`,`height_difference`)
VALUES ('De Cilaos au cœur du Piton des Neiges par le Bassin Bleu et la Tête de Lion','très difficile',8.5,'08:30:00',1250),
('De Cilaos au Maïdo par le Taïbit et les cascades de Bras Rouge et 3 Roches','très difficile',25.5,'09:30:00',2450),
('De la route de Cilaos à l\'Ilet à Malheur','difficile',2.2,'02:30:00',380),
('De Palmiste Rouge au sommet du Piton Gros Galet','difficile',7.5,'03:30:00',750),
('Du Maïdo au Maïdo par l\'Îlet et le Rempart des Orangers','très difficile',13,'09:00:00',1200);