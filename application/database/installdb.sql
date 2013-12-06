SET FOREIGN_KEY_CHECKS = 0;

-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 06 Décembre 2013 à 06:08
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
  UNIQUE KEY `idUser` (`idUser`,`idTheme`),
  KEY `idTheme` (`idTheme`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `expertise`
--

TRUNCATE TABLE `expertise`;
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Vider la table avant d'insérer `question`
--

TRUNCATE TABLE `question`;
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
-- Structure de la table `relatives`
--

DROP TABLE IF EXISTS `relatives`;
CREATE TABLE IF NOT EXISTS `relatives` (
  `idUser1` int(11) NOT NULL,
  `idUser2` int(11) NOT NULL,
  UNIQUE KEY `idUser1` (`idUser1`,`idUser2`),
  KEY `idUser2` (`idUser2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `relatives`
--

TRUNCATE TABLE `relatives`;
-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idQuestion` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idQuestion` (`idQuestion`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Vider la table avant d'insérer `reponse`
--

TRUNCATE TABLE `reponse`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Vider la table avant d'insérer `theme`
--

TRUNCATE TABLE `theme`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Vider la table avant d'insérer `user`
--

TRUNCATE TABLE `user`;
--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `email`) VALUES
(1, 'Alice', 'alice', '', ''),
(2, 'bob', 'bob', '', '');

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
ADD CONSTRAINT `expertise_ibfk_2` FOREIGN KEY (`idTheme`) REFERENCES `theme` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `expertise_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `relatives`
--
ALTER TABLE `relatives`
ADD CONSTRAINT `relatives_ibfk_2` FOREIGN KEY (`idUser2`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `relatives_ibfk_1` FOREIGN KEY (`idUser1`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
ADD CONSTRAINT `reponse_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_expert`
--
ALTER TABLE `user_expert`
ADD CONSTRAINT `user_expert_ibfk_2` FOREIGN KEY (`idTheme`) REFERENCES `theme` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `user_expert_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;


-- End of file: enable foreign keys
SET FOREIGN_KEY_CHECKS = 1;
