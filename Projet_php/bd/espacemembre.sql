-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 28 juil. 2021 à 14:28
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Base de données : `espacemembre`--

-- --------------------------------------------------------
-- Structure de la table `cotisation`--

CREATE TABLE `cotisation` (
  `id` int(11) NOT NULL,
  `numcotis` varchar(120) NOT NULL,
  `datecotis` date NOT NULL,
  `mois` varchar(120) NOT NULL,
  `motif` varchar(120) NOT NULL,
  `montant` varchar(120) NOT NULL,
  `matricule` varchar(120) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Déchargement des données de la table `cotisation`

INSERT INTO `cotisation` (`id`, `numcotis`, `datecotis`, `mois`, `motif`, `montant`, `matricule`) VALUES
(1, '12DF4', '2021-07-07', 'Juillet', 'inscription', '150000', '3434J'),
(2, '13J56', '2021-08-03', 'Aout', 'mensualité', '40000', '13J34'),
(3, '15J45', '2021-08-04', 'Aout', 'inscription', '200000', 'J35H7'),
(4, '28J89', '2021-09-01', 'Juillet', 'mensualité', '25000', '47JD89'),

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `matricule` varchar(120) NOT NULL,
  `nom` varchar(120) NOT NULL,
  `prenom` varchar(120) NOT NULL,
  `adresse` varchar(120) NOT NULL,
  `tel` varchar(120) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membre`

INSERT INTO `membre` (`id`, `matricule`, `nom`, `prenom`, `adresse`, `tel`) VALUES
(1, 'J1056', 'NDIAYE', 'Adama', 'GOSSAS', '778865677'),
(2, 'J1057', 'NDIAYE', 'Awa', 'DAKAR', '774546708'),
(3, 'J1059', 'DIOP', 'Gora', 'DAKAR', '704890348'),
(10, '00J67', 'GUEYE', 'Fallou', 'FATCK', '786568090');


-- Index pour les tables déchargées



-- Index pour la table `cotisation`

ALTER TABLE `cotisation`
  ADD PRIMARY KEY (`id`);


-- Index pour la table `membre`

ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);


-- AUTO_INCREMENT pour la table `cotisation`

ALTER TABLE `cotisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


-- AUTO_INCREMENT pour la table `membre`

ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

