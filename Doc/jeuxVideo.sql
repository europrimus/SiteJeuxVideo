-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 19 Avril 2018 à 16:05
-- Version du serveur :  10.0.34-MariaDB-0ubuntu0.16.04.1
-- Version de PHP :  7.0.29-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jeuxVideo`
--
CREATE DATABASE IF NOT EXISTS `jeuxVideo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `jeuxVideo`;

-- --------------------------------------------------------

--
-- Structure de la table `DLC`
--

DROP TABLE IF EXISTS `DLC`;
CREATE TABLE `DLC` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL DEFAULT 'Non défini',
  `Editeur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `DLC`
--

INSERT INTO `DLC` (`id`, `nom`, `Description`, `Editeur_id`) VALUES
(1, 'Mon DLC', 'Non défini', 2),
(2, 'Super DLC', 'Non défini', 3);

-- --------------------------------------------------------

--
-- Structure de la table `Editeur`
--

DROP TABLE IF EXISTS `Editeur`;
CREATE TABLE `Editeur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Editeur`
--

INSERT INTO `Editeur` (`id`, `nom`) VALUES
(2, '3D Realms'),
(1, 'Infogrames'),
(3, 'Konami'),
(4, 'Sega');

-- --------------------------------------------------------

--
-- Structure de la table `Jeux`
--

DROP TABLE IF EXISTS `Jeux`;
CREATE TABLE `Jeux` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `Editeur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Jeux`
--

INSERT INTO `Jeux` (`id`, `nom`, `Editeur_id`) VALUES
(1, 'Mario kart', 1),
(2, 'Wii sport', 2),
(3, 'Endless ocean', 3),
(4, 'Sport Méca', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Jeux_has_Support`
--

DROP TABLE IF EXISTS `Jeux_has_Support`;
CREATE TABLE `Jeux_has_Support` (
  `id` int(11) NOT NULL,
  `Jeux_id` int(11) NOT NULL,
  `Support_id` int(11) NOT NULL,
  `DLC_id` int(11) DEFAULT NULL,
  `DateSortie` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Jeux_has_Support`
--

INSERT INTO `Jeux_has_Support` (`id`, `Jeux_id`, `Support_id`, `DLC_id`, `DateSortie`) VALUES
(3, 1, 2, NULL, '2018-04-09'),
(4, 1, 3, NULL, '2018-04-18'),
(5, 1, 2, 1, '2018-04-19'),
(6, 1, 1, 2, '2018-04-11'),
(7, 1, 1, 1, '2018-04-12'),
(8, 1, 4, 1, '2018-04-12'),
(11, 2, 1, NULL, '2018-04-08'),
(12, 2, 1, 1, '2018-04-09');

-- --------------------------------------------------------

--
-- Structure de la table `Support`
--

DROP TABLE IF EXISTS `Support`;
CREATE TABLE `Support` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Support`
--

INSERT INTO `Support` (`id`, `nom`) VALUES
(4, 'Play station 3'),
(2, 'Play station 4'),
(1, 'Wii'),
(3, 'Wii U');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `DLC`
--
ALTER TABLE `DLC`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `nom_UNIQUE` (`nom`),
  ADD KEY `fk_DLC_Editeur1_idx` (`Editeur_id`);

--
-- Index pour la table `Editeur`
--
ALTER TABLE `Editeur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `nom_UNIQUE` (`nom`);

--
-- Index pour la table `Jeux`
--
ALTER TABLE `Jeux`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `nom_UNIQUE` (`nom`),
  ADD KEY `fk_Jeux_Editeur1_idx` (`Editeur_id`);

--
-- Index pour la table `Jeux_has_Support`
--
ALTER TABLE `Jeux_has_Support`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_Jeux_has_Support_Support1_idx` (`Support_id`),
  ADD KEY `fk_Jeux_has_Support_Jeux1_idx` (`Jeux_id`),
  ADD KEY `fk_Jeux_has_Support_DLC1_idx` (`DLC_id`);

--
-- Index pour la table `Support`
--
ALTER TABLE `Support`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `nom_UNIQUE` (`nom`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `DLC`
--
ALTER TABLE `DLC`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Editeur`
--
ALTER TABLE `Editeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Jeux`
--
ALTER TABLE `Jeux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Jeux_has_Support`
--
ALTER TABLE `Jeux_has_Support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `Support`
--
ALTER TABLE `Support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `DLC`
--
ALTER TABLE `DLC`
  ADD CONSTRAINT `fk_DLC_Editeur1` FOREIGN KEY (`Editeur_id`) REFERENCES `Editeur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Jeux`
--
ALTER TABLE `Jeux`
  ADD CONSTRAINT `fk_Jeux_Editeur1` FOREIGN KEY (`Editeur_id`) REFERENCES `Editeur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Jeux_has_Support`
--
ALTER TABLE `Jeux_has_Support`
  ADD CONSTRAINT `fk_Jeux_has_Support_DLC1` FOREIGN KEY (`DLC_id`) REFERENCES `DLC` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Jeux_has_Support_Jeux1` FOREIGN KEY (`Jeux_id`) REFERENCES `Jeux` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Jeux_has_Support_Support1` FOREIGN KEY (`Support_id`) REFERENCES `Support` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
