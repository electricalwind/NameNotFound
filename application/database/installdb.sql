-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 06 Décembre 2013 à 03:47
-- Version du serveur: 5.5.33
-- Version de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `nuitdelinfo`
--

-- --------------------------------------------------------

--
-- Structure de la table `expertise`
--

DROP TABLE IF EXISTS `expertise`;
CREATE TABLE IF NOT EXISTS `expertise` (
  `idUser` int(11) NOT NULL,
  `idTheme` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  KEY `idUser` (`idUser`),
  KEY `idTheme` (`idTheme`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `expertise`
--

TRUNCATE TABLE `expertise`;
--
-- Contenu de la table `expertise`
--

INSERT INTO `expertise` (`idUser`, `idTheme`, `score`) VALUES
(2, 5, 2344),
(3, 5, 1000),
(2, 6, 101),
(2, 6, 101);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `id` (`id`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Vider la table avant d'insérer `question`
--

TRUNCATE TABLE `question`;
--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id`, `idUser`, `content`, `status`) VALUES
(17, 2, '0', '0');

-- --------------------------------------------------------

--
-- Structure de la table `question_theme`
--

DROP TABLE IF EXISTS `question_theme`;
CREATE TABLE IF NOT EXISTS `question_theme` (
  `idQuestion` int(11) NOT NULL,
  `idTheme` int(11) NOT NULL,
  PRIMARY KEY (`idQuestion`,`idTheme`),
  KEY `idTheme` (`idTheme`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `question_theme`
--

TRUNCATE TABLE `question_theme`;
-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Vider la table avant d'insérer `theme`
--

TRUNCATE TABLE `theme`;
--
-- Contenu de la table `theme`
--

INSERT INTO `theme` (`id`, `name`) VALUES
(5, 'Aquarium'),
(6, 'Poisson');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Vider la table avant d'insérer `user`
--

TRUNCATE TABLE `user`;
--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `email`) VALUES
(2, 'Cyril', '', '', ''),
(3, 'Matthieu', 'electricalWind', 'abcde', 'aaa');

-- --------------------------------------------------------

--
-- Structure de la table `user_expert`
--

DROP TABLE IF EXISTS `user_expert`;
CREATE TABLE IF NOT EXISTS `user_expert` (
  `idUser` int(11) NOT NULL,
  `idTheme` int(11) NOT NULL,
  UNIQUE KEY `idUser` (`idUser`),
  UNIQUE KEY `idTheme` (`idTheme`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `user_expert`
--

TRUNCATE TABLE `user_expert`;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `expertise`
--
ALTER TABLE `expertise`
ADD CONSTRAINT `expertise_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `expertise_ibfk_2` FOREIGN KEY (`idTheme`) REFERENCES `theme` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `question_theme`
--
ALTER TABLE `question_theme`
ADD CONSTRAINT `question_theme_ibfk_2` FOREIGN KEY (`idTheme`) REFERENCES `theme` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `question_theme_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_expert`
--
ALTER TABLE `user_expert`
ADD CONSTRAINT `user_expert_ibfk_2` FOREIGN KEY (`idTheme`) REFERENCES `theme` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `user_expert_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

-- End of file: enable foreign keys
SET FOREIGN_KEY_CHECKS = 1;
