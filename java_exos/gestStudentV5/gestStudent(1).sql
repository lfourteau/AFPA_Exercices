-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 27 Janvier 2017 à 11:47
-- Version du serveur :  5.7.17-0ubuntu0.16.04.1
-- Version de PHP :  7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestStudent`
--

-- --------------------------------------------------------

--
-- Structure de la table `ecf`
--

CREATE TABLE `ecf` (
  `id` int(11) NOT NULL,
  `ecf_nom` varchar(75) NOT NULL,
  `form_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ecf`
--

INSERT INTO `ecf` (`id`, `ecf_nom`, `form_id`) VALUES
(1, 'Java', 1),
(2, 'PHP', 1),
(3, 'HTML', 1),
(4, 'CSS', 1);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`id`, `nom`) VALUES
(1, 'Développeur logiciel'),
(2, 'Carreleur'),
(3, 'Plaquiste'),
(4, 'Crépier'),
(9, 'Dévellopement personnel'),
(10, 'sdcscdscdsc'),
(11, 'sdsqdqsdsqd'),
(12, 'swcscwscwsc');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id` int(11) NOT NULL,
  `nom` varchar(75) NOT NULL,
  `prenom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`) VALUES
(4, 'test', 'test'),
(13, 'nomdl', 'prenomdl'),
(43, 'azer', 'azer'),
(60, 'vsddsv', 'vdsvdsvdsv'),
(61, 'hola', 'hola'),
(62, 'aie', 'ouille'),
(63, 'aiuauau', 'aaaaaaaaaaaaah'),
(64, 'qzdzqdqz', 'dqzdqzdzqd'),
(65, 'ohla', 'ouille'),
(80, 'dqzdqzd', 'qzdqzdq'),
(81, 'zqdqzdqzd', 'qzdqzdqzdzqdq'),
(82, 'qzdqzdqzdq', 'zdqzdqdqzd'),
(83, 'dqzdqzdq', 'zdqzdqzdqz'),
(84, 'dqzdqzd', 'qzdqdqzdq'),
(85, 'qzdqzdqz', 'dqzdqzdq'),
(86, 'qzdqzdqzd', 'qzdqzdqdzqd'),
(87, 'dqzdqzdq', 'zdqzdqzdqd'),
(88, 'qzdqzdqdq', 'dqzdqzdqzdzqd'),
(89, 'qzdqz', 'dqzdqzdqzd'),
(90, 'zqdqzdq', 'zdqzdqzd'),
(91, 'zqdqzdqz', 'dqzdqzd'),
(92, 'qzdqzdqzd', 'qzdqzdqzd'),
(93, 'qzdqzdqz', 'dqzdqzd'),
(94, 'zdqzdqz', 'dqzdqzdqzd');

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

CREATE TABLE `resultat` (
  `ecf_id` int(11) NOT NULL,
  `stag_id` varchar(11) NOT NULL,
  `validate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `resultat`
--

INSERT INTO `resultat` (`ecf_id`, `stag_id`, `validate`) VALUES
(1, 'UP165116', 1),
(2, 'UP165116', 1),
(3, 'UP165116', 0),
(4, 'UP165116', 1),
(1, 'HL870812', 0),
(2, 'HL870812', 1),
(3, 'HL870812', 1),
(4, 'HL870812', 0);

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

CREATE TABLE `stagiaire` (
  `matricule` varchar(11) NOT NULL,
  `pers_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `stagiaire`
--

INSERT INTO `stagiaire` (`matricule`, `pers_id`, `form_id`) VALUES
('AJ616075', 62, 1),
('BS474888', 94, 4),
('CM958444', 90, 9),
('DB390428', 61, 1),
('DI142732', 83, 2),
('DV390662', 91, 9),
('FJ857334', 87, 3),
('GB240211', 64, 1),
('GI843563', 81, 2),
('HL669475', 63, 1),
('HL870812', 43, 1),
('HP722908', 80, 2),
('HW747530', 88, 3),
('JA353387', 82, 2),
('JH528473', 86, 3),
('LO944084', 85, 3),
('MV811087', 89, 9),
('NA093761', 93, 4),
('NY359306', 92, 4),
('QE462757', 65, 1),
('SE439359', 60, 1),
('UP165116', 13, 1),
('YV425087', 84, 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ecf`
--
ALTER TABLE `ecf`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id` (`form_id`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD KEY `ecf_id` (`ecf_id`),
  ADD KEY `stag_id` (`stag_id`);

--
-- Index pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD PRIMARY KEY (`matricule`),
  ADD UNIQUE KEY `matricule` (`matricule`),
  ADD KEY `pers_id` (`pers_id`),
  ADD KEY `form_id` (`form_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ecf`
--
ALTER TABLE `ecf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ecf`
--
ALTER TABLE `ecf`
  ADD CONSTRAINT `ecf_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `formation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD CONSTRAINT `resultat_ibfk_2` FOREIGN KEY (`ecf_id`) REFERENCES `ecf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resultat_ibfk_3` FOREIGN KEY (`stag_id`) REFERENCES `stagiaire` (`matricule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD CONSTRAINT `stagiaire_ibfk_1` FOREIGN KEY (`pers_id`) REFERENCES `personne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stagiaire_ibfk_2` FOREIGN KEY (`form_id`) REFERENCES `formation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
