-- ------------------------------- --
-- (RE)INSTALL THE ENTIRE DATABASE --
-- ------------------------------- --

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
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `idUser` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contraintes pour les tables exportées
--

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


-- End of file: enable foreign keys
SET FOREIGN_KEY_CHECKS = 1;
