-- 
-- Création de la base de données jeuxVideo
-- et des tables associées
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Base de données :  `jeuxVideo`
--
DROP DATABASE IF EXISTS `jeuxVideo`;
CREATE DATABASE `jeuxVideo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `jeuxVideo`;

-- ***************************************************
-- *
-- * Structure des tables
-- *
-- ***************************************************

--
-- Structure de la table `Avis`
--

CREATE TABLE `Avis` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_DLC` int(11) ,
  `id_JeuxSupport` int(11) ,
  `id_Testes` int(11) ,
  `texte` varchar(500) NOT NULL,
  `idUtilisateurs` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `DLC`
--

CREATE TABLE `DLC` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Editeur_id` int(11) NOT NULL,
  `DateSortie` date NOT NULL,
  `id_JeuxSupport` int(11) NOT NULL,
  `lien` varchar(250)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Editeur`
--

CREATE TABLE `Editeur` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `lien` varchar(250)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Jeux`
--

CREATE TABLE `Jeux` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `Editeur_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `pegi` int(11) DEFAULT NULL,
  `lien` varchar(250)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Jeux_has_Support`
--

CREATE TABLE `Jeux_has_Support` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Jeux_id` int(11) NOT NULL,
  `Support_id` int(11) NOT NULL,
  `DateSortie` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Support`
--

CREATE TABLE `Support` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `DateSortie` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Tests`
--

CREATE TABLE `Tests` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_DLC` int(11) ,
  `id_JeuxSupport` int(11) ,
  `texte` varchar(500) NOT NULL,
  `idUtilisateurs` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `droits` int(11) NOT NULL DEFAULT '4',
  `pseudo` varchar(100) NOT NULL,
  `motPass` varchar(606) NOT NULL,
  `email` varchar(160) NOT NULL,
  `dateNaissance` date
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ***************************************************
-- *
-- * Clefs étrangères des tables
-- *
-- ***************************************************

--
-- Index pour la table `Avis`
--
ALTER TABLE `Avis`
  ADD FOREIGN KEY (`id_DLC`) REFERENCES `DLC` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD FOREIGN KEY (`id_JeuxSupport`) REFERENCES `Jeux_has_Support` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD FOREIGN KEY (`id_Testes`) REFERENCES `Tests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD FOREIGN KEY (`idUtilisateurs`) REFERENCES `Utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ;


--
-- Index pour la table `DLC`
--
ALTER TABLE `DLC`
  ADD FOREIGN KEY (`Editeur_id`) REFERENCES `Editeur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD FOREIGN KEY (`id_JeuxSupport`) REFERENCES `Jeux_has_Support` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ;

--
-- Index pour la table `Jeux`
--
ALTER TABLE `Jeux`
  ADD FOREIGN KEY (`Editeur_id`) REFERENCES `Editeur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ;

--
-- Index pour la table `Jeux_has_Support`
--
ALTER TABLE `Jeux_has_Support`
  ADD FOREIGN KEY (`Jeux_id`) REFERENCES `Jeux` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD FOREIGN KEY (`Support_id`) REFERENCES `Support` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ;


--
-- Index pour la table `Tests`
--
ALTER TABLE `Tests`
  ADD FOREIGN KEY (`id_DLC`) REFERENCES `DLC` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD FOREIGN KEY (`id_JeuxSupport`) REFERENCES `Jeux_has_Support` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD FOREIGN KEY (`idUtilisateurs`) REFERENCES `Utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ;
