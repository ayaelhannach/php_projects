-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 02 juin 2024 à 15:43
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
-- Base de données : `gestionstagiaire_v1`
--

-- --------------------------------------------------------

--
-- Structure de la table `comptesadministrateurs`
--

CREATE TABLE `comptesadministrateurs` (
  `loginAdmin` varchar(10) NOT NULL,
  `motpass` varchar(10) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comptesadministrateurs`
--

INSERT INTO `comptesadministrateurs` (`loginAdmin`, `motpass`, `nom`, `prenom`) VALUES
('userManal', 'ManalMns', 'Mansori', 'Manal');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `idfiliere` varchar(5) NOT NULL,
  `intitule` varchar(20) NOT NULL,
  `nombreGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`idfiliere`, `intitule`, `nombreGroupe`) VALUES
('devel', '', 0),
('infra', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `stagiaires`
--

CREATE TABLE `stagiaires` (
  `idstagiaiares` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `dateNaissance` date NOT NULL,
  `idfiliere` varchar(5) NOT NULL,
  `photoprofil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stagiaires`
--

INSERT INTO `stagiaires` (`idstagiaiares`, `nom`, `prenom`, `dateNaissance`, `idfiliere`, `photoprofil`) VALUES
(7, 'chorki', 'Douae', '2024-06-06', 'Devel', '1331008.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`idfiliere`);

--
-- Index pour la table `stagiaires`
--
ALTER TABLE `stagiaires`
  ADD PRIMARY KEY (`idstagiaiares`),
  ADD KEY `idfiliere` (`idfiliere`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `stagiaires`
--
ALTER TABLE `stagiaires`
  MODIFY `idstagiaiares` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `stagiaires`
--
ALTER TABLE `stagiaires`
  ADD CONSTRAINT `stagiaires_ibfk_1` FOREIGN KEY (`idfiliere`) REFERENCES `filiere` (`idfiliere`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
