-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 19, 2021 at 02:46 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `MyForum`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(11) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `def` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `categorie`, `def`) VALUES
(1, 'javascript', 'JavaScript est un langage de programmation de scripts principalement employé dans les pages web interactives et à ce titre est une partie essentielle des applications web. Avec les technologies HTML et CSS, JavaScript est parfois considéré comme l\'une des technologies cœur du World Wide Web. (Source : Wikipedia)'),
(2, 'angular', '\r\nDéveloppé par Google, Angular est un Framework open source écrit en JavaScript qui permet la création d’applications Web et plus particulièrement de ce qu’on appelle des  « Single Page Applications » : des applications web accessibles via une page web unique qui permet de fluidifier l’expérience utilisateur et d’éviter les chargements de pages à chaque nouvelle action. (Source : Wikiperdia)'),
(3, 'vue.js', 'Vue.js, est un framework JavaScript open-source utilisé pour construire des interfaces utilisateur et des applications web monopages. Vue a été créé par Evan You et est maintenu par lui et le reste des membres actifs de l\'équipe principale travaillant sur le projet et son écosystème. (Source : Wikipedia)'),
(4, 'react', 'React est une bibliothèque JavaScript libre développée par Facebook depuis 2013. Le but principal de cette bibliothèque est de faciliter la création d\'application web monopage, via la création de composants dépendant d\'un état et générant une page HTML à chaque changement d\'état. (Source : Wikiperdia)');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `id_sujet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_user`, `commentaire`, `id_sujet`) VALUES
(12, 1, 'com', 1),
(13, 1, 'prengonieroge', 1),
(29, 3, 'salut je cherche une relation serieuse, es-tu intéressé ?', 1),
(30, 3, 'non dsl j\'ai deja trop de meuf dans ma vie ', 1),
(31, 3, 'pas grave ', 1),
(33, 2, 'CE N\'EST PAS UN SITE DE RENCONTRE', 1),
(34, 2, 'T\'ES BAN ROCKPIKOU', 1),
(35, 1, 'test', 2),
(36, 1, 'test', 2),
(37, 1, 'ggr', 1),
(38, 1, ',kgnre\r\ngk,ergnre\r\ngerlg,reg,', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` text NOT NULL,
  `vu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `id_user`, `message`, `vu`) VALUES
(1, 1, 'Bonjour gnjrengre', 1),
(2, 1, 'deuxieme message\r\n', 1),
(3, 1, 'message \r\n', 1),
(4, 2, 'test', 1),
(5, 2, 'test', 1),
(6, 2, 'test', 1),
(7, 2, 'gregre', 1),
(8, 2, 'gregreg', 1),
(9, 2, 'grgreg', 1),
(10, 2, 'gegre', 1),
(11, 2, 'gregre', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `reponse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reponse`
--

INSERT INTO `reponse` (`id`, `id_message`, `reponse`) VALUES
(6, 1, 'ma reponse'),
(7, 2, 'fefez'),
(8, 3, 'reponse unique\r\n'),
(9, 5, 'fezfez'),
(10, 4, 'gregre'),
(11, 6, 'fezfez'),
(12, 9, 'erzrez'),
(13, 8, 'opeajkropez\r\n'),
(14, 7, 'fregre'),
(15, 10, 'gregre');

-- --------------------------------------------------------

--
-- Table structure for table `sujet`
--

CREATE TABLE `sujet` (
  `id` int(11) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `contenu` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `resolue` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sujet`
--

INSERT INTO `sujet` (`id`, `titre`, `contenu`, `id_user`, `id_cat`, `resolue`) VALUES
(1, 'premier post', 'contenu du premier post', 1, 3, 0),
(2, 'test', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet tincidunt sem. Duis cursus justo risus, faucibus facilisis mi pellentesque a. Integer ultricies felis eget tincidunt viverra. Suspendisse iaculis rhoncus feugiat. Aenean sed risus vestibulum, lobortis orci ut, rhoncus enim. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc mi dui, cursus eu ex ac, viverra pellentesque felis. Duis vel felis eu enim finibus accumsan. Etiam faucibus mi non mauris tincidunt cursus. Sed blandit, lacus eget ultricies faucibus, mauris nunc ornare purus, vitae dictum tortor velit eget urna. In aliquam ex id metus gravida, non va', 1, 2, 1),
(3, 'titre ', 'ffezgze', 1, 2, 1),
(4, 'post javascript', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet tincidunt sem. Duis cursus justo risus, faucibus facilisis mi pellentesque a. Integer ultricies felis eget tincidunt viverra. Suspendisse iaculis rhoncus feugiat. Aenean sed risus vestibulum, lobortis orci ut, rhoncus enim. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc mi dui, cursus eu ex ac, viverra pellentesque felis. Duis vel felis eu enim finibus accumsan. Etiam faucibus mi non mauris tincidunt cursus. Sed blandit, lacus eget ultricies faucibus, mauris nunc', 1, 1, 0),
(5, 'Setting the type to the incoming apiye state', 'I want to put an incoming API to the status but it says undefined. I want to discard my data coming to randomcocktail and then use it.\r\n\r\nRandom.tsx', 1, 4, 0),
(6, 'test', 'test rock\r\n', 3, 4, 0),
(7, 'titre avec retour à la ligne ', 'feergre\r\ngre\r\ngreg\r\nre\r\ngr\r\n\r\ngr\r\ngre', 1, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `idUserProfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `mail`, `mdp`, `role`, `idUserProfil`) VALUES
(1, 'cloelh', 'cloelh@outlook.fr', '00d70c561892a94980befd12a400e26aeb4b8599', 'user', 8),
(2, 'admin', 'admin@admin.fr', '00d70c561892a94980befd12a400e26aeb4b8599', 'admin', 13),
(3, 'rockpikou', 'gbauvin@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userProfil`
--

CREATE TABLE `userProfil` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userProfil`
--

INSERT INTO `userProfil` (`id`, `name`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userProfil`
--
ALTER TABLE `userProfil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userProfil`
--
ALTER TABLE `userProfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
