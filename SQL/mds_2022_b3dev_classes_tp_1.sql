-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 14 déc. 2022 à 22:47
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mds_2022_b3dev_classes_tp_1`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `serie_id` int(11) DEFAULT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(200) NOT NULL,
  `num` smallint(6) NOT NULL,
  `scriptwriter` varchar(50) NOT NULL,
  `illustrator` varchar(100) NOT NULL,
  `editor` varchar(100) DEFAULT NULL,
  `releaseyear` smallint(6) DEFAULT NULL,
  `strips` smallint(255) UNSIGNED DEFAULT NULL,
  `cover` varchar(30) DEFAULT NULL,
  `rep` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `created`, `serie_id`, `updated`, `title`, `num`, `scriptwriter`, `illustrator`, `editor`, `releaseyear`, `strips`, `cover`, `rep`) VALUES
(1, '2022-12-14 20:44:01', 1, '2022-12-14 21:54:33', 'test', 12346, 'Julien', 'deoliv', 'test.jpg', 2019, NULL, 'test1', 0);

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `origin` varchar(25) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`id`, `title`, `origin`, `created`, `updated`) VALUES
(1, 'petit test', 'test', '2022-11-09 15:17:35', '0000-00-00 00:00:00'),
(5, 'game of thrones', 'France ', '2022-11-09 16:21:25', '0000-00-00 00:00:00'),
(6, 'Speederman', 'Usa', '2022-11-09 16:21:42', '0000-00-00 00:00:00'),
(7, 'Superman', 'usa', '2022-11-09 16:22:09', '0000-00-00 00:00:00'),
(11, 'Batmanos', 'usa', '2022-11-09 16:37:57', '2022-12-14 20:32:37');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
