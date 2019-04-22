-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 22 avr. 2019 à 13:39
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `articles_b`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(8) NOT NULL,
  `titre` varchar(250) DEFAULT NULL,
  `article` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `titre`, `article`) VALUES
(2, 'bdjhghsbdhjs bdhbfsdh bhdfb hs', 'jfejskfshdjkfn sdfsd fsd dg'),
(3, 'ahahahahahahah', 'lfkdslfnksd njfsdjk nfsdjkb fjbsdn fbsdjnbf nsdbfjksd njkfnsd jknfjsdnjkf\r\nmfklsdk flsdf sdf sd\r\nfsd \r\nf\r\nsd \r\nf\r\nsd \r\nfsdfsdlfkjsdkhjsdhfkhsdf sd');

-- --------------------------------------------------------

--
-- Structure de la table `ecrit`
--

CREATE TABLE `ecrit` (
  `id_utilisateur` int(255) NOT NULL,
  `id_article` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(255) NOT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo`, `email`, `mot_de_passe`, `status`) VALUES
(1, 'fistouille', 'lacroixchris57@gmail.com', '$2y$10$0ocWbeKQXND1EolKWzPkyOXKoEYDNnNmH7C6yk.JsmJueMkw2uWFe', 0),
(2, 'guigui', 'guigui@gmail.com', '$2y$10$GK2788qA/dTQfuqxCTQF8u4UrkRuUGYv/dT.tYMjL6FbNhvMy54qG', 0),
(14, 'gougou', 'gougou@gmail.com', '$2y$10$2PPtUNtjwY6BQYUPKA52uee00Zzoa5ZLYS/zsJW96IAqIkBH4.LWi', 0),
(16, 'frakkass', 'lacroixchris57@gmail.com', '$2y$10$CwteCEToBg3aQQDa0U7WC.6j.5jyfMXjwNdh7.D.SoYy3ruDkmZUa', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
