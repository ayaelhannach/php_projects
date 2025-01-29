-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 23 juin 2024 à 18:35
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
-- Base de données : `gestionstagiaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `compteadministrateur`
--

CREATE TABLE `compteadministrateur` (
  `LoginAdmin` varchar(10) NOT NULL,
  `MotPasse` varchar(10) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `compteadministrateur`
--

INSERT INTO `compteadministrateur` (`LoginAdmin`, `MotPasse`, `Nom`, `Prenom`) VALUES
('aya', 'ayaelhanna', '', ''),
('aya', 'sajhs', '', ''),
('aya', 'شيببل', '', ''),
('aya', 'vsxjaschj', '', ''),
('aya', 'bjhcdbjsdb', '', ''),
('aya el han', 'ayaelhanna', '', ''),
('aya', 'ajhbzh', '', ''),
('شغشالاتءؤ', 'لايؤرلاىي', '', ''),
('aya', 'bcxbnjc', '', ''),
('Aya el han', 'شغشثماشىىش', '', ''),
('Aya el han', 'ayaelhanna', '', ''),
('Aya el han', 'ayaelhanna', '', ''),
('ccccvb', 'c xcvv', '', ''),
('souhaila', 'akka', '', ''),
('ayaelhanna', 'aya', 'el hannach', 'Aya');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `idFiliere` varchar(5) NOT NULL,
  `intitule` varchar(20) NOT NULL,
  `NombreGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`idFiliere`, `intitule`, `NombreGroupe`) VALUES
('Devel', '', 0),
('Infra', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

CREATE TABLE `stagiaire` (
  `idStagiaire` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `dateNaissance` date NOT NULL,
  `PhotoProfil` text NOT NULL,
  `idFiliere` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stagiaire`
--

INSERT INTO `stagiaire` (`idStagiaire`, `nom`, `prenom`, `dateNaissance`, `PhotoProfil`, `idFiliere`) VALUES
(14, 'el hannach', 'aya', '2024-05-17', 'uploads/1331008.png', 'Devel'),
(16, 'el esmaili', 'Jude', '2024-06-15', 'uploads/360_F_502664679_sF9hQcfzc5hN8zBJKITYq0miQ0f9yIxM.jpg', 'Devel');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`idFiliere`);

--
-- Index pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD PRIMARY KEY (`idStagiaire`),
  ADD KEY `fk_idFiliere` (`idFiliere`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  MODIFY `idStagiaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD CONSTRAINT `fk_idFiliere` FOREIGN KEY (`idFiliere`) REFERENCES `filiere` (`idFiliere`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
