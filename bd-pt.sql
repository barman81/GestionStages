-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 26 oct. 2018 à 11:08
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
-- Structure de la table `associerentreprisesdomaine`
--

DROP TABLE IF EXISTS `associerentreprisesdomaine`;
CREATE TABLE IF NOT EXISTS `associerentreprisesdomaine` (
  `codeEntreprise` int(11) NOT NULL,
  `codeDomaine` int(11) NOT NULL,
  PRIMARY KEY (`codeEntreprise`,`codeDomaine`),
  KEY `fk_codeDomaineEntreprise` (`codeDomaine`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `associerentreprisesdomaine`
--

INSERT INTO `associerentreprisesdomaine` (`codeEntreprise`, `codeDomaine`) VALUES
(1, 2),
(1, 3);

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
-- Structure de la table `domaineactivite`
--

DROP TABLE IF EXISTS `domaineactivite`;
CREATE TABLE IF NOT EXISTS `domaineactivite` (
  `codeDomaine` int(11) NOT NULL AUTO_INCREMENT,
  `nomDomaine` varchar(50) NOT NULL,
  PRIMARY KEY (`codeDomaine`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `domaineactivite`
--

INSERT INTO `domaineactivite` (`codeDomaine`, `nomDomaine`) VALUES
(1, 'Jeux Vidéo'),
(2, 'Comptabilité'),
(3, 'Streaming');

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
  `telEntreprise` char(14) NOT NULL,
  `blacklister` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codeEntreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`codeEntreprise`, `nomEntreprise`, `adresseEntreprise`, `villeEntreprise`, `codePostalEntreprise`, `telEntreprise`, `blacklister`) VALUES
(1, 'ToHero', '1 rue Emile Ain', 'Montpellier', 34090, '0642520665', 1),
(4, 'CGI', '8 rue Georges Freche', 'Montpellier', 34096, '0658653145', 0),
(5, 'Kaliop', '7 rue Ponpidou', 'Montpellier', 34090, '04.95.45.65.23', 0),
(6, 'Cap Gemini', '25 avenue polichon', 'Montpellier', 34090, '0685956535', 0);

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

DROP TABLE IF EXISTS `etat`;
CREATE TABLE IF NOT EXISTS `etat` (
  `codeEtat` int(11) NOT NULL AUTO_INCREMENT,
  `nomEtat` varchar(40) NOT NULL,
  PRIMARY KEY (`codeEtat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`codeEtat`, `nomEtat`) VALUES
(1, 'En attente de validation'),
(2, 'Validé'),
(3, 'Affecté'),
(4, 'Archivé');

-- --------------------------------------------------------

--
-- Structure de la table `fichiers`
--

DROP TABLE IF EXISTS `fichiers`;
CREATE TABLE IF NOT EXISTS `fichiers` (
  `codeFichier` int(11) NOT NULL AUTO_INCREMENT,
  `urlFichier` varchar(500) NOT NULL,
  `codeProposition` int(11) NOT NULL,
  PRIMARY KEY (`codeFichier`),
  KEY `fk_codePropositionFichier` (`codeProposition`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fichiers`
--

INSERT INTO `fichiers` (`codeFichier`, `urlFichier`, `codeProposition`) VALUES
(1, 'c:/documents/fichier.pdf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `propositions`
--

DROP TABLE IF EXISTS `propositions`;
CREATE TABLE IF NOT EXISTS `propositions` (
  `codeProposition` int(11) NOT NULL AUTO_INCREMENT,
  `titreProposition` varchar(30) NOT NULL,
  `descriptionProposition` varchar(1000) NOT NULL,
  `dateAjout` date NOT NULL,
  `commentaire` varchar(1000) DEFAULT NULL,
  `codeEntreprise` int(11) NOT NULL,
  `codeEtat` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codeProposition`),
  KEY `fk_codeEntreprise` (`codeEntreprise`),
  KEY `fk_codeEtat` (`codeEtat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `propositions`
--

INSERT INTO `propositions` (`codeProposition`, `titreProposition`, `descriptionProposition`, `dateAjout`, `commentaire`, `codeEntreprise`, `codeEtat`) VALUES
(1, 'Developpeur WEB - PHP/JAVA', 'Vous serez amenez à développer dans une équipe de développeur sur le site officiel de WAKANIM pour mettre à jour les fonctionnalités du site', '2018-10-22', NULL, 1, 1),
(2, 'Developpeur JAVA (Oracle)', 'Vous devrez développer dans une peite équipe un logiciel comptable en JAVA sous Oracle', '2018-10-23', NULL, 1, 1);

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
-- Contraintes pour la table `associerentreprisesdomaine`
--
ALTER TABLE `associerentreprisesdomaine`
  ADD CONSTRAINT `fk_codeDomaineEntreprise` FOREIGN KEY (`codeDomaine`) REFERENCES `domaineactivite` (`codeDomaine`),
  ADD CONSTRAINT `fk_codeEntrepriseDomaine` FOREIGN KEY (`codeEntreprise`) REFERENCES `entreprises` (`codeEntreprise`);

--
-- Contraintes pour la table `associertechnologiespropositions`
--
ALTER TABLE `associertechnologiespropositions`
  ADD CONSTRAINT `fk_codePropositionTechnologie` FOREIGN KEY (`codeProposition`) REFERENCES `propositions` (`codeProposition`),
  ADD CONSTRAINT `fk_codeTechnologieProposition` FOREIGN KEY (`codeTechnololgie`) REFERENCES `technologies` (`codeTechnololgie`);

--
-- Contraintes pour la table `fichiers`
--
ALTER TABLE `fichiers`
  ADD CONSTRAINT `fk_codePropositionFichier` FOREIGN KEY (`codeProposition`) REFERENCES `propositions` (`codeProposition`);

--
-- Contraintes pour la table `propositions`
--
ALTER TABLE `propositions`
  ADD CONSTRAINT `fk_codeEntreprise` FOREIGN KEY (`codeEntreprise`) REFERENCES `entreprises` (`codeEntreprise`),
  ADD CONSTRAINT `fk_codeEtat` FOREIGN KEY (`codeEtat`) REFERENCES `etat` (`codeEtat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
