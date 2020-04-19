-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 19 Avril 2020 à 19:16
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `enchere`
--
DROP DATABASE `enchere`;
CREATE DATABASE IF NOT EXISTS `enchere` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `enchere`;

-- --------------------------------------------------------

--
-- Structure de la table `encheres`
--

DROP TABLE IF EXISTS `encheres`;
CREATE TABLE `encheres` (
  `id` int(11) NOT NULL,
  `id_objet` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `encheres`
--

INSERT INTO `encheres` (`id`, `id_objet`, `id_utilisateur`, `prix`) VALUES
(1, 1, 1, 600);

-- --------------------------------------------------------

--
-- Structure de la table `objets`
--

DROP TABLE IF EXISTS `objets`;
CREATE TABLE `objets` (
  `id` int(11) NOT NULL,
  `id_vendeur` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `photo` text NOT NULL,
  `cat` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `objets`
--

INSERT INTO `objets` (`id`, `id_vendeur`, `nom`, `description`, `prix`, `photo`, `cat`, `type`, `date`) VALUES
(1, 1, 'ordi', 'blabla', 599.99, '', 0, 0, '2020-04-19 12:55:19'),
(2, 1, 'mac', 'blabla', 3000, '', 0, 0, '2020-04-19 12:55:19'),
(3, 1, 'iphone', 'blabla', 600, '', 0, 0, '2020-04-19 12:55:19'),
(4, 4, 'velo', 'blabla', 200, '', 1, 0, '2020-04-19 12:55:19'),
(5, 4, 'velo', 'blablablabla super velo', 200, '', 0, 2, '2020-04-19 12:55:19'),
(6, 4, 'table', 'mega table', 50, '', 0, 2, '2020-04-19 12:55:19');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `bg` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `mdp` text NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `mail`, `bg`, `avatar`, `mdp`, `admin`) VALUES
(1, 'aydev', 'contact@aydev.fr', 'https://images.unsplash.com/photo-1511447333015-45b65e60f6d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2623&q=80', '', 'toto42', 0),
(2, 'zef', 'ezf', '', '', 'zef', 1),
(3, 'zef', 'ezf', '', '', 'zef', 1),
(4, 'jojolapin', 'toto', 'https://c.wallhere.com/photos/9c/e1/ammunition_CAL_45_Colt_1911-179980.jpg!d', '', 'toto', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `encheres`
--
ALTER TABLE `encheres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `objets`
--
ALTER TABLE `objets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `encheres`
--
ALTER TABLE `encheres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `objets`
--
ALTER TABLE `objets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
