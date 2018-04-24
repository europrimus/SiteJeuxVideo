-- 
-- Création de la base de données jeuxVideo
-- et des tables associées
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Base de données :  `jeuxvideo`
--
DROP DATABASE IF EXISTS `jeuxvideo`;
CREATE DATABASE `jeuxvideo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `jeuxvideo`;

-- ***************************************************
-- *
-- * Structure des tables
-- *
-- ***************************************************

--
-- Structure de la table `Avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_dlc` int(11) ,
  `id_jeuxsupport` int(11) ,
  `id_testes` int(11) ,
  `texte` varchar(500) NOT NULL,
  `idutilisateurs` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `DLC`
--

CREATE TABLE `dlc` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `editeur_id` int(11) NOT NULL,
  `id_jeuxsupport` int(11) NOT NULL,
  `lien` varchar(250)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Editeur`
--

CREATE TABLE `editeur` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `lien` varchar(250)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Jeux`
--

CREATE TABLE `jeux` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `editeur_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `pegi` int(11) DEFAULT NULL,
  `lien` varchar(250)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Jeux_has_Support`
--

CREATE TABLE `jeux_has_support` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `jeux_id` int(11) NOT NULL,
  `support_id` int(11) NOT NULL,
  `datesortie` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `datesortie` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_dlc` int(11) ,
  `id_jeuxsupport` int(11) ,
  `texte` varchar(500) NOT NULL,
  `idUtilisateurs` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `droits` int(11) NOT NULL DEFAULT '1',
  `pseudo` varchar(100) NOT NULL,
  `motpass` varchar(255) NOT NULL,
  `email` varchar(160) NOT NULL,
  `datenaissance` date
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------------------

--
-- Structure de la table `jeuxSupportDLC`
--

CREATE TABLE `jeuxsupportdlc` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_jeuxsupport` int(11) NOT NULL UNIQUE,
  `id_dlc` int(11) NOT NULL UNIQUE,
  `datesortie` date
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ***************************************************
-- *
-- * Clefs étrangères des tables
-- *
-- ***************************************************

--
-- Index pour la table `Avis`
--
ALTER TABLE `avis`
  ADD FOREIGN KEY (`id_dlc`) REFERENCES `dlc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD FOREIGN KEY (`id_jeuxsupport`) REFERENCES `jeux_has_support` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD FOREIGN KEY (`id_testes`) REFERENCES `tests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD FOREIGN KEY (`idutilisateurs`) REFERENCES `utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ;


--
-- Index pour la table `DLC`
--
ALTER TABLE `dlc`
  ADD FOREIGN KEY (`editeur_id`) REFERENCES `editeur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD FOREIGN KEY (`id_jeuxsupport`) REFERENCES `jeux_has_support` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ;

--
-- Index pour la table `Jeux`
--
ALTER TABLE `jeux`
  ADD FOREIGN KEY (`editeur_id`) REFERENCES `editeur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ;

--
-- Index pour la table `Jeux_has_Support`
--
ALTER TABLE `jeux_has_support`
  ADD FOREIGN KEY (`jeux_id`) REFERENCES `jeux` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD FOREIGN KEY (`support_id`) REFERENCES `support` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ;


--
-- Index pour la table `Tests`
--
ALTER TABLE `tests`
  ADD FOREIGN KEY (`id_dlc`) REFERENCES `dlc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD FOREIGN KEY (`id_jeuxsupport`) REFERENCES `jeux_has_support` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD FOREIGN KEY (`idutilisateurs`) REFERENCES `utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ;


--
-- Index pour la table `jeuxSupportDLC`
--
ALTER TABLE `jeuxsupportdlc`
  ADD FOREIGN KEY (`id_dlc`) REFERENCES `dlc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD FOREIGN KEY (`id_jeuxsupport`) REFERENCES `jeux_has_support` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ;
