-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 21 oct. 2018 à 12:02
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd-pt`
--

-- --------------------------------------------------------

--
-- Structure de la table `associerclassespropositions`
--

DROP TABLE IF EXISTS `associerclassespropositions`;
CREATE TABLE IF NOT EXISTS `associerclassespropositions` (
  `codeProposition` int(11) NOT NULL,
  `codeClasse` int(11) NOT NULL,
  PRIMARY KEY (`codeProposition`,`codeClasse`),
  KEY `fk_classesPropositions` (`codeClasse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `associerclassespropositions`
--

INSERT INTO `associerclassespropositions` (`codeProposition`, `codeClasse`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `associerentreprisescontact`
--

DROP TABLE IF EXISTS `associerentreprisescontact`;
CREATE TABLE IF NOT EXISTS `associerentreprisescontact` (
  `codeEntreprise` int(11) NOT NULL,
  `codeContact` int(11) NOT NULL,
  PRIMARY KEY (`codeEntreprise`,`codeContact`),
  KEY `fk_codeContactEntreprise` (`codeContact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `associerentreprisescontact`
--

INSERT INTO `associerentreprisescontact` (`codeEntreprise`, `codeContact`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `associertechnologiespropositions`
--

DROP TABLE IF EXISTS `associertechnologiespropositions`;
CREATE TABLE IF NOT EXISTS `associertechnologiespropositions` (
  `codeTechnololgie` int(11) NOT NULL,
  `codeProposition` int(11) NOT NULL,
  PRIMARY KEY (`codeTechnololgie`,`codeProposition`),
  KEY `fk_codePropositionTechnologie` (`codeProposition`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `associertechnologiespropositions`
--

INSERT INTO `associertechnologiespropositions` (`codeTechnololgie`, `codeProposition`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `codeClasse` int(11) NOT NULL AUTO_INCREMENT,
  `nomClasse` varchar(30) NOT NULL,
  PRIMARY KEY (`codeClasse`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`codeClasse`, `nomClasse`) VALUES
(1, 'LP-APIDAE'),
(2, 'LP-ACPI');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `codeContact` int(11) NOT NULL AUTO_INCREMENT,
  `nomContact` varchar(30) NOT NULL,
  `prenomContact` varchar(30) NOT NULL,
  `mailContact` varchar(30) NOT NULL,
  `telContact` char(10) NOT NULL,
  PRIMARY KEY (`codeContact`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`codeContact`, `nomContact`, `prenomContact`, `mailContact`, `telContact`) VALUES
(1, 'Dupont', 'Jean', 'dupontjean@gormail.fr', '0685956520'),
(2, 'Durand', 'John', 'johndurand@mail.fr', '0652359585');

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

DROP TABLE IF EXISTS `entreprises`;
CREATE TABLE IF NOT EXISTS `entreprises` (
  `codeEntreprise` int(11) NOT NULL AUTO_INCREMENT,
  `nomEntreprise` varchar(30) NOT NULL,
  `adresseEntreprise` varchar(60) NOT NULL,
  `villeEntreprise` varchar(30) NOT NULL,
  `codePostalEntreprise` int(5) NOT NULL,
  `telEntreprise` char(10) NOT NULL,
  PRIMARY KEY (`codeEntreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`codeEntreprise`, `nomEntreprise`, `adresseEntreprise`, `villeEntreprise`, `codePostalEntreprise`, `telEntreprise`) VALUES
(1, 'ToHero', '1 rue Emile Ain', 'Montpellier', 34090, '0642520665');

-- --------------------------------------------------------

--
-- Structure de la table `propositions`
--

DROP TABLE IF EXISTS `propositions`;
CREATE TABLE IF NOT EXISTS `propositions` (
  `codeProposition` int(11) NOT NULL AUTO_INCREMENT,
  `titreProposition` varchar(30) NOT NULL,
  `descriptionProposition` varchar(1000) NOT NULL,
  `codeEntreprise` int(11) NOT NULL,
  PRIMARY KEY (`codeProposition`),
  KEY `fk_codeEntreprise` (`codeEntreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `propositions`
--

INSERT INTO `propositions` (`codeProposition`, `titreProposition`, `descriptionProposition`, `codeEntreprise`) VALUES
(1, 'Developpeur Web - PHP/JAVA', 'Vous serez amenez à développer dans une équipe de développeur sur le site officiel de WAKANIM pour mettre à jour les fonctionnalités du site', 1);

-- --------------------------------------------------------

--
-- Structure de la table `technologies`
--

DROP TABLE IF EXISTS `technologies`;
CREATE TABLE IF NOT EXISTS `technologies` (
  `codeTechnololgie` int(11) NOT NULL AUTO_INCREMENT,
  `nomTechnologie` varchar(30) NOT NULL,
  PRIMARY KEY (`codeTechnololgie`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `technologies`
--

INSERT INTO `technologies` (`codeTechnololgie`, `nomTechnologie`) VALUES
(1, 'PHP'),
(2, 'JAVA'),
(3, 'JAVASCRIPT');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `associerclassespropositions`
--
ALTER TABLE `associerclassespropositions`
  ADD CONSTRAINT `fk_classesPropositions` FOREIGN KEY (`codeClasse`) REFERENCES `classes` (`codeClasse`),
  ADD CONSTRAINT `fk_propositionsClasses` FOREIGN KEY (`codeProposition`) REFERENCES `propositions` (`codeProposition`);

--
-- Contraintes pour la table `associerentreprisescontact`
--
ALTER TABLE `associerentreprisescontact`
  ADD CONSTRAINT `fk_codeContactEntreprise` FOREIGN KEY (`codeContact`) REFERENCES `contacts` (`codeContact`),
  ADD CONSTRAINT `fk_codeEntrepriseContact` FOREIGN KEY (`codeEntreprise`) REFERENCES `entreprises` (`codeEntreprise`);

--
-- Contraintes pour la table `associertechnologiespropositions`
--
ALTER TABLE `associertechnologiespropositions`
  ADD CONSTRAINT `fk_codePropositionTechnologie` FOREIGN KEY (`codeProposition`) REFERENCES `propositions` (`codeProposition`),
  ADD CONSTRAINT `fk_codeTechnologieProposition` FOREIGN KEY (`codeTechnololgie`) REFERENCES `technologies` (`codeTechnololgie`);

--
-- Contraintes pour la table `propositions`
--
ALTER TABLE `propositions`
  ADD CONSTRAINT `fk_codeEntreprise` FOREIGN KEY (`codeEntreprise`) REFERENCES `entreprises` (`codeEntreprise`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
