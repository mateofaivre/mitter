-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 09 juil. 2022 à 23:14
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mitter`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `nomCategorie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idCategory`, `nomCategorie`) VALUES
(1, 'Audio'),
(2, 'Vidéo'),
(3, 'Image'),
(4, 'Texte');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `idPublicationCommented` int(11) NOT NULL,
  `idPublication` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `direct_message`
--

CREATE TABLE `direct_message` (
  `idMessage` int(11) NOT NULL,
  `content` text NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `date` date NOT NULL,
  `date_modif` date NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `follower`
--

CREATE TABLE `follower` (
  `idFollower` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `following`
--

CREATE TABLE `following` (
  `idFollowing` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mtr_user`
--

CREATE TABLE `mtr_user` (
  `idUser` int(11) NOT NULL,
  `emailUser` varchar(255) NOT NULL,
  `nomUser` varchar(255) NOT NULL,
  `prenomUser` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date_birth` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `biography` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `date_connexion` datetime DEFAULT NULL,
  `date_modification` datetime DEFAULT NULL,
  `website_link` varchar(255) DEFAULT NULL,
  `passwordUser` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mtr_user`
--

INSERT INTO `mtr_user` (`idUser`, `emailUser`, `nomUser`, `prenomUser`, `username`, `date_birth`, `avatar`, `active`, `biography`, `location`, `gender`, `date_creation`, `date_connexion`, `date_modification`, `website_link`, `passwordUser`) VALUES
(3, 'test@mitter.com', 'Admin', 'Mitter', 'mitteradmin', '2002-05-10', 'mateo.jpg', 1, '', '', '', '2022-02-04 12:23:27', '2022-02-04 12:23:27', '2022-02-04 12:23:27', '', 'mitter'),
(4, 'sylypilo@mailinator.com', 'Kay', 'Carrillo', 'kyvigijix', NULL, NULL, 1, NULL, NULL, NULL, '2022-02-25 11:27:22', NULL, NULL, NULL, 'Pa$$w0rd!'),
(5, 'mateo@faivre.fr', 'Faivre', 'Matéo', 'mateofaivre', NULL, 'mateo.jpg', 1, NULL, NULL, NULL, '2022-03-29 23:35:13', '2022-03-29 23:35:13', '2022-03-29 23:35:13', NULL, 'mateo'),
(6, 'nafuze@mailinator.com', 'Zeus', 'King', 'qubihexe', NULL, NULL, 1, NULL, NULL, NULL, '2022-04-05 11:32:55', NULL, NULL, NULL, 'Pa$$w0rd!'),
(7, 'esadd@esadd.fr', 'Esadd', 'Test', 'esadd-test', NULL, NULL, 1, NULL, NULL, NULL, '2022-06-28 00:37:10', NULL, NULL, NULL, 'esadd'),
(8, 'foxof38192@unigeol.com', 'Lee', 'Rutledge', 'kyvigijix', NULL, NULL, 1, NULL, NULL, NULL, '2022-06-28 01:00:04', NULL, NULL, NULL, '123456'),
(9, 'kedo@mailinator.com', 'Noble', 'Lynn', 'hiryhumugu', NULL, NULL, 1, NULL, NULL, NULL, '2022-06-28 01:11:11', NULL, NULL, NULL, '9999'),
(10, 'test@finito.com', 'finito', 'la fraude', 'fraude', NULL, NULL, 1, NULL, NULL, NULL, '2022-07-09 21:35:29', NULL, NULL, NULL, '123456');

-- --------------------------------------------------------

--
-- Structure de la table `profile_link`
--

CREATE TABLE `profile_link` (
  `idLink` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `link` text NOT NULL,
  `link_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `idPublication` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `date_publication` datetime NOT NULL,
  `date_modification` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`idPublication`, `idUser`, `idCategory`, `date_publication`, `date_modification`, `active`, `location`) VALUES
(1, 5, 4, '2022-04-03 22:50:56', '2022-03-29 23:50:56', 1, NULL),
(2, 5, 4, '2022-04-04 10:56:42', '2022-04-04 10:56:42', 1, NULL),
(10, 5, 4, '2022-04-04 22:27:42', '2022-04-04 22:27:42', 1, NULL),
(16, 5, 4, '2022-04-04 22:34:11', '2022-04-04 22:34:11', 1, NULL),
(17, 5, 4, '2022-04-04 22:35:02', '2022-04-04 22:35:02', 1, NULL),
(20, 5, 4, '2022-04-05 01:06:54', '2022-04-05 01:06:54', 1, NULL),
(21, 5, 4, '2022-04-05 01:28:31', '2022-04-05 01:28:31', 1, NULL),
(22, 5, 4, '2022-04-05 01:28:32', '2022-04-05 01:28:32', 1, NULL),
(23, 5, 4, '2022-04-05 01:28:38', '2022-04-05 01:28:38', 1, NULL),
(24, 5, 4, '2022-04-05 01:28:40', '2022-04-05 01:28:40', 1, NULL),
(25, 5, 4, '2022-04-05 01:28:41', '2022-04-05 01:28:41', 1, NULL),
(26, 5, 4, '2022-04-05 01:28:49', '2022-04-05 01:28:49', 1, NULL),
(27, 5, 4, '2022-04-05 01:28:49', '2022-04-05 01:28:49', 1, NULL),
(28, 5, 4, '2022-04-05 01:29:06', '2022-04-05 01:29:06', 1, NULL),
(29, 5, 4, '2022-04-05 01:29:07', '2022-04-05 01:29:07', 1, NULL),
(30, 5, 4, '2022-04-05 01:29:47', '2022-04-05 01:29:47', 1, NULL),
(31, 5, 4, '2022-04-05 01:29:48', '2022-04-05 01:29:48', 1, NULL),
(32, 5, 4, '2022-04-05 01:29:56', '2022-04-05 01:29:56', 1, NULL),
(33, 6, 4, '2022-04-05 01:29:57', '2022-04-05 01:29:57', 1, NULL),
(34, 6, 4, '2022-04-05 01:31:52', '2022-04-05 01:31:52', 1, NULL),
(35, 5, 4, '2022-04-05 01:32:30', '2022-04-05 01:32:30', 1, NULL),
(36, 5, 4, '2022-04-05 01:35:58', '2022-04-05 01:35:58', 1, NULL),
(37, 6, 4, '2022-04-05 01:37:46', '2022-04-05 01:37:46', 1, NULL),
(38, 4, 4, '2022-04-05 01:38:22', '2022-04-05 01:38:22', 1, NULL),
(39, 5, 4, '2022-04-05 11:41:58', '2022-04-05 11:41:58', 1, NULL),
(40, 5, 4, '2022-04-05 11:42:02', '2022-04-05 11:42:02', 1, NULL),
(41, 5, 4, '2022-04-05 13:34:12', '2022-04-05 13:34:12', 1, NULL),
(42, 5, 4, '2022-04-05 13:34:47', '2022-04-05 13:34:47', 1, NULL),
(43, 5, 4, '2022-04-05 13:38:53', '2022-04-05 13:38:53', 1, NULL),
(44, 3, 4, '2022-05-12 19:14:43', '2022-05-12 19:14:43', 1, NULL),
(45, 3, 4, '2022-05-12 19:15:31', '2022-05-12 19:15:31', 1, NULL),
(46, 3, 4, '2022-05-12 19:22:06', '2022-05-12 19:22:06', 1, NULL),
(47, 3, 4, '2022-05-12 19:22:14', '2022-05-12 19:22:14', 1, NULL),
(48, 3, 4, '2022-05-12 19:22:41', '2022-05-12 19:22:41', 1, NULL),
(49, 3, 4, '2022-05-12 19:23:28', '2022-05-12 19:23:28', 1, NULL),
(50, 3, 4, '2022-05-12 19:23:36', '2022-05-12 19:23:36', 1, NULL),
(51, 3, 4, '2022-05-12 19:23:54', '2022-05-12 19:23:54', 1, NULL),
(52, 3, 4, '2022-05-12 19:24:16', '2022-05-12 19:24:16', 1, NULL),
(53, 3, 4, '2022-05-12 19:24:58', '2022-05-12 19:24:58', 1, NULL),
(54, 3, 4, '2022-05-12 19:25:15', '2022-05-12 19:25:15', 1, NULL),
(55, 3, 4, '2022-05-12 19:25:41', '2022-05-12 19:25:41', 1, NULL),
(56, 3, 4, '2022-05-12 19:26:03', '2022-05-12 19:26:03', 1, NULL),
(57, 3, 4, '2022-05-12 19:26:12', '2022-05-12 19:26:12', 1, NULL),
(58, 3, 4, '2022-05-12 19:32:58', '2022-05-12 19:32:58', 1, NULL),
(59, 3, 4, '2022-05-12 19:33:44', '2022-05-12 19:33:44', 1, NULL),
(60, 3, 4, '2022-06-27 22:40:55', '2022-06-27 22:40:55', 1, NULL),
(61, 3, 4, '2022-06-27 22:49:26', '2022-06-27 22:49:26', 1, NULL),
(62, 3, 4, '2022-06-27 23:11:42', '2022-06-27 23:11:42', 1, NULL),
(63, 3, 4, '2022-06-27 23:24:18', '2022-06-27 23:24:18', 1, NULL),
(64, 3, 4, '2022-06-27 23:25:43', '2022-06-27 23:25:43', 1, NULL),
(65, 3, 4, '2022-06-27 23:26:41', '2022-06-27 23:26:41', 1, NULL),
(66, 3, 4, '2022-06-27 23:27:04', '2022-06-27 23:27:04', 1, NULL),
(67, 3, 4, '2022-06-27 23:27:06', '2022-06-27 23:27:06', 1, NULL),
(68, 3, 4, '2022-06-27 23:27:17', '2022-06-27 23:27:17', 1, NULL),
(69, 3, 4, '2022-06-27 23:27:34', '2022-06-27 23:27:34', 1, NULL),
(70, 3, 4, '2022-06-27 23:36:34', '2022-06-27 23:36:34', 1, NULL),
(71, 3, 4, '2022-06-27 23:42:30', '2022-06-27 23:42:30', 1, NULL),
(72, 3, 4, '2022-06-27 23:42:50', '2022-06-27 23:42:50', 1, NULL),
(73, 3, 4, '2022-06-27 23:42:51', '2022-06-27 23:42:51', 1, NULL),
(74, 3, 4, '2022-06-27 23:44:11', '2022-06-27 23:44:11', 1, NULL),
(75, 3, 4, '2022-06-27 23:44:43', '2022-06-27 23:44:43', 1, NULL),
(76, 3, 4, '2022-06-27 23:46:10', '2022-06-27 23:46:10', 1, NULL),
(77, 3, 4, '2022-06-27 23:46:43', '2022-06-27 23:46:43', 1, NULL),
(78, 3, 4, '2022-06-27 23:46:51', '2022-06-27 23:46:51', 1, NULL),
(79, 3, 4, '2022-06-27 23:47:37', '2022-06-27 23:47:37', 1, NULL),
(80, 3, 4, '2022-06-27 23:48:30', '2022-06-27 23:48:30', 1, NULL),
(81, 3, 4, '2022-06-27 23:48:36', '2022-06-27 23:48:36', 1, NULL),
(82, 3, 4, '2022-06-27 23:49:03', '2022-06-27 23:49:03', 1, NULL),
(83, 3, 4, '2022-06-28 00:18:50', '2022-06-28 00:18:50', 1, NULL),
(84, 3, 4, '2022-06-28 00:34:52', '2022-06-28 00:34:52', 1, NULL),
(85, 8, 4, '2022-06-28 01:00:47', '2022-06-28 01:00:47', 1, NULL),
(86, 9, 4, '2022-06-28 01:11:34', '2022-06-28 01:11:34', 1, NULL),
(87, 3, 4, '2022-07-09 21:34:43', '2022-07-09 21:34:43', 1, NULL),
(88, 3, 4, '2022-07-09 21:34:52', '2022-07-09 21:34:52', 1, NULL),
(89, 10, 4, '2022-07-09 21:35:43', '2022-07-09 21:35:43', 1, NULL),
(90, 3, 4, '2022-07-09 21:39:53', '2022-07-09 21:39:53', 1, NULL),
(91, 3, 4, '2022-07-09 22:02:13', '2022-07-09 22:02:13', 1, NULL),
(92, 3, 4, '2022-07-09 22:03:10', '2022-07-09 22:03:10', 1, NULL),
(93, 3, 4, '2022-07-09 22:03:35', '2022-07-09 22:03:35', 1, NULL),
(94, 3, 4, '2022-07-09 22:03:44', '2022-07-09 22:03:44', 1, NULL),
(95, 3, 4, '2022-07-09 22:03:57', '2022-07-09 22:03:57', 1, NULL),
(96, 3, 4, '2022-07-09 22:36:03', '2022-07-09 22:36:03', 1, NULL),
(97, 3, 4, '2022-07-09 22:36:27', '2022-07-09 22:36:27', 1, NULL),
(98, 3, 4, '2022-07-09 23:06:29', '2022-07-09 23:06:29', 1, NULL),
(99, 3, 4, '2022-07-09 23:06:52', '2022-07-09 23:06:52', 1, NULL),
(100, 3, 4, '2022-07-09 23:07:04', '2022-07-09 23:07:04', 1, NULL),
(101, 3, 4, '2022-07-09 23:07:22', '2022-07-09 23:07:22', 1, NULL),
(102, 3, 4, '2022-07-09 23:07:31', '2022-07-09 23:07:31', 1, NULL),
(103, 3, 4, '2022-07-09 23:09:34', '2022-07-09 23:09:34', 1, NULL),
(104, 3, 4, '2022-07-09 23:09:47', '2022-07-09 23:09:47', 1, NULL),
(105, 3, 4, '2022-07-09 23:10:06', '2022-07-09 23:10:06', 1, NULL),
(106, 3, 4, '2022-07-09 23:10:24', '2022-07-09 23:10:24', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `publication_file`
--

CREATE TABLE `publication_file` (
  `idFile` int(11) NOT NULL,
  `idPublication` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `publication_file`
--

INSERT INTO `publication_file` (`idFile`, `idPublication`, `file`) VALUES
(1, 1, 'meet-intro.jpeg'),
(2, 1, 'jul.mp3'),
(3, 35, '2freres.jpeg'),
(4, 35, 'lev.jpeg'),
(5, 35, 'nekfeu.jpeg'),
(6, 35, 'winterzuko.jpeg'),
(7, 36, 'nanou.jpg'),
(8, 36, 'jul.mp3'),
(9, 37, 'nanou.jpg'),
(10, 37, 'jul.mp3'),
(11, 38, 'jul.mp3'),
(16, 43, NULL),
(17, 45, NULL),
(18, 51, NULL),
(19, 52, NULL),
(20, 56, NULL),
(21, 57, NULL),
(22, 58, NULL),
(23, 59, 'mag.jpg'),
(24, 60, NULL),
(25, 61, NULL),
(26, 62, NULL),
(27, 63, 'chopard-ds.jpeg'),
(28, 70, 'sdf-communication.jpg'),
(29, 81, 'sdf-communication.jpg'),
(30, 83, 'chopard-ds.jpeg'),
(31, 83, 'esadd-salle.jpg'),
(32, 83, 'nael-le-bg.jpg'),
(33, 83, 'sdf-communication.jpg'),
(34, 84, 'chopard-ds.jpeg'),
(35, 84, 'esadd-salle.jpg'),
(36, 84, 'nael-le-bg.jpg'),
(37, 84, 'sdf-communication.jpg'),
(38, 85, NULL),
(39, 86, NULL),
(40, 87, NULL),
(41, 88, NULL),
(42, 89, NULL),
(43, 90, NULL),
(44, 94, NULL),
(45, 97, '1650890534682.jpeg'),
(46, 99, 'IMG_3267.jpeg'),
(47, 100, 'IMG_3267.jpeg'),
(48, 100, 'IMG_3269.jpeg'),
(49, 101, 'IMG_3267.jpeg'),
(50, 101, 'IMG_3269.jpeg'),
(51, 105, 'IMG_3267.jpeg'),
(52, 105, 'IMG_3397.jpeg'),
(53, 106, '1656676621232.jpeg'),
(54, 106, '1656676725787.jpeg'),
(55, 106, 'pluie.jpeg'),
(56, 106, 'title-1656179689.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `publication_like`
--

CREATE TABLE `publication_like` (
  `idPublication` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `type` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `publication_like`
--

INSERT INTO `publication_like` (`idPublication`, `idUser`, `type`) VALUES
(1, 3, 0),
(1, 4, 1),
(10, 3, 0),
(10, 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `publication_meta`
--

CREATE TABLE `publication_meta` (
  `idMeta` int(11) NOT NULL,
  `idPublication` int(11) NOT NULL,
  `key` text,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `publication_meta`
--

INSERT INTO `publication_meta` (`idMeta`, `idPublication`, `key`, `text`) VALUES
(1, 1, '', 'Ceci est le premier meet.'),
(3, 2, NULL, 'ifedeout'),
(6, 16, NULL, 'testonnssssss'),
(7, 17, NULL, 'aaaaaaa'),
(10, 20, NULL, ''),
(11, 34, NULL, 'pixel war'),
(12, 35, NULL, 'win'),
(13, 36, NULL, 'Naël sauvage apparaît'),
(14, 37, NULL, 'Oui'),
(15, 38, NULL, 'test mp3'),
(16, 39, NULL, 'yo'),
(17, 40, NULL, 'zzzzz'),
(20, 43, NULL, 'bonjour dylan'),
(21, 44, NULL, 'super test'),
(22, 45, NULL, 'dddddd'),
(23, 46, NULL, 'aaaaqqq'),
(24, 47, NULL, 'eeeeee'),
(25, 48, NULL, 'eeeeee'),
(26, 49, NULL, 'eeeeee'),
(27, 50, NULL, 'eeeeee'),
(28, 51, NULL, 'eeeeee'),
(29, 52, NULL, 'qqqqqqq'),
(30, 53, NULL, 'fdcgf'),
(31, 54, NULL, 'fdcgf'),
(32, 55, NULL, 'fdcgf'),
(33, 56, NULL, 'fdcgf'),
(34, 57, NULL, 'zzad'),
(35, 58, NULL, 'drfte'),
(36, 59, NULL, 'ghuierfje'),
(37, 60, NULL, ''),
(38, 61, NULL, ''),
(39, 62, NULL, 'dddd'),
(40, 63, NULL, 'le super workshop chopard'),
(48, 80, NULL, 'vive l\'ESADD'),
(49, 81, NULL, 'vive l\'ESADD'),
(50, 82, NULL, 'ewadd'),
(51, 83, NULL, 'vive l\'ESADD'),
(52, 84, NULL, 'l\'esadd en folie...'),
(53, 85, NULL, 'Le petit dernier...'),
(54, 86, NULL, 'Pour la route...'),
(55, 87, NULL, 'Petit test '),
(56, 88, NULL, 'ça fonctionne nickel'),
(57, 89, NULL, 'test de la fraude'),
(58, 90, NULL, ''),
(59, 94, NULL, 'petit texte\r\n'),
(60, 97, NULL, 'hyrgfdv'),
(61, 99, NULL, 'tdffd'),
(62, 100, NULL, ''),
(63, 101, NULL, ''),
(64, 105, NULL, 'rtgfv'),
(65, 106, NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `idTag` int(11) NOT NULL,
  `idPublication` int(11) NOT NULL,
  `tag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idPublicationCommented`,`idPublication`),
  ADD KEY `idPublication` (`idPublication`),
  ADD KEY `idPublicationCommented` (`idPublicationCommented`);

--
-- Index pour la table `direct_message`
--
ALTER TABLE `direct_message`
  ADD PRIMARY KEY (`idMessage`);

--
-- Index pour la table `follower`
--
ALTER TABLE `follower`
  ADD PRIMARY KEY (`idFollower`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`idFollowing`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `mtr_user`
--
ALTER TABLE `mtr_user`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `profile_link`
--
ALTER TABLE `profile_link`
  ADD PRIMARY KEY (`idLink`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`idPublication`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Index pour la table `publication_file`
--
ALTER TABLE `publication_file`
  ADD PRIMARY KEY (`idFile`),
  ADD KEY `idPublication` (`idPublication`);

--
-- Index pour la table `publication_like`
--
ALTER TABLE `publication_like`
  ADD PRIMARY KEY (`idPublication`,`idUser`),
  ADD KEY `idPublication` (`idPublication`,`idUser`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `publication_meta`
--
ALTER TABLE `publication_meta`
  ADD PRIMARY KEY (`idMeta`),
  ADD KEY `idPublication` (`idPublication`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`idTag`),
  ADD KEY `idPublication` (`idPublication`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `mtr_user`
--
ALTER TABLE `mtr_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `profile_link`
--
ALTER TABLE `profile_link`
  MODIFY `idLink` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `idPublication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT pour la table `publication_file`
--
ALTER TABLE `publication_file`
  MODIFY `idFile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `publication_meta`
--
ALTER TABLE `publication_meta`
  MODIFY `idMeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idPublication`) REFERENCES `publication` (`idPublication`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`idPublicationCommented`) REFERENCES `publication` (`idPublication`);

--
-- Contraintes pour la table `follower`
--
ALTER TABLE `follower`
  ADD CONSTRAINT `follower_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `mtr_user` (`idUser`);

--
-- Contraintes pour la table `following`
--
ALTER TABLE `following`
  ADD CONSTRAINT `following_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `mtr_user` (`idUser`);

--
-- Contraintes pour la table `profile_link`
--
ALTER TABLE `profile_link`
  ADD CONSTRAINT `profile_link_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `mtr_user` (`idUser`);

--
-- Contraintes pour la table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `mtr_user` (`idUser`),
  ADD CONSTRAINT `publication_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`);

--
-- Contraintes pour la table `publication_file`
--
ALTER TABLE `publication_file`
  ADD CONSTRAINT `publication_file_ibfk_1` FOREIGN KEY (`idPublication`) REFERENCES `publication` (`idPublication`);

--
-- Contraintes pour la table `publication_like`
--
ALTER TABLE `publication_like`
  ADD CONSTRAINT `publication_like_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `mtr_user` (`idUser`),
  ADD CONSTRAINT `publication_like_ibfk_2` FOREIGN KEY (`idPublication`) REFERENCES `publication` (`idPublication`);

--
-- Contraintes pour la table `publication_meta`
--
ALTER TABLE `publication_meta`
  ADD CONSTRAINT `publication_meta_ibfk_1` FOREIGN KEY (`idPublication`) REFERENCES `publication` (`idPublication`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`idPublication`) REFERENCES `publication` (`idPublication`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
