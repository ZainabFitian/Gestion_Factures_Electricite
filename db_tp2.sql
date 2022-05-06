-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 30 mars 2022 à 19:41
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_tp2`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `IdAgent` int(11) NOT NULL AUTO_INCREMENT,
  `NomUtili` varchar(25) NOT NULL,
  `Pswd` varchar(25) NOT NULL,
  `IdZone` int(11) NOT NULL,
  PRIMARY KEY (`IdAgent`),
  KEY `IdZone` (`IdZone`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`IdAgent`, `NomUtili`, `Pswd`, `IdZone`) VALUES
(1, 'agent1', '123', 1),
(2, 'agent2', '123', 2),
(3, 'agent3', '123', 3),
(4, 'agent4', '123', 4);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `NumContrat` varchar(20) NOT NULL,
  `Pswd` varchar(25) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Prenom` varchar(25) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Tel` varchar(15) NOT NULL,
  `DateDebutCtr` varchar(30) NOT NULL,
  `IdZone` int(11) NOT NULL,
  PRIMARY KEY (`NumContrat`),
  KEY `IdZone` (`IdZone`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`NumContrat`, `Pswd`, `Nom`, `Prenom`, `Mail`, `Tel`, `DateDebutCtr`, `IdZone`) VALUES
('132054764', '123', 'moujene', 'kaoutar', 'kaoutar.moujene@etu.uae.ac.ma', '618044335', '2022-03-02', 1),
('132054763', '345', 'ouiggaten', 'abir', 'abir.ouiggaten@etu.uae.ac.ma', '618044334', '2021-10-14', 2),
('132054762', '567', 'fitian', 'zainab', 'zainab.fitian@etu.uae.ac.ma', '618044336', '2021-09-14', 3),
('132054761', '789', 'felhi', 'omar', 'omar.felhi@etu.uae.ac.ma', '618044337', '2021-08-14', 4),
('132054765', '5678', 'Bensaid', 'Aya', 'aya.fitian@etu.uae.ac.ma', '0687453362', '2022-03-10', 4),
('132054766', '567890', 'Kassbi', 'Farah', 'farah.kassbi@outlook.fr', '0670756789', '2012-07-09', 2);

-- --------------------------------------------------------

--
-- Structure de la table `consommationannuelle`
--

DROP TABLE IF EXISTS `consommationannuelle`;
CREATE TABLE IF NOT EXISTS `consommationannuelle` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdZone` int(11) NOT NULL,
  `Fichier` blob NOT NULL,
  `DateSaisie` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IdZone` (`IdZone`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `consommationannuelle`
--

INSERT INTO `consommationannuelle` (`Id`, `IdZone`, `Fichier`, `DateSaisie`) VALUES
(2, 3, 0x6869206d79206e616d65206973207a61696e616220, '2022-03');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `IdFacture` int(11) NOT NULL AUTO_INCREMENT,
  `NumContrat` varchar(20) NOT NULL,
  `DateEcheance` date NOT NULL,
  `DateEmission` date NOT NULL,
  `Consom` decimal(10,0),
  `MontantHT` decimal(10,0) DEFAULT NULL,
  `TVA` decimal(10,0) DEFAULT NULL,
  `MontantTTC` decimal(10,0) DEFAULT NULL,
  `AncienIndex` decimal(10,0) DEFAULT NULL,
  `NouveauIndex` decimal(10,0) NOT NULL,
  `Status` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`IdFacture`),
  KEY `NumContrat` (`NumContrat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `IdFournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `NomUtili` varchar(25) NOT NULL,
  `Pswd` varchar(25) NOT NULL,
  PRIMARY KEY (`IdFournisseur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`IdFournisseur`, `NomUtili`, `Pswd`) VALUES
(0, 'fournisseur', '123');

-- --------------------------------------------------------

--
-- Structure de la table `pdf`
--

DROP TABLE IF EXISTS `pdf`;
CREATE TABLE IF NOT EXISTS `pdf` (
  `IdPDF` int(11) NOT NULL AUTO_INCREMENT,
  `NumContrat` varchar(20) NOT NULL,
  `DateEmission` date NOT NULL,
  `DateEcheance` date NOT NULL,
  `PDF` blob,
  PRIMARY KEY (`IdPDF`),
  KEY `DateEmission` (`DateEmission`),
  KEY `NumContrat` (`NumContrat`),
  KEY `DateEcheance` (`DateEcheance`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

DROP TABLE IF EXISTS `reclamation`;
CREATE TABLE IF NOT EXISTS `reclamation` (
  `IdReclamation` int(11) NOT NULL AUTO_INCREMENT,
  `NumContrat` varchar(50) NOT NULL,
  `Objet` varchar(255) DEFAULT NULL,
  `Message` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`IdReclamation`),
  KEY `NumContrat` (`NumContrat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `zonegeographique`
--

DROP TABLE IF EXISTS `zonegeographique`;
CREATE TABLE IF NOT EXISTS `zonegeographique` (
  `IdZone` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) NOT NULL,
  PRIMARY KEY (`IdZone`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `zonegeographique`
--

INSERT INTO `zonegeographique` (`IdZone`, `Nom`) VALUES
(1, 'Mhannech'),
(2, 'Boussafou'),
(3, 'Chellal'),
(4, 'Malalien');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
