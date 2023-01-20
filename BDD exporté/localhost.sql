-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 20 jan. 2023 à 21:13
-- Version du serveur :  10.5.16-MariaDB
-- Version de PHP : 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id20172783_cs102126projetphp`
--
CREATE DATABASE IF NOT EXISTS `id20172783_cs102126projetphp` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id20172783_cs102126projetphp`;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `email` varchar(45) NOT NULL,
  `nomUtilisateur` varchar(45) NOT NULL,
  `mdp` varchar(45) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`email`, `nomUtilisateur`, `mdp`, `admin`) VALUES
('admin@admin.com', 'admin', 'admin', 1),
('sacha.cast03@gmail.com', 'sacha', 'admin', 1),
('sacha@sacha.com', 'sacha', 'lol', 0);

-- --------------------------------------------------------

--
-- Structure de la table `compta`
--

CREATE TABLE `compta` (
  `annee` int(11) NOT NULL,
  `chiffreAffaire` float DEFAULT NULL,
  `debit` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compta`
--

INSERT INTO `compta` (`annee`, `chiffreAffaire`, `debit`) VALUES
(2023, 187.88, 3662.69);

-- --------------------------------------------------------

--
-- Structure de la table `facturation`
--

CREATE TABLE `facturation` (
  `IdPanier` int(11) NOT NULL,
  `dateCreation` date NOT NULL,
  `emailClient` varchar(45) NOT NULL,
  `nomClient` varchar(45) NOT NULL,
  `prix` float NOT NULL,
  `valider` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `facturation`
--

INSERT INTO `facturation` (`IdPanier`, `dateCreation`, `emailClient`, `nomClient`, `prix`, `valider`) VALUES
(253, '2023-01-20', 'sacha.cast03@gmail.com', 'sacha', 61.97, 1),
(255, '2023-01-20', 'sacha@sacha.com', 'sacha', 27.98, 1),
(256, '2023-01-20', 'sacha@sacha.com', 'sacha', 27.98, 1),
(257, '2023-01-20', 'sacha@sacha.com', 'sacha', 41.97, 1),
(258, '2023-01-20', 'sacha.cast03@gmail.com', 'sacha', 13.99, 1),
(261, '2023-01-20', 'sacha.cast03@gmail.com', 'sacha', 13.99, 1);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `idFournisseur` int(11) NOT NULL,
  `nomF` varchar(45) NOT NULL,
  `emailF` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`idFournisseur`, `nomF`, `emailF`) VALUES
(12, 'fournisseur1', 'fournisseur@fournisseur.com'),
(13, 'fournisseur2', 'fournisseur2@fournisseur2.com'),
(14, 'fournisseur2', 'fournisseur2@fournisseur2.com'),
(15, 'fournisseur1', 'fournisseur@fournisseur'),
(16, 'fournisseur1', 'fournisseur2@fournisseur2.fr');

-- --------------------------------------------------------

--
-- Structure de la table `gestion_stock`
--

CREATE TABLE `gestion_stock` (
  `idStock` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `idFournisseur` int(11) NOT NULL,
  `qteStock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `gestion_stock`
--

INSERT INTO `gestion_stock` (`idStock`, `idProduit`, `idFournisseur`, `qteStock`) VALUES
(11, 30, 12, 7),
(12, 31, 13, 14),
(13, 32, 13, 12),
(14, 38, 15, 15),
(15, 39, 12, 30),
(16, 40, 13, 30),
(17, 41, 12, 20),
(18, 42, 13, 30),
(19, 43, 12, 50),
(20, 44, 13, 20),
(22, 46, 13, 20),
(23, 47, 12, 50),
(24, 48, 13, 20),
(25, 49, 12, 15);

-- --------------------------------------------------------

--
-- Structure de la table `listeAchat`
--

CREATE TABLE `listeAchat` (
  `idListAchat` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `prixAchat` float NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `listeAchat`
--

INSERT INTO `listeAchat` (`idListAchat`, `idProduit`, `qte`, `prixAchat`, `annee`) VALUES
(12, 30, 15, 10.99, 2023),
(13, 31, 15, 14.99, 2023),
(14, 32, 15, 10.99, 2023),
(15, 32, 1, 10.99, 2023),
(16, 38, 15, 10.99, 2023),
(17, 39, 30, 9, 2023),
(18, 40, 30, 9.99, 2023),
(19, 41, 20, 8.99, 2023),
(20, 42, 30, 8.99, 2023),
(21, 43, 50, 10.99, 2023),
(22, 44, 20, 8.99, 2023),
(23, 45, 15, 7.99, 2023),
(24, 46, 20, 9.99, 2023),
(25, 47, 50, 10.99, 2023),
(26, 48, 20, 8.99, 2023),
(27, 49, 15, 8.99, 2023);

-- --------------------------------------------------------

--
-- Structure de la table `listeProduit`
--

CREATE TABLE `listeProduit` (
  `idListeProduit` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `prixDuProduit` float NOT NULL,
  `idPanier` int(11) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `listeProduit`
--

INSERT INTO `listeProduit` (`idListeProduit`, `idProduit`, `qte`, `prixDuProduit`, `idPanier`, `annee`) VALUES
(360, 30, 2, 13.99, 253, 2023),
(361, 31, 1, 20, 253, 2023),
(362, 32, 1, 13.99, 253, 2023),
(365, 30, 1, 13.99, 255, 2023),
(366, 32, 1, 13.99, 255, 2023),
(367, 30, 1, 13.99, 256, 2023),
(368, 32, 1, 13.99, 256, 2023),
(369, 30, 2, 13.99, 257, 2023),
(370, 32, 1, 13.99, 257, 2023),
(371, 30, 1, 13.99, 258, 2023),
(374, 30, 1, 13.99, 261, 2023);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `titre` varchar(45) NOT NULL,
  `genre` varchar(45) NOT NULL,
  `anneeSortie` varchar(20) NOT NULL,
  `prixPublic` float NOT NULL,
  `prixAchat` float NOT NULL,
  `cover` varchar(45) NOT NULL,
  `descriptif` varchar(5000) NOT NULL,
  `artiste` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `titre`, `genre`, `anneeSortie`, `prixPublic`, `prixAchat`, `cover`, `descriptif`, `artiste`) VALUES
(30, 'Coeur_blanc', 'Rap', '2022', 13.99, 10.99, 'Coeur_blanc.jpg', 'Jul, l’ovni marseillais, est de retour avec un double-album !', 'Jul'),
(31, 'Heroes_&_Villains', 'Rap', '2022', 20, 14.99, 'Heroes_&_villains.jpg', 'Heroes & Villains est le deuxième album studio du producteur de disques américain Metro Boomin. ', 'Metro_Boomin'),
(32, 'Dawn_FM', 'Pop', '2022', 13.99, 10.99, 'Dawn_FM.jpg', 'Dawn FM est le cinquième album studio du chanteur canadien The Weeknd, sorti le 7 janvier 2022.', 'The_Weeknd'),
(38, 'The_Melodic_Blue', 'Rap', '2022', 13.99, 10.99, 'BBKeem.jpg', 'The Melodic Blue est le premier album studio du rappeur et producteur de disques américain Baby Keem', 'Baby_keem'),
(39, 'NEW_BLUES,_OLD_WINE', 'Rap', '2022', 12, 9, 'BBJacques.jpg', 'Sorti le 2 décembre 2022, New Blues, Old Wine est le quatrième album de B.B. Jacques.', 'B.B._Jacques'),
(40, 'Donda_2', 'Rap', '2022', 14.99, 9.99, 'Donda2.jpg', 'Donda 2 est la suite officielle du dixième album studio de Kanye West, Donda, sorti en août 2021.', 'Kanye_West'),
(41, 'Nostalgia+', 'Rap', '2022', 11.99, 8.99, 'Green.jpg', 'NOSTALGIA+ est le deuxième album studio du rappeur belge Green Montana, faisant suite à ALASKA.', 'Green_Montana'),
(42, 'Memoria', 'Rap', '2022', 12.99, 8.99, 'JazzyBazz.jpg', 'Memoria est le troisième album studio de Jazzy Bazz, sorti le 21 janvier 2022.', 'Jazzy_Bazz'),
(43, 'Mr._Morale_&_the_Big_Steppers', 'Rap', '2022', 15.99, 10.99, 'Kendrick.jpg', 'Mr. Morale & The Big Steppers est le cinquièm album de Kendrick Lamar avec Top Dawg Entertainment.', 'Kendrick_Lamar'),
(44, 'IL_ME_RESSEMBLE_PAS_NON_PLUS', 'Rap', '2022', 10.99, 8.99, 'Khali.jpg', '“Il me ressemble pas non plus” est le second album de Khali, annoncé le 22 novembre.', 'Khali'),
(46, 'SZR_2001', 'Rap', '2022', 13.99, 9.99, 'S-Crew.jpg', 'Six ans après Destins liés, le S-Crew dévoile, le 22 mai 2022, la sortie d\'un troisième album.', 'S-Crew'),
(47, 'CALL_ME_IF_YOU_GET_LOST', 'Rap', '2022', 15.99, 10.99, 'Tyler.jpg', 'CALL ME IF YOU GET LOST est le septième album de Tyler, The Creator, après son LP de mai 2019, IGOR.', 'Tyler,_The_Creator'),
(48, 'Couleur_de_ma_peine', 'Rap', '2022', 10.99, 8.99, 'Zamdane.jpg', 'Couleur de ma peine, sorti le 25 février 2022, est le premier album studio de Zamdane.', 'Zamdane'),
(49, 'Nouvelle_Ère', 'Rap', '2022', 10.99, 8.99, 'Osi.jpg', 'Deuxième projet musical d\'Osirus Jack, NOUVELLE ÈRE.', 'Osirus_Jack');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `compta`
--
ALTER TABLE `compta`
  ADD PRIMARY KEY (`annee`);

--
-- Index pour la table `facturation`
--
ALTER TABLE `facturation`
  ADD PRIMARY KEY (`IdPanier`),
  ADD KEY `FK_2` (`emailClient`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`idFournisseur`);

--
-- Index pour la table `gestion_stock`
--
ALTER TABLE `gestion_stock`
  ADD PRIMARY KEY (`idStock`),
  ADD KEY `FK_2` (`idProduit`),
  ADD KEY `FK_3` (`idFournisseur`);

--
-- Index pour la table `listeAchat`
--
ALTER TABLE `listeAchat`
  ADD PRIMARY KEY (`idListAchat`);

--
-- Index pour la table `listeProduit`
--
ALTER TABLE `listeProduit`
  ADD PRIMARY KEY (`idListeProduit`),
  ADD KEY `FK_2` (`idProduit`),
  ADD KEY `FK_3` (`idPanier`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `facturation`
--
ALTER TABLE `facturation`
  MODIFY `IdPanier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `idFournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `gestion_stock`
--
ALTER TABLE `gestion_stock`
  MODIFY `idStock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `listeAchat`
--
ALTER TABLE `listeAchat`
  MODIFY `idListAchat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `listeProduit`
--
ALTER TABLE `listeProduit`
  MODIFY `idListeProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `facturation`
--
ALTER TABLE `facturation`
  ADD CONSTRAINT `FK_3` FOREIGN KEY (`emailClient`) REFERENCES `client` (`email`);

--
-- Contraintes pour la table `gestion_stock`
--
ALTER TABLE `gestion_stock`
  ADD CONSTRAINT `FK_1` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`),
  ADD CONSTRAINT `FK_5` FOREIGN KEY (`idFournisseur`) REFERENCES `fournisseur` (`idFournisseur`);

--
-- Contraintes pour la table `listeProduit`
--
ALTER TABLE `listeProduit`
  ADD CONSTRAINT `FK_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`),
  ADD CONSTRAINT `FK_4` FOREIGN KEY (`idPanier`) REFERENCES `facturation` (`IdPanier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
