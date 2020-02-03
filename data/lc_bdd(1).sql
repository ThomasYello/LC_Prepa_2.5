-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 22 Novembre 2019 à 23:19
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lc_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `mdp` text NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `mdp`, `type`) VALUES
(1, 'admin', 'bf4d34107ffb22cd6d240ac2d1b5655e03b63202', 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `num_cli` int(11) NOT NULL,
  `num_prod` int(11) NOT NULL,
  `date_commande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `num` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `sujet` varchar(20) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forum`
--

INSERT INTO `forum` (`num`, `pseudo`, `sujet`, `comment`) VALUES
(1, 'Roquet', 'ahahah', 'OUAIS mais bon'),
(2, 'totoche12334', '206 s16', 'sdsds'),
(3, 'biiiloot', '404', 'azertyuiop');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `num_prod` int(11) NOT NULL,
  `nom_prod` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `type` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `prix_prod` float NOT NULL,
  `desc_prod` text COLLATE latin1_general_ci NOT NULL,
  `img_prod` varchar(255) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`num_prod`, `nom_prod`, `type`, `prix_prod`, `desc_prod`, `img_prod`) VALUES
(1, 'Jante  ALU DEZENT SILVER 17', 'Jantes', 143, 'La jante DEZENT est adaptée à tout type de véhicule, grâce à ses 5 branches fines et concaves et son design épuré.\r\nSon diamètre est de 17 pouces et sa largeur de 7 pouces.\r\nElle possède un entraxe de 5x105, un moyeu de 56,6mm et un déport de 42.\r\nLa jante supporte une charge d’environ 670 kg, et représente un poids d’environ 9,76 kg.\r\nAvec un dessin simple mais efficace, dans sa couleur Silver, cette nouveauté de DEZENT a toutes les chances de devenir une référence !\r\n', '<img src=\'./img/jante-alu-dezent-ty-silver.jpg\' width=\'150\' />'),
(3, 'Baquet Sparco REV FIA', 'Siege Baquet', 378, 'Ce siège baquet Sparco REV possède une monocoque en fibre de verre. Ce baquet possède un revêtement ultra résistant avec des renforts contre les déchirures dans les zones les plus affectées par l\'usure.\r\n', '<img src=\'./img/siege-baquet.jpg\' width=\'150\' />'),
(4, 'Siège Baquet FIA OMP TRS Sky Noir', 'Siege Baquet', 235, 'La marque Italienne OMP a décidé de revoir le design de son baquet TRS. Ce baquet homologué FIA 8855-1999 est doté d\'une structure tubulaire. Le revêtement en vinyle de qualité donne à ce baquet un parfait effet simili cuir\r\n', '<img src=\'./img/siege-baquet-fia-omp.jpg\' width=\'150\' />'),
(5, 'Jante  ALU AEZ STRAIGHT DARK GRAPHITE MAT 17', 'Jantes', 192, 'Grâce aux courbes qui apparaissent à la jonction des 10 branches de la AEZ Straight dark, une fascinante asymétrie se laisse apercevoir.\r\nLa jante Straight dark Graphite mat, d’un diamètre de 17 pouces et d’une largeur de 7,5 pouces, apporte une empreinte sportive au véhicule.\r\nElle permet une charge d’environ 670 kg et représente un poids d’environ 10,07 kg.\r\nSon moyeu mesure 71,6 mm, son entraxe est de 5x114,3 et son déport est de 45.\r\nToutes ces courbes et lignes « straight » (droites) donnent de la vitesse et de la force à cette jante résolument attractive.\r\n', '<img src="./img/jante_alu_dark.jpg" width=\'150\'/>'),
(6, 'Volant GT2i Race 75 Noir / Branche Noire', 'Volant Tulipé', 39, 'Volant alu tulipé GT2i Compétition Race 75 possède 3 branches anodisées noires.', '<img src="./img/volant-gt2i-race-75-noir-branche-noire.jpg" width=\'150\'/>'),
(7, 'Volant Sparco P222', 'Volant Tulipé', 115, 'Volant Sparco P222 plat à 3 branches.', '<img src=\'./img/volant-sparco-222.jpg\' width=\'150\'/> '),
(8, 'Kit 3 Pédales OMP Spécial BMW / Porsche Alu Pédale', 'pedale', 19.8, 'Jeu de 3 pédales en fonderie d’aluminium avec pédale accélérateur longue. Jeu livré avec visserie en acier. Dimensions:- frein 60x70 mm- accélérateur 60x210 mm', '<img src=\'./img/pedale-omp-bmw-porshe.jpg\' alt=\'pedale-omp-bmw-porshe\' width=\'150\'>'),
(9, 'Kit 3 Pédales Bratex Noir / Argent avec Visserie', 'pedale', 19.99, 'Kit de 3 pédales Bratex en aluminium anodisé noir. Dimensions frein / embrayage: 60x70mm', '<img src="./img/kit-3-pedales-bratex-noir-argent-avec-visserie.jpg" alt="kit 3 pedales bratex noir argent" width=\'150\'>');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `num` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `prenom` varchar(50) CHARACTER SET latin2 NOT NULL,
  `date_nais` date NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `mdp` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`num`, `nom`, `prenom`, `date_nais`, `tel`, `email`, `mdp`, `avatar`) VALUES
(3, 'THOMAS', 'BALOURD', '2019-10-01', '069245879', 'GROS.GAUTHIER@GMAIL.COM', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(4, 'Roco', 'Nono', '2019-09-30', '0692478965', 'tom@gmail.com', '51eac6b471a284d3341d8c0c63d0f1a286262a18', NULL),
(7, 'mec', 'non', '2019-10-08', '0262457895', 'tom@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(9, 'wilson', 'garnier', '2019-10-17', '0692 45 68 45', 'poi@gmail.copm', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(15, 'romain', 'adras', '2005-09-03', '06 92 45 68 45', 'thomas@gmail.com', '2bebd02ee6a5c5bdc14cd0b7dad3065ca083b04c', NULL),
(16, 'Romas', 'gar', '2015-08-01', '0692478965', 'ooh@gmail.com', '64df20dca283eea2e77b7f0a83042fa36dfb0fb5', NULL),
(18, 'Nicole', 'Pontier', '2014-06-28', '06 92 45 68 45', 'R.tangue@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL),
(19, 'Azely', 'nobar', '2014-07-16', '0692415125', 'oui@gmail.com', '959640ec6bf6112cd60015d193b0cb62569ecd13', NULL),
(20, 'Pauline', 'Aure', '2017-09-17', '0692478965', 'aure.pauline@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL),
(21, 'ds', 'hgh', '2016-09-17', '0692478965', 'thomas@gmail.com', '3dfbba6224affb7676e1337926cdd6021be9414c', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`num_cli`,`num_prod`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`num`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`num_prod`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`num`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `num_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
