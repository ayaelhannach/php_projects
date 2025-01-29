-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 23 juin 2024 à 20:34
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionavocat`
--

-- --------------------------------------------------------

--
-- Structure de la table `affaire`
--

CREATE TABLE `affaire` (
  `IdAffaire` int(11) NOT NULL,
  `Objet` varchar(45) DEFAULT NULL,
  `Type` varchar(45) DEFAULT NULL,
  `DateOvr` date DEFAULT NULL,
  `Etat` varchar(45) DEFAULT NULL,
  `Client` varchar(45) DEFAULT NULL,
  `PhotoJg` varchar(45) DEFAULT NULL,
  `IdAvocat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `avocat`
--

CREATE TABLE `avocat` (
  `IdAvocat` int(11) NOT NULL,
  `Nom` varchar(45) NOT NULL,
  `Prenom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avocat`
--

INSERT INTO `avocat` (`IdAvocat`, `Nom`, `Prenom`) VALUES
(1, 'el hannach', 'aya');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `IdCompte` int(11) NOT NULL,
  `Login` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`IdCompte`, `Login`, `Password`) VALUES
(1, 'aya', 'aya123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affaire`
--
ALTER TABLE `affaire`
  ADD PRIMARY KEY (`IdAffaire`),
  ADD KEY `IdAvocat` (`IdAvocat`);

--
-- Index pour la table `avocat`
--
ALTER TABLE `avocat`
  ADD PRIMARY KEY (`IdAvocat`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`IdCompte`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affaire`
--
ALTER TABLE `affaire`
  MODIFY `IdAffaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `avocat`
--
ALTER TABLE `avocat`
  MODIFY `IdAvocat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `IdCompte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affaire`
--
ALTER TABLE `affaire`
  ADD CONSTRAINT `affaire_ibfk_1` FOREIGN KEY (`IdAvocat`) REFERENCES `avocat` (`IdAvocat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
