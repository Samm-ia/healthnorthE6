-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 22 jan. 2026 à 15:56
-- Version du serveur : 5.7.44
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `healthnorthE6`
--

-- --------------------------------------------------------

--
-- Structure de la table `Examens`
--

CREATE TABLE `Examens` (
  `id_examen` int(11) NOT NULL,
  `type_examen` varchar(150) DEFAULT NULL,
  `date_examen` date DEFAULT NULL,
  `resultat` text,
  `id_patient` int(11) DEFAULT NULL,
  `id_labo` int(11) DEFAULT NULL,
  `id_medecin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Laboratoires`
--

CREATE TABLE `Laboratoires` (
  `id_labo` int(11) NOT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Medecins`
--

CREATE TABLE `Medecins` (
  `id_medecin` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `specialite` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Ordonnances`
--

CREATE TABLE `Ordonnances` (
  `id_ordonnance` int(11) NOT NULL,
  `date_ordonnance` date NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `contenu` text,
  `id_patient` int(11) DEFAULT NULL,
  `id_medecin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Patients`
--

CREATE TABLE `Patients` (
  `id_patient` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `num_secu` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `RendezVous`
--

CREATE TABLE `RendezVous` (
  `id_rdv` int(11) NOT NULL,
  `date_rdv` date NOT NULL,
  `heure` time NOT NULL,
  `specialite` varchar(100) DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `id_patient` int(11) DEFAULT NULL,
  `id_medecin` int(11) DEFAULT NULL,
  `id_secretaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Secretaires`
--

CREATE TABLE `Secretaires` (
  `id_secretaire` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Examens`
--
ALTER TABLE `Examens`
  ADD PRIMARY KEY (`id_examen`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_labo` (`id_labo`),
  ADD KEY `id_medecin` (`id_medecin`);

--
-- Index pour la table `Laboratoires`
--
ALTER TABLE `Laboratoires`
  ADD PRIMARY KEY (`id_labo`);

--
-- Index pour la table `Medecins`
--
ALTER TABLE `Medecins`
  ADD PRIMARY KEY (`id_medecin`);

--
-- Index pour la table `Ordonnances`
--
ALTER TABLE `Ordonnances`
  ADD PRIMARY KEY (`id_ordonnance`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_medecin` (`id_medecin`);

--
-- Index pour la table `Patients`
--
ALTER TABLE `Patients`
  ADD PRIMARY KEY (`id_patient`);

--
-- Index pour la table `RendezVous`
--
ALTER TABLE `RendezVous`
  ADD PRIMARY KEY (`id_rdv`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_medecin` (`id_medecin`),
  ADD KEY `id_secretaire` (`id_secretaire`);

--
-- Index pour la table `Secretaires`
--
ALTER TABLE `Secretaires`
  ADD PRIMARY KEY (`id_secretaire`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Examens`
--
ALTER TABLE `Examens`
  MODIFY `id_examen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Laboratoires`
--
ALTER TABLE `Laboratoires`
  MODIFY `id_labo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Medecins`
--
ALTER TABLE `Medecins`
  MODIFY `id_medecin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Ordonnances`
--
ALTER TABLE `Ordonnances`
  MODIFY `id_ordonnance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Patients`
--
ALTER TABLE `Patients`
  MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `RendezVous`
--
ALTER TABLE `RendezVous`
  MODIFY `id_rdv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Secretaires`
--
ALTER TABLE `Secretaires`
  MODIFY `id_secretaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Examens`
--
ALTER TABLE `Examens`
  ADD CONSTRAINT `examens_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `Patients` (`id_patient`),
  ADD CONSTRAINT `examens_ibfk_2` FOREIGN KEY (`id_labo`) REFERENCES `Laboratoires` (`id_labo`),
  ADD CONSTRAINT `examens_ibfk_3` FOREIGN KEY (`id_medecin`) REFERENCES `Medecins` (`id_medecin`);

--
-- Contraintes pour la table `Ordonnances`
--
ALTER TABLE `Ordonnances`
  ADD CONSTRAINT `ordonnances_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `Patients` (`id_patient`),
  ADD CONSTRAINT `ordonnances_ibfk_2` FOREIGN KEY (`id_medecin`) REFERENCES `Medecins` (`id_medecin`);

--
-- Contraintes pour la table `RendezVous`
--
ALTER TABLE `RendezVous`
  ADD CONSTRAINT `rendezvous_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `Patients` (`id_patient`),
  ADD CONSTRAINT `rendezvous_ibfk_2` FOREIGN KEY (`id_medecin`) REFERENCES `Medecins` (`id_medecin`),
  ADD CONSTRAINT `rendezvous_ibfk_3` FOREIGN KEY (`id_secretaire`) REFERENCES `Secretaires` (`id_secretaire`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
