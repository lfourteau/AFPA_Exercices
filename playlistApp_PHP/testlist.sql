-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 09 Novembre 2016 à 10:23
-- Version du serveur :  5.7.16-0ubuntu0.16.04.1
-- Version de PHP :  7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `testlist`
--

-- --------------------------------------------------------

--
-- Structure de la table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `user_id`) VALUES
(16, 'bidouille', 42),
(18, 'test2', 42),
(48, 'bisoulist', 45),
(58, 'eczecz', 42),
(60, 'zqdzqdzqd', 42),
(61, 'teeeeeeest', 0);

-- --------------------------------------------------------

--
-- Structure de la table `playlistsTracks`
--

CREATE TABLE `playlistsTracks` (
  `id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `track_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `playlistsTracks`
--

INSERT INTO `playlistsTracks` (`id`, `playlist_id`, `track_id`) VALUES
(13, 16, 9),
(42, 16, 6),
(59, 16, 29),
(64, 50, 9),
(65, 16, 31),
(66, 62, 9),
(67, 18, 9);

-- --------------------------------------------------------

--
-- Structure de la table `Tracklist`
--

CREATE TABLE `Tracklist` (
  `id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `duration` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `artist` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Tracklist`
--

INSERT INTO `Tracklist` (`id`, `title`, `duration`, `year`, `artist`) VALUES
(1, 'Guaranteed', 300, 2010, 'Eddie Vedder'),
(2, 'Iron', 196, 2012, 'Woodkid'),
(3, 'Hotel California', 398, 1972, 'Eagles');

-- --------------------------------------------------------

--
-- Structure de la table `tracks`
--

CREATE TABLE `tracks` (
  `id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `artist` varchar(90) NOT NULL,
  `duration` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `uploadTrack_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tracks`
--

INSERT INTO `tracks` (`id`, `title`, `artist`, `duration`, `year`, `uploadTrack_name`) VALUES
(6, 'Test', 'rico l\'asticot', 2, 2016, ''),
(9, 'toierzq', 'zkfesj', 6, 4, ''),
(37, 'Guarranted', 'Eddie Vedder', 320, 2005, 'Guarranted.mp3');

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Users`
--

INSERT INTO `Users` (`id`, `pseudo`, `password`, `email`) VALUES
(42, 'YoLu', '82455e63ba7eddb734879d4fd9355c633dd28c33', 'yolu@yolu.com'),
(43, 'manak', '4ec844dae165816ebad5cb5ed77840e2484047d6', 'lulu@lulu.com');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `playlistsTracks`
--
ALTER TABLE `playlistsTracks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Tracklist`
--
ALTER TABLE `Tracklist`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT pour la table `playlistsTracks`
--
ALTER TABLE `playlistsTracks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT pour la table `Tracklist`
--
ALTER TABLE `Tracklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
